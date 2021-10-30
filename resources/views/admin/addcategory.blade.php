@extends('admin/master')
@section('page_title','Category')
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
                                   
                                        <!-- <div class="card-title">
                                            <h3 class="text-center title-2">Pay Invoice</h3>
                                        </div> -->
                                        <!-- <hr> -->
                                        <form action="{{route('category.insert')}}" method="post">
                                        @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Please Enter Category Name" required>
                                                @error('category_name')
                                                <div class="alert alert-danger" role="alert">
                                                {{message}}
										        </div>                                            
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Slug</label>
                                                <input name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Please Enter Category Slug" required>
                                                @error('category_slug')
                                                <div class="alert alert-danger" role="alert">
                                                {{message}}
										        </div> 
                                                @enderror
                                            </div>
                                            
                                            <!-- <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                                        <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Security code</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                                    </div>
                                                </div>
                                            </div> -->
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