@extends('admin/master')
@section('page_title','Special Category')
@section('content')
<!-- <h4>Category</h4> -->
<a href="spl_category">
  <button type="button" class="btn btn-primary">Add Special Category</button>
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
            <th>Special Category Name</th>
            <th>Special Category Slug</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach($category as $cate)
          <tr>
            <td>{{$cate->id}}</td>
            <td>{{$cate->category_name}}</td>
            <td>{{$cate->category_slug}}</td>
            <td>
              <!-- <button class="btn btn-primary">show</button> -->
              <a href="{{url('admin/splcategory/edit/')}}/{{$cate->id}}"><button
                  class="btn btn-success">edit</button>&nbsp;&nbsp;&nbsp;

                @if($cate->status==1)
                <a href="{{url('admin/splcategory/status/0')}}/{{$cate->id}}"><button
                    class="btn btn-warning">Active</button>&nbsp;&nbsp;&nbsp;
                  @elseif($cate->status==0)
                  <a href="{{url('admin/splcategory/status/1')}}/{{$cate->id}}"><button
                      class="btn btn-info">Deactive</button>&nbsp;&nbsp;&nbsp;
                    @endif

                    <a href="{{url('admin/splcategory/delete/')}}/{{$cate->id}}"><button
                        class="btn btn-danger">delete</button></a>
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