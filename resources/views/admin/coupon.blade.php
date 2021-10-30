@extends('admin/master')
@section('page_title','Coupon')
@section('content')
<!-- <h4>Category</h4> -->
<a href="addcoupon">
<button type="button" class="btn btn-primary">Add Coupon</button>
</a>
<div class="row m-t-30">
        <div class="col-md-12">
        @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
      {{session('message')}}
    </div>
    @endif
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coupon Code</th>
                            <th>Coupon Type</th>
                            <th>Amount</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($coupon as $cate)
                        <tr>
                            <td>{{$cate['id']}}</td>
                            <td>{{$cate['coupon_code']}}</td>
                            <td>{{$cate['coupon_type']}}</td>
                            <td>{{$cate['amount']}}
                            @if($cate['amount_type']=="percentage")
                            %
                            @else
                            INR
                            @endif
                            </td>
                            <td>{{$cate['expiry_date']}}</td>
                            <td><a href="{{url('admin/coupon/edit/')}}/{{$cate->id}}"><button class="btn btn-success">edit</button>&nbsp;&nbsp;&nbsp;

                            @if($cate->status==1)
                            <a href="{{url('admin/coupon/status/0')}}/{{$cate->id}}"><button class="btn btn-warning">Active</button>&nbsp;&nbsp;&nbsp;
                            @elseif($cate->status==0)
                            <a href="{{url('admin/coupon/status/1')}}/{{$cate->id}}"><button class="btn btn-info">Deactive</button>&nbsp;&nbsp;&nbsp;
                            @endif

                            <a href="{{url('admin/coupon/delete/')}}/{{$cate->id}}"><button class="btn btn-danger">delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection