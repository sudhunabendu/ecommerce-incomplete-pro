@extends('admin/master')
@section('page_title','Users List')
@section('content')
<!-- <a href="addcoupon">
<button type="button" class="btn btn-primary">Add Coupon</button>
</a> -->
           <div class="row m-t-30">
              <div class="col-md-12">
                    <!-- DATA TABLE-->
                  <div class="table-responsive m-b-40">
                  <table class="table table-borderless table-data3">
                    <thead>
                      <tr>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>User Phone</th>
                      <th>User Email</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                  <tbody>
                   @foreach($user as $cate)
                     <tr>
                    <td>{{$cate->id}}</td>
                    <td>{{$cate->name}}</td>
                    <td>{{$cate->phone}}</td>
                    <td>{{$cate->email}}</td>
                    <td>
                    <!-- <button class="btn btn-primary">show</button> -->
                    <a href="{{url('admin/coupon/edit/')}}/{{$cate->id}}"><button class="btn btn-success">edit</button>&nbsp;&nbsp;&nbsp;

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