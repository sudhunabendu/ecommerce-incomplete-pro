@extends('front.layout')
@section('page_title','Grocery Shoppy Cart')
@section('container')
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
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
                      <td class="thumbnail-img"><a href="#">
                        @php
                        $i = 1;
                        $image = json_decode($pro->filenames,true)
                        @endphp
                        @if(is_array($image) && !empty($image))
                        @foreach($image as $image)
                        @if($i > 0)  
                      <img width="20%" height="100px" class="img-fluid" src="{{url('files/'.$image)}}" alt="" />
                        @endif
                        @php
                        $i--;
                        @endphp
                        @endforeach
                        @endif
                    </a></td>
                      <td class="name-pr"><a href="#">{{$pro->name}}</a></td>
                      <td class="price-pr"><p>{{$pro->offer_price}}</p></td>
                      <td class="quantity-box">{{$pro->quantity}}</td>
                      <td class="total-pr"><p>$ 80.0</p></td>
                      </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <br>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input class="btn btn-primary" name="submit" value="Update Cart" type="submit">
                    </div>
                </div>
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