@extends('admin/master')
@section('page_title','Coupon')
@section('content')
<!-- <h4>Category</h4> -->
<a href="{{url('admin/coupon')}}">
<button type="button" class="btn btn-primary">Back</button></a>
           <div class="row m-t-30">
                            <div class="col-md-12">
                            <div class="card">
                                    <div class="card-header">Edit coupon</div>
                                    <div class="card-body">
                                        <form action="{{route('coupon.update',$coupon->id)}}" method="post">
                                        @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-1">coupon Name</label>
                                                <input name="name" type="text" class="form-control"   value="{{$coupon->name}}" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">coupon code</label>
                                                <input name="code" type="text" class="form-control" value="{{$coupon->code}}" required>
                                        
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">coupon value</label>
                                                <input name="value" type="text" class="form-control" value="{{$coupon->value}}" required>
                                        
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection