<?php
    $i = 0;
?>
@foreach ($products as $product)
<div class="modal fade" id="<?php echo 'productModal'.$i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<div class="modal-body modal-spa">
						<div class="col-md-5 span-2">
                            <div class="item">
                                <img src="{{asset('uploads/products_images/'.$product->image)}}" class="img-responsive" alt="">
                            </div>
						</div>
						<div class="col-md-7 span-1 ">
							<h3>{{$product->product_name}} (qty:{{$product->qauntity}})</h3>
							<p class="in-para"> There are many variations of passages of Lorem Ipsum.</p>
							<div class="price_single">
                              <span class="reducedfrom "><del><span>&#8358;</span> {{$product->regular_price}}</del> <span>&#8358;</span> {{$product->discount_price}}</span>
							 <div class="clearfix"></div>
							</div>
							<h4 class="quick">Quick Overview:</h4>
							<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
							 <div class="add-to">
								   <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="30" data-name="Nuts" data-summary="summary 30" data-price="1.00" data-quantity="1" data-image="images/of30.png">Add to Cart</button>
								</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
        <!-- product -->  
        <?php $i++;?>
@endforeach
