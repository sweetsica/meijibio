<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Excel as ExcelType;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {

        $authUserGetFlyId = Auth::user()->getfly_id;


        $customers = Customer::where('account_manager', $authUserGetFlyId)
        ->orWhereJsonContains('accessible_user_ids', $authUserGetFlyId)
        ->get();

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


        // Logic to retrieve and display customers
        return view('customer.view', compact('customer', 'users'));
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
        Excel::import(new CustomersImport, $file, null, ExcelType::XLSX);

        return response()->json(['message' => 'Import thành công']);
    }
}
