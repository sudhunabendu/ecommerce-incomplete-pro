@extends('admin/master')
@section('page_title','Special Offer Category')
@section('content')
<!-- <h4>Category</h4> -->
<a href="showCategory">
    <button type="button" class="btn btn-primary">Back</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">Manage Category</div>
            <div class="card-body">
                <form action="{{route('category.insert_special_category')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Special Category Name</label>
                        <input name="category_name" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Please Enter Special Category Name" required>
                        @error('category_name')
                        <div class="alert alert-danger" role="alert">
                            {{message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Special Category Slug</label>
                        <input name="category_slug" type="text" class="form-control" aria-required="true"
                            aria-invalid="false" placeholder="Please Enter Special Category Slug" required>
                        @error('category_slug')
                        <div class="alert alert-danger" role="alert">
                            {{message}}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Add</span>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection