@extends('admin/master')
@section('page_title','Special Product')
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
   
        <form action="{{route('splproduct.insert')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Category</label>
            <select class="form-control select2" name="category_id" style="width: 100%;" >
            <option value="" selected="selected">Please Select The Category</option>
            @foreach(App\Models\SpOfCategory::orderBy('category_name','asc')->get() as $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
            </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                <input name="name" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter Product Name" required>
            </div>
            @error('name')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>        
            @enderror
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1"> Slug</label>
                <input name="slug" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter Slug" required>
            </div>
            @error('slug')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>       
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Brand</label>
                <input name="brand" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter brand" required >
            </div>
            @error('brand')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>        
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">short description</label>
                <input name="short_description" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter short description " required>
            </div>
            @error('short_description')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>       
            @enderror


            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Description </label>
                <textarea name="desc" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter Description" required></textarea>
            </div>
            @error('desc')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>        
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Price</label>
                <input type="number" name="price" class="form-control" aria-invalid="false" placeholder="Please Enter Price " required>
            </div>
            @error('price')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>          
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Weight</label>
                <input type="text" name="weight" class="form-control" aria-invalid="false" placeholder="Please Enter Weight " required>
            </div>
            @error('weight')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>       
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">quantity	</label>
                <input type="number" name="quantity" class="form-control" aria-invalid="false" placeholder="Please Enter quantity" required>
            </div>
            @error('quantity')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>       
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Offer Price</label>
                <input type="number" name="offer_price" class="form-control" aria-invalid="false" placeholder="Please Enter Offer Price " required>
            </div>
            @error('offer_price')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>       
            @enderror

            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">keywords</label>
                <input name="keywords" type="text" class="form-control" aria-invalid="false" placeholder="Please Enter keywords" required>
            </div> 
            @error('keywords')
            <div class="alert alert-danger" role="alert">
              {{$message}}          
              </div>     
            @enderror

         <div class="input-group hdtuto control-group lst increment" >
               <input type="file" name="filenames[]" class="myfrm form-control">
               <div class="input-group-btn"> 
               <button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
               </div>
            </div>
            <div class="clone hide">
              <div class="hdtuto control-group lst input-group" style="margin-top:10px">
              <input type="file" name="filenames[]" class="myfrm form-control">
              <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
            </div>   
            @error('filenames')
              {{$message}}          
            @enderror

            </div>
            </div>                                           

            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Add</span>
                    <!-- <span id="payment-button-sending" style="display:none;">Sending…</span> -->
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
@endsection