<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display customers
        return view('customer.index');
    }
}
