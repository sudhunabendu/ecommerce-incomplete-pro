@php 
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\FrontController;
$total = 0;
if(Session::has('users')){
  $total = FrontController::cartItem();
}
@endphp
@extends('front.layout')
@section('page_title','Grocery Shoppy Cart')
@section('container')
<div class="cart-box-main">
        <div class="container">
          
        </div>
    </div>
@endsection