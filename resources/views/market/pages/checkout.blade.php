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

<div class="container">
{{-- form --}}
<div class="row" style="padding-bottom:2%;">
        
    <div class="col-md-6">
        <span style="font-weight:bold;font-size:20px;"><strong>Billing details.</strong></span><br><br>
    <form action="{{route('checkout.store')}}"  method="POST">
      {{ csrf_field() }}
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email Address</label>
        <input type="email" class="form-control" value="{{Auth::user()->email}}" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Name</label>
          <input type="text" class="form-control" value="{{Auth::user()->name}}" id="inputPassword4" placeholder="Password">
        </div>
      </div>
      <div class="row">
          <div class="form-group col-md-6">
            <label for="inputCity">Phone Number1</label>
            <input type="number" value="{{Auth::user()->phoneNumber}}" class="form-control" id="inputPhone1">
            <small class="form-text">Your active line pls</small>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Phone Number2</label>
            <input type="number" class="form-control" id="inputPhone2">
            <small class="form-text">Incase will cant reach you, we will call this</small>
          </div>        
        </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
      </div>
      
      <div class="row">
        <div class="form-group col-md-6">
          <label for="inputCity">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-6">
          <label for="inputState">State</label>
          <select id="inputState" class="form-control">
            <option selected>Choose...</option>
            @foreach ($states as $state)
          <option value="">{{$state->title}}</option>
            @endforeach
          </select>
        </div>        
      </div>
    </div>

    <div class="col-md-6">
        <span style="font-weight:bold;font-size:20px;"><strong>Your Order</strong></span><br><br><br>
           {{-- for the saved later item --}}
    @if (Cart::instance('default')->count() > 0)                
        <table class="table ">
                <tr>
                  <th class="t-head head-it ">Products</th>
                  <th class="t-head">Price</th>
                  <th class="t-head">Quantity</th>      
                </tr>
                {{-- item rows --}}
                @foreach (Cart::instance('default')->content() as $item)
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
                          <h5>{{$item->name}}</h5>                          
                      </div>
                         <div class="clearfix"> </div>                          
                      </td>
                      <td class="t-data"><span>&#8358;</span> {{$item->subtotal}}</td>
                      <td class="t-data">
                        <div class="quantity"> 
                          <div class="quantity-select">            
                             <div class="entry value"><span class="span-1">{{$item->qty}}</span></div>									
                          </div>
                        </div>			
                      </td>	                      	
                  </tr>              
                @endforeach
              </table>
              {{-- <div class="pull-right">
                  <a href="{{route('payment.index')}}" type="submit" class="btn btn-danger my-cart-btn my-cart-b pull-right">Continue 
                    <i class="fa fa-long-arrow-right"></i>
                  </a>
              </div> --}}
             
              {{-- to display the total and subtotal --}}
              
              <div class="row">
                <div class="noBorder_addShadow">
                  <div class="col-md-3">
                      <p>Subtotal: <b><span>&#8358;</span> {{Cart::instance('default')->subtotal}}</b></p>
                      <p>Delivery fee: <b>{{$item->tax}}</b></p>
                      <p><b>Total: </b><span>&#8358;</span> {{Cart::instance('default')->subtotal}}</p>
                  </div>

                  <div class=" col-md-5 text-center">
                    <img src="{{asset('assets/images/paystack.png')}}" alt="" class="img-thumbnail noBorder_addShadow">                     
                  </div>

                  <div class="col-md-2">
                      <input type="submit" class="btn btn-danger my-cart-btn my-cart-b" value="Complete order">
                  </div>

                  </div>
    </form>

    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
            <p>
                <div>
                    Lagos Eyo Print Tee Shirt
                    ₦ 2,950
                </div>
            </p>
            <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="3">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}


            <p>
              <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
            </p>
          </div>
        </div>
</form>

                </div>
              </div>

              
              @endif
    </div>
</div>    
</div>
	<!--quantity-->
    <script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
        divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script>
	{{-- @endif --}}

</div>
</div>
</div>

@endsection
   
   
 
