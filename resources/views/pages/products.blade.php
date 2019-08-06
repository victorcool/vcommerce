@extends('layouts.app')

@section('content') 
@section('topNavbar')
    @include('temp.topNavbar')
@endsection

@section('mainNavbar')
    @include('temp.mainNavbar')
@endsection

@include('temp.header')

<div class="content-top ">
    <div class="container ">
            <div class="spec ">
                <h3>Our Products</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
<div class="tab-head ">
<div class=" tab-content tab-content-t ">
<div class="tab-pane active text-style" id="tab1">
<div class="con-w3l">
    @foreach ($products as $product)
    <div class="col-md-3 m-wthree">
            <div class="col-m">								
                <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                    <img src="{{asset('assets/images/of.png')}}" class="img-responsive" alt="">
                    <div class="offer"><p><span>Offer</span></p></div>
                </a>
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
                    <div class="add">
                        <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach

    <div class="clearfix"></div>
    </div>
</div>           
        </div>
    </div>
    </div>
    
    </div>
    <br>
@endsection