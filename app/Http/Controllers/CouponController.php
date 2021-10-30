<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller{
    public function index()
    {
       $data = Coupon::all();
       return view('admin.coupon', ['coupon' => $data]);
    }

   
    public function addcoupon()
    {
        return view('admin.addcoupon');
    }

    
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:coupons,code',
            'value' => 'required',
            
        ]);
        $cate = new Coupon;
        $cate->name = $request->name;
        $cate->code = $request->code;
        $cate->value = $request->value;
        $cate->status = 1;
        $cate->save();
        $request->session()->flash('message','coupon Inserted');
        return redirect('admin/coupon');

    }

    
    public function status(Request $request,$status,$id)
    {
        $data = Coupon::find($id);
        $data->status = $status;
        $data->save();
        $request->session()->flash('message','Status Updated');
        return redirect('admin/coupon');
        // echo $status;
        // echo $id;
    }

    public function edit(Request $request, $id='')
    {
        $data = Coupon::find($id);
        return view('admin.editcoupon')->with('coupon', $data);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'value' => 'required',
            
        ]);
        $cate =Coupon::find($id);
        $cate->name = $request->name;
        $cate->code = $request->code;
        $cate->value = $request->value;
        $cate->save();
        $request->session()->flash('message','coupon Updated');
        return redirect('admin/coupon');
       
    }

   
    public function delete(Request $request, $id)
    {
        $data = Coupon::find($id);
        $data->delete();
        $request->session()->flash('message','coupon deleted');
        return redirect('admin/coupon');
    }
}
