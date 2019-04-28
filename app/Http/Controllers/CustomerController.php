<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerAccount;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = CustomerAccount::all();

        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'customer_name' => 'required',
            'mobile' => 'required',
            'balance' => 'required',
            'password' => 'required'
        ]);

        $customer = new CustomerAccount;

        $customer->mobile = $request->mobile;
        $customer->customer_name = $request->customer_name;
        $customer->balance = $request->balance;
        $customer->password = $request->password;
        $customer->save();

        return redirect()->back()->with('message', 'Customer Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = CustomerAccount::where('mobile', $id)->first();

        return view('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'customer_name' => 'required',
            'mobile' => 'required',
            'balance' => 'required'
        ]);

        $customer = CustomerAccount::where('mobile', $id)->first();
        if($request->password == "")
        {
            $customer->customer_name = $request->customer_name;
            $customer->mobile = $request->mobile;
            $customer->balance = $request->balance;
            $customer->save();
        }
        else
        {
            $customer->customer_name = $request->customer_name;
            $customer->mobile = $request->mobile;
            $customer->balance = $request->balance;
            $customer->password = $request->password;
            $customer->save();
        }
        


        return redirect()->back()->with('message', 'Customer Details Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = CustomerAccount::where('mobile', $mobile)->first();
        $customer->delete();  
        return redirect()->route('customer.index');
    }
}
