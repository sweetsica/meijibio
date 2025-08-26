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

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // đảm bảo luôn có Auth::user()
    // }

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
        // If no ID is provided, redirect to customer list
        if (!$id) {
            return redirect()->route('customer.index');
        }

        $customer = Customer::find($id);

        // If customer not found, redirect to customer list with error message
        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found');
        }

        // get list of users
        $users = User::all();

        // Lấy danh sách field có thể edit theo role của user hiện tại
        $editableFields = RoleFieldResolver::forUser(Auth::user());


        // Logic to retrieve and display customers
        // return view('customer.view', compact('customer', 'users'));
        return view('customer.view', compact('customer', 'users', 'editableFields'));
    }

    public function create()
    {
        // get list of users
        $users = User::all();
        $editableFields = RoleFieldResolver::forUser(Auth::user());
        // Logic to retrieve and display customers
        return view('customer.create', compact('users', 'editableFields'));
        // return view('customer.create');
    }


    // public function indexLead()
    // {
    //     // Logic to retrieve and display customers
    //     return view('lead.index');
    // }

    // public function viewLead()
    // {
    //     // Logic to retrieve and display customers
    //     return view('lead.view');
    // }

    // public function createLead()
    // {
    //     // Logic to retrieve and display customers
    //     return view('lead.create');
    // }

    public function import(Request $request)
    {
        // // Logic to import customers
        // Excel::import(new CustomersImport, $request->file('customers'));
        // return redirect()->route('customer.index')->with('success', 'Customers imported successfully');

        $file = $request->file('file');

        if (!$file) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }

        // Ép ReaderType = XLSX
        Excel::import(new CustomersImport(), $file, null, ExcelType::XLSX);

        return response()->json(['message' => 'Import thành công']);
    }

    public function createCustomer(Request $request)
    {
        $dataToSync = [];
        // $requestFields = $request->all();
        // Loại bỏ _token, _method ra khỏi request
        // $requestFields = $request->except(['_token', '_method','account_relation_detail','province_id','district_id','ward_id','accessible_user_ids']);
        // $requestFields = $request->except(['_token', '_method','account_relation_detail','province_id','district_id','ward_id',]);
        $requestFields = $request->except(['_token', '_method']);
        // accessible_account_users++

        $defaultFields = FieldDefine::defaultFields;

        // dd($request->all());
        // Loop through $requestFields and check
        // If request has field in FieldDefine.php, then add to $dataToSync key value, else add to array in dataSync['custom_fields']
        // Check toàn bộ các field request gửi lên và phân biệt xem có được update hay không
        // Nếu được update thì là field custom hay default
        $dataToSync = [
            'custom_fields' => []
        ];
        
        foreach ($requestFields as $field => $value) {
            // Bỏ qua nếu value null, rỗng hoặc 0
            if ($value === null || $value === '' || $value === 0 || $value === '0') {
                continue;
            }
        
            if (in_array($field, $defaultFields)) {
                $dataToSync[$field] = $value;
            } else {
                // Chuyển sang key-value thay vì array
                $dataToSync['custom_fields'][$field] = $value;
            }
        }
        
        $crmAPIKey = env('GETFLY_CRM_API_KEY');
        
        $response = Http::withHeaders([
            'X-API-KEY' => $crmAPIKey
        ])->post('https://meijibio.getflycrm.com/api/v6.1/accounts', $dataToSync);

        dd($response->body());
        // $accountId = $response->json('data.id');

        // // 2. Gán người phụ trách (nếu có accessible_user_ids)
        // if ($accountId && $request->filled('accessible_user_ids')) {
        //     Http::withHeaders([
        //         'X-API-KEY' => $crmAPIKey
        //     ])->post("https://meijibio.getflycrm.com/api/v6/accounts/{$accountId}/manager", [
        //         'accessible_user_ids' => $request->accessible_user_ids
        //     ]);
        // }
        

        // dd($response->body());
        if ($response->successful()) {
            $customer = Customer::create($dataToSync);
            // return response()->json(['message' => 'Sync thành công', 'data' => $dataToSync]);
            return redirect()->route('customer.index')->with('success', 'Customer created successfully');
        } else {
            return redirect()->route('customer.index')->with('error', 'Customer created failed');
            // return response()->json(['message' => 'Sync thất bại', 'data' => $dataToSync], 500);
        }
    }

    /** This function will check current user role and get field that allowed to update to another service meijibio */
    public function updateCustomer(Request $request, $id = null)
    {
        if (!$id) {
            return redirect()->route('customer.index')->with('error', 'Customer not found');
        }

        $dataToSync = [];
        $requestFields = $request->all();
        $defaultFields = FieldDefine::defaultFields;

        $rolePermission = RoleFieldResolver::forUser(Auth::user());

        // Loop through $requestFields and check
        // If request has field in FieldDefine.php, then add to $dataToSync key value, else add to array in dataSync['custom_fields']
        // Check toàn bộ các field request gửi lên và phân biệt xem có được update hay không
        // Nếu được update thì là field custom hay default
        foreach ($requestFields as $field => $value) {
            if (!in_array($field, $rolePermission)) {
                continue;
            }

            if (in_array($field, $defaultFields)) {
                $dataToSync[$field] = $value;
            } else {
                $dataToSync['custom_fields'][] = [
                    'field' => $field,
                    'value' => $value
                ];
            }
        }
        $dataToSync['accessible_user_ids'] = [];

        $crmAPIKey = env('GETFLY_CRM_API_KEY');

        $customer = Customer::find($id);

        // Call api to push $dataToSync to another service meijibio
        $response = Http::withHeaders([
            'X-API-KEY' => $crmAPIKey
        ])->post('https://meijibio.getflycrm.com/api/v6/accounts/'.$id, $dataToSync);
        

        if ($response->successful()) {
            $customer->update($dataToSync);

            return response()->json(['message' => 'Sync thành công', 'data' => $dataToSync]);
        } else {
            return response()->json(['message' => 'Sync thất bại', 'data' => $dataToSync], 500);
        }
    }

    public function deleteCustomer($id = null)
    {
        if (!$id) {
            return redirect()->route('customer.index')->with('error', 'Customer not found');
        }

        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found');
        }
        try{
            $crmAPIKey = env('GETFLY_CRM_API_KEY');
            $response = Http::withHeaders([
                'X-API-KEY' => $crmAPIKey
            ])->delete("https://meijibio.getflycrm.com/api/v6/accounts/{$customer->getfly_id}");

            // dd($response->body());
            if ($response->successful()) {
                $customer->delete();

                return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
            } else {
                return redirect()->route('customer.index')->with('error', 'Customer not found');
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('customer.index')->with('error', 'Customer not found');
        }

    }


    // Sync customer from getfly to database
    public function syncCustomer()
    {
        try {
            $crmAPIKey = env('GETFLY_CRM_API_KEY');
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
                return response()->json(['message' => 'Sync success']);
            } else {
                dd($response->body());
                return response()->json(['message' => 'Sync failed'], 500);
            }
        } catch (\Exception $e) {
            dd($e);
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

        $crmAPIKey = env('GETFLY_CRM_API_KEY');

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
