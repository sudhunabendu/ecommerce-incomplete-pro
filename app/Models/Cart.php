<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    public function product(){

        return $this->belongsTo(Product::class);
    }
    
    public static function userCartItem(){
        if(Auth::check()){
            
            $userCartItem = Cart::where('user_id',Auth::users()->id)->get()->toArray();
        }else{
            $userCartItem = Cart::where('session_id',Session::get('session_id'))->get()->toArray();
        }
        return $userCartItem;
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
   
