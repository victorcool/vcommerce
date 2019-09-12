@extends('layouts.market')

@section('content') 

@section('sliderORvideo')
@include('market/assets.temp.slider')	
@endsection
<div class="content-top ">
<!--content-->



	{{-- @if (isset($states))
	<div class="row" >
		<div class=" col-md-6 states-row-div">
			<div class="list-group">
				@foreach ($states as $state)
				<a href="{{url('market/state/'.$state->title)}}" class="list-group-item">
				<i class="fa fa-map-marked"></i> {{$state->title}} <i class="fa fa-angle-right pull-right"></i>					
				</a>
				@endforeach
			</div>
		</div>
	</div>
	@else --}}

	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
	<div class=" con-w3l agileinf">
		@if (count($products) > 0)
			<?php $i=0;?>
			@foreach ($products as $product)
			<div class="col-md-3 pro-1">
					<div class="col-m">
					<a href="#" data-toggle="modal" data-target="<?php echo '#productModal'.$i;?>" class="offer-img">
							<img src="{{asset('uploads/products_images/'.$product->image)}}" class="img-responsive" alt="">
						</a>
						<?php $i++;?>
						<div class="mid-1">
							<div class="women">
								<h6><a href="#">{{$product->product_name}}</a> (qty:{{$product->qauntity}})</h6>						
							</div>
							<div class="mid-2">
									<p ><label><span>&#8358;</span> {{$product->regular_price}}</label><em class="item_price"><span>&#8358;</span> {{$product->discount_price}}</em></p>							
									<div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="clearfix"></div>
							</div>
						<form action="{{route('cart.store')}}" method="post">
							{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$product->p_id}}">
						<input type="hidden" name="name" value="{{$product->product_name}}">
						<input type="hidden" name="price" value="{{$product->discount_price}}">
						<div class="add">
							<button type="submit" class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
						</div>
						</form>
													
						</div>
					</div>			
				</div>			
		@endforeach
		@else
			<div class="jumbotron text-center">
			<embed src="{{asset('uploads/healmassLogo.png')}}" type="" style="width:200px"><p class="text-muted">No Product</p>       
			</div>
		@endif
	<div class="clearfix"></div>
	</div>
	</div>
	</div>

	{{-- @endif --}}

</div>
</div>
</div>
{{-- include modal for products --}}
@include('market.assets.inc.productModal')
{{-- //END --}}
@endsection