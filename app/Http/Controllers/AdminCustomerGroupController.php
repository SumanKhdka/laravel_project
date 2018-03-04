<?php

namespace App\Http\Controllers;

use App\CustomerGroup;
use App\Http\Requests\CustomerGroupRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCustomerGroupController extends Controller
{
    var $current='customergroups';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customers.groups.index',[
            'customergroups'=>CustomerGroup::all(),
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
       return view('admin.customers.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerGroupRequest $request)
    {
        $this->_save(new customergroup(),$request);
        return redirect('admin/customer/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerGroup  $customergroup
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerGroup $customergroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerGroup  $customergroup
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerGroup $customergroup)
    {
        return view('admin.customers.groups.edit',[
            'customergroup'=>CustomerGroup::find($customergroup->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerGroup  $customergroup
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerGroupRequest $request, CustomerGroup $customergroup)
    {
        $this->_save($customergroup,$request);
        return redirect('admin/customer/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerGroup  $customergroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerGroup $customergroup)
    {
        $customergroup->delete();
        return redirect('admin/customers/groups');
    }
    private function _save(CustomerGroup $customergroup,Request $request){
        $customergroup->name=$request->input('name');
        $customergroup->discount=$request->input('discount');
        $customergroup->discount_type=$request->input('discount_type');
        $customergroup->status=$request->has('status');
        
       
        $customergroup->save();

    }

}
