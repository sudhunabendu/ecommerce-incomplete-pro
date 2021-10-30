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
                       
                           @foreach($userCartItem as $pro)
                           {{$pro['name']}}
                    <!-- <tr> -->
                      <!-- <td class="name-pr"><a href="#">{{$pro['name']}}</a></td> -->
                      <!-- <td class="price-pr"><p>{{$pro->offer_price}}</p></td>
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
                      </tr> -->
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                 <br>

                 
<div class="col-sm-6 col-md-4">
<table class="table table-bordered tab">
    <tr>
      <th scope="col">PRICE DETAILS</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
   
    <tr>
      <!-- <td>{{$tot}}</td> -->
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
  
</table>
                </div>
            </div>
            @endif
            </div>
            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <br><br><br>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input class="btn btn-primary" name="submit" value="Update Cart" type="submit">
                    </div>
                </div> -->
            </div>

            <!-- <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div> -->

        </div>
    </div>
@endsection