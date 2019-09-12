@extends('layouts.market')
@section('content') 

@section('sliderORvideo')
<div class="banner-top">
    <div class="container">
        <h3 >Cart</h3>
    <h4>
         @include('market.assets.inc.historyBtn')
    </h4>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection

@section('notice')
@include('market.notice')             
@endsection
<div class="content-top ">
<!--content-->

<div class="check-out">	 
		<div class="container">
	    <div class="spec ">
            <h3>Cart List</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if (Cart::count() > 0)
                
            <h5>{{ Cart::count() }} item(s) in Shopping Cart </h5><hr>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cross').fadeOut('slow', function(c){
							$('.cross').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cross1').fadeOut('slow', function(c){
							$('.cross1').remove();
						});
						});	  
					});
			   </script>	
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cross2').fadeOut('slow', function(c){
							$('.cross2').remove();
						});
						});	  
					});
			   </script>	
            <table class="table ">
		  <tr>
			<th class="t-head head-it ">Products</th>
			<th class="t-head">Price</th>
		<th class="t-head">Quantity</th>
		<th class="t-head">Opt</th>
          </tr>
          {{-- item rows --}}
          @foreach (Cart::content() as $item)
          <tr class="cross">
                <td class="t-data">
                    @php
                    $productId = $item->model->id;
                    $productImage = DB::table('products as p')                    
                    ->leftjoin('product_images as pi', function($leftjoin){
                    $leftjoin->on('p.id', '=', 'pi.product_id')
                    ->where('pi.id','=',DB::raw("(SELECT id FROM product_images where product_images.product_id =  p.id limit 1)"));
                    })  
                    ->where('p.id','=',$productId)
                    ->select('image')->get();
                    foreach ($productImage as  $productImg);                    
                    @endphp
                    <a href="#" class="at-in">
                        <img src="{{asset('uploads/products_images/'.$productImg->image)}}" class="img-responsive cart-img" alt="" >
                    </a>
                <div class="sed">
                    <h5>{{ $item->model->product_name}}</h5>                    
                </div>
                    <div class="clearfix"> </div>
                 </td>
                <td class="t-data"><span>&#8358;</span> {{$item->model->discount_price}}</td>
                <td class="t-data"> 
                <select name="" class="quantity" data-id="{{ $item->rowId }}">
                    @for ($i = 1; $i < 10 + 1; $i++)
                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>		
                </td>	
                <td class="t-data">
                <span class="pull-right">
                    <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="cart-options">save for later</button>
                    </form>
                </span>
                <span class="pull-right">
                        <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="cart-options">Remove</button>
                        </form>
                </span>
                
                </td>		
              </tr>              
          @endforeach
        </table>
        <div class="well">
            <strong>Subtotal: </strong><span>&#8358;</span>{{Cart::subtotal()}} 
            <span class="pull-right cart-options"><a href="{{route('cart.empty')}}">Clear cart</a></span>       
        </div>
        <div class="well">
            <a href="{{route('market.index')}}" class="btn btn-default btn-md">Continue Shopping</a>
            <a href="{{route('checkout.index')}}" type="submit" class="btn btn-danger my-cart-btn my-cart-b pull-right">Checkout</a>
            
        </div>
    @else 
        <div class="jumbotron text-center">
            <h4>No item in Cart</h4><br>
        <a href="{{route('market.index')}}" class="btn btn-default btn-md">Continue Shopping</a>
        </div>
    @endif

    {{-- for the saved later item --}}
    @if (Cart::instance('saveForLater')->count() > 0)                
        <h4>{{ Cart::instance('saveForLater')->count() }} item(s) saved for later </h4><hr>
        <table class="table ">
                <tr>
                  <th class="t-head head-it ">Products</th>
                  <th class="t-head">Price</th>
              <th class="t-head">Quantity</th>
              <th class="t-head">Opt</th>
      
                </tr>
                {{-- item rows --}}
                @foreach (Cart::instance('saveForLater')->content() as $item)
                <tr class="cross">
                      <td class="t-data">
                          <a href="single.html" class="at-in">
                              <img src="images/wi.png" class="img-responsive" alt="">
                          </a>
                      <div class="sed">
                          <h5>{{$item->name}}</h5>
                          
                      </div>
                          <div class="clearfix"> </div>
                          <div class="close1"> <i class="fa fa-times" aria-hidden="true"></i></div>
                       </td>
                      <td class="t-data">{{$item->price}}</td>
                      <td class="t-data"><div class="quantity"> 
                              <div class="quantity-select">            
                                  <div class="entry value-minus">&nbsp;</div>
                                      <div class="entry value"><span class="span-1">1</span></div>									
                                  <div class="entry value-plus active">&nbsp;</div>
                              </div>
                          </div>			
                      </td>	
                      <td class="t-data">
                        <span class="pull-right">
                            <form action="{{route('cart.moveToCart',$item->rowId)}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="cart-options">Move to cart</button>
                            </form>
                        </span>
                        <span class="pull-right">
                                <form action="{{route('cart.destroyWishlist',$item->rowId)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="cart-options">Remove</button>
                                </form>
                        </span>
                      </td>		
                    </tr>              
                @endforeach
              </table>
    @else 
        <div class="jumbotron text-center">
            <h4>No item in wish-list</h4><br>
        <a href="{{route('market.index')}}" class="btn btn-default btn-md">Continue Shopping</a>
        </div>
    @endif
    {{-- for the you might also like items --}}
    <div class="spec ">
            <h3>You might also like</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>                
                <b class="line"></b>
            </div>
    </div>
	</div>
    </div>
	<!--quantity-->
    {{-- <script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                divUpd.text(newVal);
                location.reload();
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script> --}}
	{{-- @endif --}}

</div>
</div>
</div>

@endsection
   
   @section('otherjs')

       <script>
          $(document).ready(function(){
            $('.quantity').on('change',function(qs){
                qs.preventDefault();   
                var id = $(this).data('id'); 
                var qty = $(this).val();                         
                $.ajax({
                url:'/updateCartQty/'+id,
                type:'GET',
                data:{qty:qty},
                success:function(result)
                {
                    location.reload();

                }
                });
                }); 
            });
          
       </script>
   @endsection
 
