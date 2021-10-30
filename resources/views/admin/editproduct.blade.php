@extends('admin/master')
@section('page_title','Product')
@section('content')
<!-- <h4>Category</h4> -->
<a href="category">
<button type="button" class="btn btn-primary">Back</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
    <div class="card">
    
    <div class="card-header">Manage Category</div>
    <div class="card-body">

        <form action="{{route('product.update',$product->id)}}" method="post">
        @csrf

        <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Category Id</label>
                <select id="category_id" name="category_id" type="text" class="form-control">
                <option value="">Select Category</option>
                @foreach(App\Models\Category::orderBy('category_name','asc')->get() as $category)
                <option value="{{$category->id}}" {{$category->id == $product->category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                    <input name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->name}}" required>
                    
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1"> Slug</label>
                    <input name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->slug}}" required>
                </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Brand</label>
                    <input name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->brand}}" required>
                </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">short description</label>
                    <input name="short_description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->short_description}}" required>
                </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Description </label>
                    <textarea name="desc" type="text" class="form-control" required>{{$product->desc}}</textarea>
                </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">keywords</label>
                    <input name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->keywords}}" required>
                </div>  

                <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Weight</label>
                <input name="weight" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$product->weight}}" required>
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