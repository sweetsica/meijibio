<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Excel as ExcelType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Support\RoleFieldResolver;
use Illuminate\Support\Facades\Http;
use App\Enums\FieldDefine;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
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
        $this->crmBaseUrl61 = config('services.getfly_crm_61.base_url');
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

    private function makeCrmRequest61($method, $endpoint, $data = [])
    {
        if (!$this->crmApiKey) {
            throw new \Exception('CRM API key not configured');
        }

        $url = $this->crmBaseUrl61 . $endpoint;

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
        $excludeFields = ['_token', '_method', 'account_relation_detail','account_code'];
        if (!$isUpdate) {
            $excludeFields[] = 'accessible_user_ids';
        }

        $requestFields = $request->except($excludeFields);
        $defaultFields = FieldDefine::defaultFields;

        $dataToSync = ['custom_fields' => []];

        // Các field có kiểu datetime
        $dateTimeFields = ['created_at', 'updated_at', 'deleted_at']; 

        // Các field địa chỉ không muốn gửi nếu rỗng
        $skipIfNullFields = ['province_name', 'district_name', 'ward_name','industry','birthday','email','tuoi', 'ngay_booking_du_kien', 'so_luong_booking'];

        foreach ($requestFields as $field => $value) {
            if ($value === null) {
                if (in_array($field, $skipIfNullFields)) {
                    // bỏ qua, không gửi field này
                    continue;
                }

                if (in_array($field, $dateTimeFields)) {
                    $value = "2000-01-01 00:00:00";
                } else {
                    $value = "Chưa có dữ liệu";
                }
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
            $customers = Customer::orderBy('getfly_id', 'desc')->get();
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
        $provinces = json_decode(File::get(public_path('json/province.json')), true);
        $districts = json_decode(File::get(public_path('json/district.json')), true);
        $wards     = json_decode(File::get(public_path('json/ward.json')), true);
        return view('customer.create', compact('users', 'editableFields', 'provinces', 'districts', 'wards'));
        // return view('customer.create');
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
            $response = $this->makeCrmRequest61('post', '/account', $dataToSync);


            if (!$response->successful()) {
                Log::info('Failed to create customer in CRM system', [
                    'response' => $response->json()
                ]);
                $this->handleCrmError($response, 'customer creation');

                $errorMessage = $response->json('message') ?? 'Failed to create customer in CRM system';
                return redirect()->route('customer.create')
                    ->withInput()
                    ->with('error', 'Failed to create customer: ' . $errorMessage);
            }
            
            $accountId = $response->json('data.account_id');
            $accountCode = $response->json('data.account_code');

            // Create customer in local database
            $dataToSync['getfly_id'] = $accountId;
            $dataToSync['account_code'] = $accountCode;
            $customer = Customer::create($dataToSync);

            Log::info('Customer created successfully', [
                'response' => $response->json(),
                'customer_id' => $customer->id,
                'account_id' => $accountId,
                'user_id' => Auth::id()
            ]);

            // SUCCESS: Redirect to customer list
            return redirect()->route('customer.index')->with('success', 'Customer created successfully!');

        } catch (\Exception $e) {
            Log::error('Exception during customer creation', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            // ERROR: Stay on create page with input preserved
            return redirect()->route('customer.create')
                ->withInput()
                ->with('error', 'An unexpected error occurred while creating the customer. Please try again.');
        }
    }

        /** This function will check current user role and get field that allowed to update to another service meijibio */
    public function updateCustomer(Request $request, $id = null)
    {
        try {
            if (!$id) {
                Log::warning('Update customer attempted without ID', ['user_id' => Auth::id()]);
                // MISSING ID: Redirect to customer list (no specific customer to return to)
                return redirect()->route('customer.index')->with('error', 'Customer ID is required');
            }

            $customer = Customer::find($id);
            if (!$customer) {
                Log::warning('Update attempted on non-existent customer', ['id' => $id, 'user_id' => Auth::id()]);
                // CUSTOMER NOT FOUND: Redirect to customer list
                return redirect()->route('customer.index')->with('error', 'Customer not found');
            }

            // Validate user permissions
            $rolePermission = $this->getUserPermissions();
            if (empty($rolePermission)) {
                // PERMISSION ERROR: Stay on customer view page
                return redirect()->route('customer.view', $id)
                    ->withInput()
                    ->with('error', 'You do not have permission to update this customer');
            }

            // Validate input data
            $validator = $this->validateCustomerData($request, true);
            if ($validator->fails()) {
                // VALIDATION ERROR: Stay on customer view page with errors
                return redirect()->route('customer.view', $id)
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Please fix the validation errors and try again.');
            }

            // Prepare data for sync (filtered by permissions)
            $dataToSync = $this->prepareUpdateData($request, $rolePermission);

            $dataToSync = $this->prepareCustomerData($request, true);

            if (empty($dataToSync)) {
                // NO FIELDS TO UPDATE: Stay on customer view page
                return redirect()->route('customer.view', $id)
                    ->withInput()
                    ->with('warning', 'No valid fields to update');
            }

            // Need insert current account code to dataToSync for getFly CRM detect user update
            $dataToSync['current_account_code'] = $customer->account_code;
            // dd($dataToSync);
            // Update in CRM
            $response = $this->makeCrmRequest61('put', "/account", $dataToSync);

            if (!$response->successful()) {
                $this->handleCrmError($response, 'customer update');
                $errorMessage = $response->json('message') ?? 'Failed to update customer in CRM system';
                // CRM ERROR: Stay on customer view page with input preserved
                return redirect()->route('customer.view', $id)
                    ->withInput()
                    ->with('error', 'Failed to update customer: ' . $errorMessage);
            }

            // Update local database
            $customer->update($dataToSync);

            Log::info('Customer updated successfully', [
                'customer_id' => $id,
                'user_id' => Auth::id(),
                'updated_fields' => array_keys($dataToSync)
            ]);

            // SUCCESS: Redirect to customer list
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');

        } catch (\Exception $e) {
            Log::error('Exception during customer update', [
                'customer_id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id()
            ]);
            // EXCEPTION ERROR: Stay on customer view page if we have valid ID, otherwise go to list
            if ($id && Customer::find($id)) {
                return redirect()->route('customer.view', $id)
                    ->withInput()
                    ->with('error', 'An unexpected error occurred while updating the customer. Please try again.');
            } else {
                return redirect()->route('customer.index')->with('error', 'An unexpected error occurred while updating the customer.');
            }
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

    public function deleteCustomerApi(Request $request)
    {
        $account_code = $request->query('account_code');

        $customer = Customer::where('account_code', $account_code)->first();

        if (!$customer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy khách hàng',
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Xoá thành công',
        ]);
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
            // dd($url);

            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->get($url);

            if (!$response->successful()) {
                Log::error('Customer sync failed', [
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return response()->json(['message' => 'Sync failed'], 500);
            }

            // Get response data
            $data = json_decode($response->body(), true);
            
            if (!isset($data['data']) || !is_array($data['data'])) {
                Log::error('Invalid response format from CRM API');
                return response()->json(['message' => 'Invalid response format'], 500);
            }

            $syncedCount = 0;
            $errorCount = 0;

            foreach ($data['data'] as $item) {
                try {
                    // Use the comprehensive mapping function from Customer model
                    $customerData = Customer::mapGetflyDataToCustomer($item);
                    
                    // Create or update customer using the model's method
                    Customer::createOrUpdateCustomer($customerData);
                    
                    $syncedCount++;
                } catch (\Exception $e) {
                    Log::error('Error syncing customer ' . ($item['id'] ?? 'unknown') . ': ' . $e->getMessage());
                    $errorCount++;
                }
            }

            Log::info('Customer sync completed', [
                'total_processed' => count($data['data']),
                'synced_count' => $syncedCount,
                'error_count' => $errorCount
            ]);

            return response()->json([
                'message' => 'Sync completed successfully',
                'total_processed' => count($data['data']),
                'synced_count' => $syncedCount,
                'error_count' => $errorCount
            ]);

        } catch (\Exception $e) {
            Log::error('Exception during customer sync', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Sync failed: ' . $e->getMessage()], 500);
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

            $defaultFields = FieldDefine::defaultListFields;

            // Convert default fields array to comma-separated string
            $defaultFieldsString = implode(',', $defaultFields);
            $fieldsRequests = $defaultFieldsString;

            $limit = 10000000000; // 10 billion records

            $url = 'https://meijibio.getflycrm.com/api/v6/accounts/' . $customer->getfly_id . '?fields=' . $fieldsRequests;
            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->get($url);

            if (!$response->successful()) {
                Log::error('CRM API request failed: ' . $response->body());
                return response()->json(['error' => 'Failed to fetch customer data from CRM'], 500);
            }

            $data = json_decode($response->body(), true);

            if (!$data) {
                return response()->json(['error' => 'Invalid response from CRM API'], 500);
            }

            // Use the comprehensive mapping function from Customer model
            $customerData = Customer::mapGetflyDataToCustomer($data);
            
            // Update the existing customer with new data
            $customer->update($customerData);

            Log::info('Customer detail sync completed successfully', [
                'customer_id' => $id,
                'getfly_id' => $customer->getfly_id
            ]);

            return response()->json(['message' => 'Customer synced successfully']);
        } catch (\Exception $e) {
            Log::error('Error syncing customer ' . $id . ': ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while syncing customer: ' . $e->getMessage()], 500);
        }
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

    public function export()
    {
        if (!Auth::check()) {
            return redirect('/'); // hoặc route('login') nếu bạn có định nghĩa
        }
    
        
        $timestamp = now()->format('d-m-Y-H-i');
        $userId = (int) Auth::id(); // bắt buộc là int
        
    
        $fileName = "customers-export-ID{$userId}-{$timestamp}.xlsx";
    
        return Excel::download(new CustomersExport($userId), $fileName);
    }

    /**
     * Sync a single customer by Getfly ID
     * This is useful for testing or syncing individual customers
     */
    public function syncCustomerByGetflyId($getflyId)
    {
        try {
            $crmAPIKey = $this->crmApiKey;

            if (!$crmAPIKey) {
                return response()->json(['error' => 'CRM API key not configured'], 500);
            }

            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->get("https://meijibio.getflycrm.com/api/v6/accounts/{$getflyId}");

            if (!$response->successful()) {
                Log::error('CRM API request failed for Getfly ID ' . $getflyId . ': ' . $response->body());
                return response()->json(['error' => 'Failed to fetch customer data from CRM'], 500);
            }

            $data = json_decode($response->body(), true);

            if (!$data) {
                return response()->json(['error' => 'Invalid response from CRM API'], 500);
            }

            // Use the comprehensive mapping function from Customer model
            $customerData = Customer::mapGetflyDataToCustomer($data);
            
            // Create or update customer using the model's method
            $customer = Customer::createOrUpdateCustomer($customerData);

            Log::info('Customer sync by Getfly ID completed successfully', [
                'getfly_id' => $getflyId,
                'customer_id' => $customer->id,
                'action' => $customer->wasRecentlyCreated ? 'created' : 'updated'
            ]);

            return response()->json([
                'message' => 'Customer synced successfully',
                'customer_id' => $customer->id,
                'action' => $customer->wasRecentlyCreated ? 'created' : 'updated'
            ]);

        } catch (\Exception $e) {
            Log::error('Error syncing customer by Getfly ID ' . $getflyId . ': ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while syncing customer: ' . $e->getMessage()], 500);
        }
    }
}
