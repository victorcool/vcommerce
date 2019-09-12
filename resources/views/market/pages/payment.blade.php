@extends('layouts.market')
@section('stylesheet')

@endsection
@section('content') 

@section('sliderORvideo')
<div class="banner-top">
    <div class="container">
        <h3 >Payment</h3>    
        <h4>
            @include('market.assets.inc.historyBtn')
        </h4>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('notice')
    @include('market.notice')             
@endsection
<div class="content-top ">
<!--content-->
<div class="row">
        {{-- <div class="col-md-6 text-center noBorder_addShadow_payment">
            <img src="{{asset('assets/images/payOnDelivery.png')}}" alt="" class="img-thumbnail noBorder_addShadow" >
            <p>We have provided you with a faster and easy way to make payment securely using paystack</p>
            <br>
            <p><b>Total:</b> <span>&#8358;</span> {{Cart::instance('default')->total}}</p>
            <br>
            <a href="{{route('payment.index')}}" type="submit" class="btn btn-danger my-cart-btn my-cart-b">Order Now 
                <i class="fa fa-long-arrow-right"></i>
            </a>
        </div> --}}
        
    <div class="col-md-offset-3 col-md-6 text-center noBorder_addShadow_payment">
        <img src="{{asset('assets/images/paystack.png')}}" alt="" class="img-thumbnail noBorder_addShadow">
        <p>We have provided you with a faster and easy way to make payment securely using paystack</p>
        <br>
        <p><b>Total:</b> <span>&#8358;</span> {{Cart::instance('default')->total}}</p>
        <br>
        <a href="{{route('payment.index')}}" type="submit" class="btn btn-danger my-cart-btn my-cart-b">Continue 
            <i class="fa fa-long-arrow-right"></i>
        </a>
    </div>
</div>


</div>
@endsection
   
@section('otherjs')


    <script>
        $(document).ready(function(){
        // $('.quantity').on('change',function(qs){
        //     qs.preventDefault();   
        //     var id = $(this).data('id'); 
        //     var qty = $(this).val();                         
        //     $.ajax({
        //     url:'/updateCartQty/'+id,
        //     type:'GET',
        //     data:{qty:qty},
        //     success:function(result)
        //     {
        //         location.reload();

        //     }
        //     });
        //     }); 
        });
        
    </script>
@endsection
 
