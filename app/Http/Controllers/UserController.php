<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;


class UserController extends Controller
{
    public function login(Request $req){

        $user = User::where(['email'=>$req->email])->first();
        // return $user->password;
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Email and Password are not match";
        }else{
           $req->session()->put('users',$user);
            // Update user cart with user id

            if(!empty(Session::get('session_id'))){
                $user_id = Session::get('users')['id'];
                $session_id = Session::get('session_id');
                Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);

            }

            return redirect()->back();
        }
    }
    public function SignUp(Request $req){
        $req->validate([
            'name' => 'required|max:150',
            'phone'=>'required',
            'email' => 'required|email',
            'password' => 'required','min:6',
            'address' =>'required',
            'state' => 'required',
            'city' =>'required',
            'zip' =>'required|min:6'
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password =Hash::make($req->password);
        $user->address = $req->address;
        $user->state = $req->state;
        $user->city = $req->city;
        $user->zip = $req->zip;
        $user->save();
        return redirect('/');
    }

    public function UserData(){
        $data = User::all();
        return view('admin.users', ['user' => $data]);
    }
}
