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
        @if(isset($product))
        <div class="row">
            <div class="col-lg-8">
                <div class="table-main table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                          <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($product as $pro)
                <tr>
                  <td class="name-pr"><a href="#">{{$pro->name}}</a></td>
                  <td class="price-pr"><p>{{$pro->offer_price}}</p></td>
                <td>
                <div>
                <a href="{{url('/cart/update-quantity/'.$pro->id.'/1')}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                <input type="text" name="quantity" value="{{$pro->quantity}}" autocomplete="off" size="2" >
                @if($pro->quantity > 1)
                <a href="{{url('/cart/update-quantity/'.$pro->id.'/-1')}}"><i class="fa fa-minus" aria-hidden="true"></i></a>
                @endif
                </div>
                </td>
                  <td class="total-pr"><p>{{$pro->offer_price*$pro->quantity}}</p></td>
                  <td><a href="{{url('/cart/delete-product/'.$pro->id)}}"><button class="btn btn-danger">Remove</button></a></td>
                  </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
              <br>

                 
            <div class="col-sm-6 col-md-4">
            <table class="table table-bordered tab">
                <tr>
                  <th>PRICE DETAILS</th>
                  <th>Amount</th>
                </tr>
              
                <tr>
                  <td>Price ({{$total}} item)</td>
                  <td>{{$tot}}</td>
                </tr>
                <tr>
                  <td>Delivery Charges</td>
                  <td>100</td>
                </tr>
                <tr>
                  <td>Total Amount</td>
                  <td>{{$tot+100}}</td>
                </tr>
              </table>
            </div>
        </div>
       

        <!-- <form action="/action_page.php">
        <p>Please select your gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
      </form> -->
      @endif
            </div>
                 <!-- <div class="row my-5" style="margin-left: 103px;">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <br><br><br>
                            <div class="input-group-append" style="margin-top: 20px;">
                                <button  class="btn btn-primary" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <a href="#" style="margin-top: 5%; margin-left: 84%;" class="btn btn-success" >Place order</a>
    <br><br>
@endsection