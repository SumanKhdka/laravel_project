<?php

namespace App\Listeners;
use Mail;
use App\Events\SendCouponEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

class SendCouponEmailListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendCouponEmail  $event
     * @return void
     */
    public function handle(SendCouponEmail $event)
    {
        $cu=$event->customer;
        $coupon=$event->coupon;
        Mail::send('admin.email.customercoupon',[
            'name'=>$cu->first_name . ' '.$cu->last_name,
            'coupon'=>$coupon->name,
            'discount'=>$coupon->discount,
            'discount_type'=>($coupon->discount_type=='percentage')?'%':'',
            'start_date'=>$coupon->start_date,
            'end_date'=>$coupon->end_date
        ],function($m) use ($cu){
            $m->from('suman@ersathi.com');
            $m->to($cu->email)->subject('You have received coupon' . $coupon->name);
           
            DB::table('tbl_customer_coupons')
            ->insert([
                'coupon_id'=>$coupon->id,
                'customer_id'=>$cu->id,
                'valid_until'=>$coupon->end_date,
                'status'=>1
        
                ]);
                });
    }
}
