<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use Maatwebsite\Excel\Excel as ExcelType;

class CustomerController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display customers
        return view('customer.index');
    }
    public function view()
    {
        // Logic to retrieve and display customers
        return view('customer.view');
    }
    public function create()
    {
        // Logic to retrieve and display customers
        return view('customer.create');
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
