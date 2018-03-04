<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Customer;
use App\Events\SendCouponEmail;
use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminCouponController extends Controller
{
    var $current='coupons';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupons.index',[
            'coupons'=>Coupon::all(),
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
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $this->_save(new coupon(),$request);
        return redirect('admin/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit',[
            'coupon'=>Coupon::find($coupon->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $this->_save($coupon,$request);
        return redirect('admin/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect('admin/coupons');
    }
private function _save(Coupon $coupon,Request $request){
    $coupon->name=$request->input('name');
    $coupon->code=$request->input('code');
    $coupon->discount=$request->input('discount');
    $coupon->discount_type=$request->input('discount_type');
    $coupon->minumum_phurchase=$request->input('minumum_phurchase');
    $coupon->start_date=$request->input('start_date');
    $coupon->end_date=$request->input('end_date');
    $coupon->status=$request->has('status');
    
    if($request->hasFile('image')){
        $request->file('image');
        $coupon->image=Storage::putFile('public',$request->image);
    }
    $coupon->save();

}

public function send(Request $request){
    if($request->has('coupon_id')){
        $coupon=Coupon::find($request->input('coupon_id'));

        foreach(Customer::all() as $cu){
           
            event(new SendCouponEmail($coupon,$cu));
        }
        return ['success'=>true];
    }
    return['success'=>false];
}
}
