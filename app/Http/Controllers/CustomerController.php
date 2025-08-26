<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Excel as ExcelType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Support\RoleFieldResolver;
use Illuminate\Support\Facades\Http;
use App\Enum\FieldDefine;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    private $crmBaseUrl;
    private $crmApiKey;
    private $httpTimeout;
    private $userPermissions;

    public function __construct()
    {
        $this->crmBaseUrl = config('services.getfly_crm.base_url');
        $this->crmApiKey = config('services.getfly_crm.api_key');
        $this->httpTimeout = config('services.getfly_crm.timeout');
    }

    /**
     * Make a CRM API request with proper error handling and timeout
     */
    private function makeCrmRequest($method, $endpoint, $data = [])
    {
        if (!$this->crmApiKey) {
            throw new \Exception('CRM API key not configured');
        }

        $url = $this->crmBaseUrl . $endpoint;

        $response = Http::timeout($this->httpTimeout)
            ->withHeaders(['X-API-KEY' => $this->crmApiKey])
            ->$method($url, $data);

        return $response;
    }

    /**
     * Validate customer data
     */
    private function validateCustomerData(Request $request, $isUpdate = false)
    {
        $rules = [
            'account_name' => $isUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_office' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
        ];

        // Only validate the fields that have rules, not all request data
        $validationData = $request->only(array_keys($rules));
        return Validator::make($validationData, $rules);
    }

    /**
     * Prepare customer data for CRM sync
     */
    private function prepareCustomerData(Request $request, $isUpdate = false)
    {
        $excludeFields = ['_token', '_method', 'account_relation_detail', 'province_id', 'district_id', 'ward_id'];
        if (!$isUpdate) {
            $excludeFields[] = 'accessible_user_ids';
        }

        $requestFields = $request->except($excludeFields);
        $defaultFields = FieldDefine::defaultFields;

        $dataToSync = ['custom_fields' => []];

        foreach ($requestFields as $field => $value) {
            // Skip null, empty, or zero values
            if ($value === null || $value === '' || $value === 0 || $value === '0') {
                continue;
            }

            if (in_array($field, $defaultFields)) {
                $dataToSync[$field] = $value;
            } else {
                $dataToSync['custom_fields'][$field] = $value;
            }
        }

        return $dataToSync;
    }

    /**
     * Handle CRM API errors
     */
    private function handleCrmError($response, $operation)
    {
        $statusCode = $response->status();
        $responseBody = $response->body();

        Log::error("CRM API error during {$operation}", [
            'status' => $statusCode,
            'response' => $responseBody,
            'user_id' => Auth::id()
        ]);

        // Handle specific HTTP status codes
        switch ($statusCode) {
            case 401:
                Log::critical('CRM API authentication failed - check API key');
                break;
            case 403:
                Log::warning('CRM API access forbidden - check permissions');
                break;
            case 429:
                Log::warning('CRM API rate limit exceeded');
                break;
            case 500:
            case 502:
            case 503:
                Log::error('CRM API server error');
                break;
        }
    }

    /**
     * Prepare update data filtered by user permissions
     */
    private function prepareUpdateData(Request $request, array $rolePermissions)
    {
        // Only get allowed fields, not all request data
        $requestFields = $request->only($rolePermissions);
        $defaultFields = FieldDefine::defaultFields;
        $dataToSync = ['custom_fields' => []];

        foreach ($requestFields as $field => $value) {
            // Additional security check
            if (!in_array($field, $rolePermissions)) {
                continue;
            }

            // Skip null, empty values
            if ($value === null || $value === '') {
                continue;
            }

            if (in_array($field, $defaultFields)) {
                $dataToSync[$field] = $value;
            } else {
                $dataToSync['custom_fields'][$field] = $value;
            }
        }

        // Remove custom_fields if empty
        if (empty($dataToSync['custom_fields'])) {
            unset($dataToSync['custom_fields']);
        }

        return $dataToSync;
    }

    /**
     * Get user permissions with caching
     */
    private function getUserPermissions()
    {
        if (!$this->userPermissions) {
            $this->userPermissions = RoleFieldResolver::forUser(Auth::user());
        }
        return $this->userPermissions;
    }

    public function index()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            $customers = Customer::all();
        }

        $authUserGetFlyId = Auth::user()->getfly_id;


        $customers = Customer::where('account_manager', $authUserGetFlyId)
        ->orWhereJsonContains('accessible_user_ids', $authUserGetFlyId)
        ->get();

        if (Auth::user()->role == 'admin') {
            $customers = Customer::all();
        }

        // Logic to retrieve and display customers
        return view('customer.index', compact('customers'));
    }

    public function view($id = null)
    {
        try {
            // If no ID is provided, redirect to customer list
            if (!$id) {
                Log::warning('Customer view attempted without ID');
                return redirect()->route('customer.index')->with('error', 'Customer ID is required');
            }

            $customer = Customer::find($id);

            // If customer not found, redirect to customer list with error message
            if (!$customer) {
                Log::warning('View attempted on non-existent customer', ['id' => $id]);
                return redirect()->route('customer.index')->with('error', 'Customer not found');
            }

            // get list of users
            $users = User::all();

                    // Lấy danh sách field có thể edit theo role của user hiện tại
        $editableFields = $this->getUserPermissions();

            // Logic to retrieve and display customers
            return view('customer.view', compact('customer', 'users', 'editableFields'));
        } catch (\Exception $e) {
            Log::error('Exception during customer view', [
                'customer_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('customer.index')->with('error', 'An error occurred while loading the customer details.');
        }
    }

    public function create()
    {
        // get list of users
        $users = User::all();
        $editableFields = $this->getUserPermissions();
        // Logic to retrieve and display customers
        return view('customer.create', compact('users', 'editableFields'));
        // return view('customer.create');
    }

    public function import(Request $request)
    {
        try {
            // Validate request
            $validator = Validator::make($request->only(['file']), [
                'file' => 'required|file|mimes:xlsx|max:10240' // Max 10MB
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Invalid file. Please upload a valid XLSX file (max 10MB).'
                ], 400);
            }

            $file = $request->file('file');

            // Additional mime type validation
            $allowedMimes = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if (!in_array($file->getMimeType(), $allowedMimes)) {
                Log::warning('Invalid file type uploaded for import', [
                    'mime_type' => $file->getMimeType(),
                    'user_id' => Auth::id()
                ]);
                return response()->json(['error' => 'Invalid file type. Only XLSX files are allowed.'], 400);
            }

            // Import data
            Excel::import(new CustomersImport(), $file, null, ExcelType::XLSX);

            Log::info('Customer import completed successfully', [
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'user_id' => Auth::id()
            ]);

            return response()->json(['message' => 'Import completed successfully!']);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            Log::error('Excel validation error during import', [
                'failures' => $e->failures(),
                'user_id' => Auth::id()
            ]);
            return response()->json([
                'error' => 'Data validation failed. Please check your Excel file format.',
                'details' => $e->failures()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Exception during customer import', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            return response()->json(['error' => 'An error occurred during import. Please check your file format and try again.'], 500);
        }
    }

    public function createCustomer(Request $request)
    {
        try {
            // Validate input data
            $validator = $this->validateCustomerData($request);
            if ($validator->fails()) {
                return redirect()->route('customer.create')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please fix the validation errors and try again.');
            }

            // Prepare data for sync
            $dataToSync = $this->prepareCustomerData($request, false);

            // Create customer in CRM
            $response = $this->makeCrmRequest('post', '/accounts', $dataToSync);

            if (!$response->successful()) {
                $this->handleCrmError($response, 'customer creation');
                return redirect()->route('customer.create')->with('error', 'Failed to create customer in CRM system.');
            }

            $accountId = $response->json('data.id');

            // Assign manager if specified
            if ($accountId && $request->filled('accessible_user_ids')) {
                try {
                    $this->makeCrmRequest('post', "/accounts/{$accountId}/manager", [
                        'accessible_user_ids' => $request->accessible_user_ids
                    ]);
                } catch (\Exception $e) {
                    Log::warning('Failed to assign manager to customer', [
                        'account_id' => $accountId,
                        'error' => $e->getMessage()
                    ]);
                }
            }

            // Create customer in local database
            $dataToSync['getfly_id'] = $accountId;
            $customer = Customer::create($dataToSync);

            Log::info('Customer created successfully', [
                'customer_id' => $customer->id,
                'account_id' => $accountId,
                'user_id' => Auth::id()
            ]);

            return redirect()->route('customer.index')->with('success', 'Customer created successfully!');

        } catch (\Exception $e) {
            Log::error('Exception during customer creation', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            return redirect()->route('customer.create')->with('error', 'An unexpected error occurred while creating the customer. Please try again.');
        }
    }

    /** This function will check current user role and get field that allowed to update to another service meijibio */
    public function updateCustomer(Request $request, $id = null)
    {
        try {
            if (!$id) {
                Log::warning('Update customer attempted without ID', ['user_id' => Auth::id()]);
                return response()->json(['message' => 'Customer ID is required'], 400);
            }

            $customer = Customer::find($id);
            if (!$customer) {
                Log::warning('Update attempted on non-existent customer', ['id' => $id, 'user_id' => Auth::id()]);
                return response()->json(['message' => 'Customer not found'], 404);
            }

            // Validate user permissions
            $rolePermission = $this->getUserPermissions();
            if (empty($rolePermission)) {
                return response()->json(['message' => 'Insufficient permissions'], 403);
            }

            // Validate input data
            $validator = $this->validateCustomerData($request, true);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Prepare data for sync (filtered by permissions)
            $dataToSync = $this->prepareUpdateData($request, $rolePermission);

            if (empty($dataToSync)) {
                return response()->json(['message' => 'No valid fields to update'], 400);
            }

            // Update in CRM
            $response = $this->makeCrmRequest('put', "/accounts/{$customer->getfly_id}", $dataToSync);

            if (!$response->successful()) {
                $this->handleCrmError($response, 'customer update');
                return response()->json(['message' => 'Failed to update customer in CRM system'], 500);
            }

            // Update local database
            $customer->update($dataToSync);

            Log::info('Customer updated successfully', [
                'customer_id' => $id,
                'user_id' => Auth::id(),
                'updated_fields' => array_keys($dataToSync)
            ]);

            return response()->json([
                'message' => 'Customer updated successfully',
                'data' => $dataToSync
            ]);

        } catch (\Exception $e) {
            Log::error('Exception during customer update', [
                'customer_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            return response()->json(['message' => 'An unexpected error occurred while updating the customer'], 500);
        }
    }

    public function deleteCustomer($id = null)
    {
        try {
            if (!$id) {
                Log::warning('Delete customer attempted without ID', ['user_id' => Auth::id()]);
                return redirect()->route('customer.index')->with('error', 'Customer ID is required');
            }

            $customer = Customer::find($id);
            if (!$customer) {
                Log::warning('Delete attempted on non-existent customer', ['id' => $id, 'user_id' => Auth::id()]);
                return redirect()->route('customer.index')->with('error', 'Customer not found');
            }

            // Store getfly_id before deletion for logging
            $getflyId = $customer->getfly_id;

            // Delete from CRM first
            $response = $this->makeCrmRequest('delete', "/accounts/{$getflyId}");

            if (!$response->successful()) {
                // Log error but still allow local deletion if CRM delete fails
                $this->handleCrmError($response, 'customer deletion');

                // For non-critical CRM errors, proceed with local deletion
                if ($response->status() === 404) {
                    Log::info('Customer not found in CRM, proceeding with local deletion', [
                        'customer_id' => $id,
                        'getfly_id' => $getflyId
                    ]);
                } else {
                    return redirect()->route('customer.index')
                        ->with('error', 'Failed to delete customer from CRM system. Please try again.');
                }
            }

            // Delete from local database
            $customer->delete();

            Log::info('Customer deleted successfully', [
                'customer_id' => $id,
                'getfly_id' => $getflyId,
                'user_id' => Auth::id()
            ]);

            return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');

        } catch (\Exception $e) {
            Log::error('Exception during customer deletion', [
                'customer_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            return redirect()->route('customer.index')->with('error', 'An unexpected error occurred while deleting the customer. Please try again.');
        }
    }


    // Sync customer from getfly to database
    public function syncCustomer()
    {
        try {
            $crmAPIKey = $this->crmApiKey;
            $defaultFields = FieldDefine::defaultListFields;

            // Convert default fields array to comma-separated string
            $defaultFieldsString = implode(',', $defaultFields);
            $fieldsRequests = $defaultFieldsString;

            $limit = 10000000000; // 10 billion records

            $url = 'https://meijibio.getflycrm.com/api/v6/accounts?limit=' . $limit . '&fields=' . $fieldsRequests;

            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->get($url);


            // Get first item of response
            $data = json_decode($response->body(), true);
            $firstItem = $data['data'][0];

            foreach ($data['data'] as $item) {
                $customer = Customer::where('getfly_id', $item['id'])->first();

                $customerData = [
                    'getfly_id' => $item['id'],
                ];

                                // Fields that exist in migration and should be saved directly
                $directFields = [
                    'account_code', 'account_name', 'description', 'phone_office', 'email',
                    'website', 'birthday', 'sic_code', 'gender', 'total_revenue', 'account_manager'
                ];

                // JSON fields that should be saved as arrays (not JSON strings)
                $jsonFields = ['contacts', 'accessible_user_ids'];

                // Handle direct fields
                foreach ($directFields as $field) {
                    if (isset($item[$field])) {
                        $customerData[$field] = $item[$field];
                    }
                }

                // Handle JSON fields properly
                foreach ($jsonFields as $field) {
                    if (isset($item[$field]) && is_array($item[$field])) {
                        $customerData[$field] = $item[$field]; // Laravel will auto-cast to JSON
                    }
                }

                // Handle custom_fields
                if (isset($item['custom_fields']) && is_array($item['custom_fields'])) {
                    $customerData['custom_fields'] = $item['custom_fields']; // Laravel will auto-cast to JSON
                }

                // Handle address field mapping
                if (isset($item['billing_address_street'])) {
                    $customerData['billing_address_street'] = $item['billing_address_street'];
                }

                try {
                    if ($customer) {
                        $customer->update($customerData);
                    } else {
                        $customer = Customer::create($customerData);
                    }
                } catch (\Exception $e) {
                    Log::error('Error syncing customer ' . $item['id'] . ': ' . $e->getMessage());
                }
            }


            if ($response->successful()) {
                Log::info('Customer sync completed successfully');
                return response()->json(['message' => 'Sync completed successfully']);
            } else {
                Log::error('Customer sync failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return response()->json(['message' => 'Sync failed'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception during customer sync', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Sync failed'], 500);
        }
    }

    public function syncDetailCustomer($id = null)
    {
        if (!$id) {
            return response()->json(['error' => 'Customer ID is required'], 400);
        }

        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $crmAPIKey = $this->crmApiKey;

        if (!$crmAPIKey) {
            return response()->json(['error' => 'CRM API key not configured'], 500);
        }

        try {
            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->get("https://meijibio.getflycrm.com/api/v6/accounts/{$customer->getfly_id}");

            if (!$response->successful()) {
                Log::error('CRM API request failed: ' . $response->body());
                return response()->json(['error' => 'Failed to fetch customer data from CRM'], 500);
            }

            $data = json_decode($response->body(), true);

            if (!$data) {
                return response()->json(['error' => 'Invalid response from CRM API'], 500);
            }

            // Use the API response data (assuming it returns customer data directly)

            $customerData = [
                'getfly_id' => $data['id'] ?? $customer->getfly_id,
            ];

            // Fields that exist in migration and should be saved directly
            $directFields = [
                'account_code', 'account_name', 'description', 'phone_office', 'email',
                'website', 'birthday', 'sic_code', 'gender', 'total_revenue', 'account_manager'
            ];

            // JSON fields that should be saved as arrays (not JSON strings)
            $jsonFields = ['contacts', 'accessible_user_ids'];

            // Handle direct fields
            foreach ($directFields as $field) {
                if (isset($data[$field])) {
                    $customerData[$field] = $data[$field];
                }
            }

            // Handle JSON fields properly
            foreach ($jsonFields as $field) {
                if (isset($data[$field]) && is_array($data[$field])) {
                    $customerData[$field] = $data[$field]; // Laravel will auto-cast to JSON
                }
            }

            // Handle custom_fields
            if (isset($data['custom_fields']) && is_array($data['custom_fields'])) {
                $customerData['custom_fields'] = $data['custom_fields']; // Laravel will auto-cast to JSON
            }

            // Handle address field mapping
            if (isset($data['billing_address_street'])) {
                $customerData['billing_address_street'] = $data['billing_address_street'];
            }

            // Update the existing customer with new data
            $customer->update($customerData);

            return response()->json(['message' => 'Customer synced successfully']);
        } catch (\Exception $e) {
            Log::error('Error syncing customer ' . $id . ': ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while syncing customer'], 500);
        }
    }
}
