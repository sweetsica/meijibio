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
        // Logic to retrieve and display customers
        return view('customer.create', compact('users'));
    }

    public function indexLead()
    {
        // Logic to retrieve and display customers
        return view('lead.index');
    }

    public function viewLead()
    {
        // Logic to retrieve and display customers
        return view('lead.view');
    }

    public function createLead()
    {
        // Logic to retrieve and display customers
        return view('lead.create');
    }

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
        $requestFields = $request->all();
        $defaultFields = FieldDefine::defaultFields;

        // Loop through $requestFields and check
        // If request has field in FieldDefine.php, then add to $dataToSync key value, else add to array in dataSync['custom_fields']
        // Check toàn bộ các field request gửi lên và phân biệt xem có được update hay không
        // Nếu được update thì là field custom hay default
        foreach ($requestFields as $field => $value) {
            if (in_array($field, $defaultFields)) {
                $dataToSync[$field] = $value;
            } else {
                $dataToSync['custom_fields'][] = [
                    'field' => $field,
                    'value' => $value
                ];
            }
        }

        $crmAPIKey = env('GETFLY_CRM_API_KEY');

        // Call api to push $dataToSync to another service meijibio
        $response = Http::withHeaders([
            'X-API-KEY' => $crmAPIKey
        ])->post('https://meijibio.getflycrm.com/api/v6/accounts', $dataToSync);

        if ($response->successful()) {
            return response()->json(['message' => 'Sync thành công', 'data' => $dataToSync]);
        } else {
            return response()->json(['message' => 'Sync thất bại', 'data' => $dataToSync], 500);
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

        // Call api to push $dataToSync to another service meijibio
        $response = Http::withHeaders([
            'X-API-KEY' => $crmAPIKey
        ])->post('https://meijibio.getflycrm.com/api/v6/accounts/'.$id, $dataToSync);

        if ($response->successful()) {
            return response()->json(['message' => 'Sync thành công', 'data' => $dataToSync]);
        } else {
            return response()->json(['message' => 'Sync thất bại', 'data' => $dataToSync], 500);
        }
    }

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

                $defaultFields = FieldDefine::defaultFields;

                foreach ($defaultFields as $field) {
                    $customerData[$field] = $item[$field];
                }

                if ($customer) {
                    $customer->update($customerData);
                } else {
                    $customer = Customer::create($customerData);
                }
            }


            if ($response->successful()) {
                return response()->json(['message' => 'Sync success']);
            } else {
                return response()->json(['message' => 'Sync failed'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Sync failed'], 500);
        }
    }
}
