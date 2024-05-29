<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Country;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => Customer::with('country')->get(),
            'active' => 'Customers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create', [
            'countries' => Country::all(),
            'active' => 'Customers'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'customer_name' => 'required|max:50',
            'email' => 'required|max:50|unique:customers',
            'ordered' => 'required',
            'country' => 'required',    
            'status' => 'required'
        ]);

        $country = $request->input('country');
        $status = $request->input('status');

        $customer_slug = strtolower($request->customer_name);
        $karakterPengganti = '-';
        $customer_slug = str_replace(' ', $karakterPengganti, $customer_slug);

        $validateData['country_id'] = $country;
        $validateData['customer_slug'] = $customer_slug;
        $validateData['status'] = $status;

        Customer::create($validateData);

        return redirect(route('customer.index'))->with('success', 'New customer has been created!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'countries' => Country::all(),
            'customer' => $customer,
            'active' => 'Customer'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // dd($request->all());

        $validateData = $request->validate([
            'customer_name' => 'required|max:50',
            'email' => 'required|max:50',
            'status' => 'required',
            'ordered' => 'required'
        ]);

        $country = $request->input('country');
        $status = $request->input('status');
        $ordered = $request->input('ordered');

        $customer_slug = strtolower($request->customer_name);
        $karakterPengganti = '-';
        $customer_slug = str_replace(' ', $karakterPengganti, $customer_slug);

        $validateData['country_id'] = $country;
        $validateData['customer_slug'] = $customer_slug;
        $validateData['status'] = $status;
        $validateData['ordered'] = $ordered;

        Customer::where('id', $customer->id)->update($validateData);

        return redirect(route('customer.index'))->with('success', 'Customer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect(route('customer.index'))->with('success', 'Customer has been deleted!');
    }
}
