@extends('front.layout')
@section('page_title','Grocery Shoppy')
@section('container')
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Save</span>
						</h3>
						<p>Get flat
							<span>10%</span> Cashback</p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Healthy
							<span>Saving</span>
						</h3>
						<p>Get Upto
							<span>30%</span> Off</p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Big
							<span>Deal</span>
						</h3>
						<p>Get Best Offer Upto
							<span>20%</span>
						</p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">
						<h3>Today
							<span>Discount</span>
						</h3>
						<p>Get Now
							<span>40%</span> Discount</p>
						<a class="button2" href="product.html">Shop Now </a>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->
	<!---728x90--->

	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Food Preference</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Vegetarian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Non-Vegetarian</span>
						</li>
					</ul>
				</div>
				<!-- //food preference -->
				<!-- discounts -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Discount</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% or More</span>
						</li>
					</ul>
				</div>
				<!-- //discounts -->
				<!-- reviews -->
				<div class="customer-rev left-side">
					<h3 class="agileits-sear-head">Customer Review</h3>
					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Special Deals</h3>
					@foreach($product as $item)
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
					     	@php
									$i = 1;
									$image = json_decode($item->filenames,true)
									@endphp
									@if(is_array($image) && !empty($image))
									@foreach($image as $image)
									@if($i > 0)
									<img width="120%" height="100px" src="{{url('files/'.$image)}}" alt="">
									@endif
									@php
                  $i--;
                  @endphp
									@endforeach
									@endif
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>{{$item['name']}}</h3>
							<a href="/product_details/{{$item['id']}}">&#8377;{{$item['offer_price']}}</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach

			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9">
				<div class="wrapper">
					<!-- first section (nuts) -->
					<div class="product-sec1">
						<h3 class="heading-tittle">Our Products</h3>
						@foreach($product as $item)
						<div class="col-md-4 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
								  @php
									$i = 1;
									$image = json_decode($item->filenames,true)

									@endphp
									@if(is_array($image) && !empty($image))
									@foreach($image as $image)
									@if($i > 0)
									<img width="60%" height="140px" src="{{url('files/'.$image)}}" alt="">
									@endif
									@php
                  $i--;
                  @endphp
									@endforeach
									@endif
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
									<a href="/product_details/{{$item['id']}}" class="link-product-add-cart">Quick View</a>
								</div>
							</div>
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4>
											<a href="/product_details/{{$item['id']}}">{{$item['name']}}{{$item['weight']}}</a>
									</h4>
									<div class="info-product-price">
										<span class="item_price">&#8377;{{$item['offer_price']}}</span>
										<del>&#8377;{{$item['price']}}</del>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
					@foreach($product as $item)
					<li>
						<div class="w3l-specilamk">
							<div class="speioffer-agile">
								<a href="single.html">
								@php
									$i = 1;
									$image = json_decode($item->filenames,true)

									@endphp
									@if(is_array($image) && !empty($image))
									@foreach($image as $image)
									@if($i > 0)
									<img width="60%" height="140px" src="{{url('files/'.$image)}}" alt="">
									@endif
									@php
                  $i--;
                  @endphp
									@endforeach
									@endif
								</a>
							</div>
							<div class="product-name-w3l">
								<h4>
									<a href="/product_details/{{$item['id']}}">{{$item['name']}}{{$item['weight']}}</a>
								</h4>
								<div class="w3l-pricehkj">
									<h6>&#8377;{{$item['offer_price']}}</h6>
									<p>&#8377;{{$item['price']}}</p>
								</div>
							</div>
						</div>
					</li>
					@endforeach

				</ul>
			</div>
		</div>
	</div>
@endsection
