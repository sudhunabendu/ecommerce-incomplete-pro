@extends('admin/master')
@section('content')
<!-- <h4>Category</h4> -->
<a href="{{url('admin/category')}}">
    <button type="button" class="btn btn-primary">Back</button></a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Category</div>
            <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="control-label mb-1">Category Name</label>
                        <input name="category_name" type="text" class="form-control"
                            value="{{$category->category_name}}" required>

                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Slug</label>
                        <input name="category_slug" type="text" class="form-control"
                            value="{{$category->category_slug}}" required>

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