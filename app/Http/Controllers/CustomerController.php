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
}
