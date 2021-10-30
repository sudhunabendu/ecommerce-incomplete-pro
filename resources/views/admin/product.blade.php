@extends('admin/master')
@section('page_title','Product')
@section('content')
<!-- <h4>Category</h4> -->
<a href="addproduct">
    <button type="button" class="btn btn-primary">Add Product</button>
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
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Image</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $cate)
                    <tr>
                        <td>{{$cate->id}}</td>
                        <td>{{$cate->category->category_name}}</td>
                        <td>{{$cate->name}}</td>
                        <td>{{$cate->brand}}</td>
                        <td>
                            @php
                            $i = 1;
                            $image = json_decode($cate->filenames,true)
                            @endphp
                            @if(is_array($image) && !empty($image))
                            @foreach($image as $image)
                            @if($i > 0)
                            <img style="height: 91px; width: 109px;" src="{{url('files/'.$image)}}" alt="">
                            @endif
                            @php
                            $i--;
                            @endphp
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <!-- <button class="btn btn-primary">show</button> -->
                            <a href="{{url('admin/product/edit/')}}/{{$cate->id}}"><button
                                    class="btn btn-success">edit</button>&nbsp;
                                @if($cate->status==1)
                                <a href="{{url('admin/product/status/0')}}/{{$cate->id}}"><button
                                        class="btn btn-warning">Active</button>&nbsp;
                                    @elseif($cate->status==0)
                                    <a href="{{url('admin/product/status/1')}}/{{$cate->id}}"><button
                                            class="btn btn-info">Deactive</button>&nbsp;
                                        @endif
                                        <a href="{{url('admin/product/delete/')}}/{{$cate->id}}"><button
                                                class="btn btn-danger">delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$product->links()}}
        </div>
        <!-- END DATA TABLE-->

    </div>
</div>
@endsection