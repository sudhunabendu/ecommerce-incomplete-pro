<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coupon;
// use App\Http\Controllers\CouponController;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $couponRecords = [

            ['id'=>1,'coupon_option'=>'Manual','coupon_code'=>'test10','categories'=>'1,2',
                'users'=>'nabendu@gmail.com,ayan2323basu@gmail.com','coupon_type'=>'single',
                'amount_type'=>'percentage','amount'=>'10','expiry_date'=>'2021-06-02','status'=>1
            ]
        ];

        Coupon::insert($couponRecords);
    }
}
