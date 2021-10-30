<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function index(Request $request){
         if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
       return view('admin.login');
   }


   public function auth(Request $req){
   $email = $req->post('email');
   $password = $req->post('password');
//    $result = Admin::where(['email'=>$email,'password'=>$password])->get();
   $result = Admin::where(['email'=>$email])->first();
    if($result){
        if(Hash::check($req->post('password'),$result->password)){
            $req->session()->put('ADMIN_LOGIN',true);
            $req->session()->put('ADMIN_ID',$result->id);
            return redirect('admin/dashboard');
        }else{ 
            $req->session()->flash('error','please enter valid password');
            return redirect('admin');
        }       
    }else{
        $req->session()->flash('error','please enter valid login details');
        return redirect('admin');
    }

    // if(isset($result[0]->id)){
        
    // }else{
       
    // }
   }
   public function dashboard(){
    return view('admin.dashboard');
}

    // public function updatepassword(){

    //     $r = Admin::find(2);
    //     $r->password=Hash::make('1234');
    //     $r->save();

    // }
   
}
