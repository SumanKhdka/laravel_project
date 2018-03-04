<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCustomerController extends Controller
{
    var $current='customers';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers.index',[
            'customers'=>Customer::all(),
            'current'=>$this->current
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        
        $this->_save(new customer(),$request);
        return redirect('admin/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',[
            'customer'=>Customer::find($customer->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $this->_save($customer,$request);
        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('admin/customers');
    }

private function _save(Customer $customer,Request $request){
    $customer->first_name=$request->input('first_name');
    $customer->last_name=$request->input('last_name');
    $customer->customer_group_id=$request->input('customer_group_id');
    $customer->email=$request->input('email');
    $customer->contact_no=$request->input('contact_no');
    $customer->address=$request->input('address');
    $customer->status=$request->has('status');
    
    if($request->hasFile('image')){
        $request->file('image');
        $customer->image=Storage::putFile('public',$request->image);
    }
    $customer->save();

}
}

