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
                    <div class="col-md-3 m-wthree">
                        <div class="col-m">								
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                <img src="{{asset('assets/images/of.png')}}" class="img-responsive" alt="">
                                <div class="offer"><p><span>Offer</span></p></div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Moong</a>(1 kg)</h6>							
                                </div>
                                <div class="mid-2">
                                    <p ><label>$2.00</label><em class="item_price">$1.50</em></p>
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
                    <div class="col-md-3 m-wthree">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
                                <img src="{{asset('assets/images/of1.png')}}" class="img-responsive" alt="">
                                <div class="offer"><p><span>Offer</span></p></div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Sunflower Oil</a>(5 kg)</h6>							
                                </div>
                                <div class="mid-2">
                                    <p ><label>$10.00</label><em class="item_price">$9.00</em></p>
                                      <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                        <div class="add">
                                   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="2" data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00" data-quantity="1" data-image="images/of1.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 m-wthree">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img">
                                <img src="{{asset('assets/images/of2.png')}}" class="img-responsive" alt="">
                                <div class="offer"><p><span>Offer</span></p></div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Kabuli Chana</a>(1 kg)</h6>							
                                </div>
                                <div class="mid-2">
                                    <p ><label>$3.00</label><em class="item_price">$2.00</em></p>
                                      <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="add">
                                   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="images/of2.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 m-wthree">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal4" class="offer-img">
                                <img src="{{asset('assets/images/of3.png')}}" class="img-responsive" alt="">
                                <div class="offer"><p><span>Offer</span></p></div>
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="single.html">Soya Chunks</a>(1 kg)</h6>							
                                </div>
                                <div class="mid-2">
                                    <p ><label>$4.00</label><em class="item_price">$3.50</em></p>
                                      <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="add">
                                   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="4" data-name="Soya Chunks" data-summary="summary 4" data-price="3.50" data-quantity="1" data-image="images/of3.png">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                 </div>
            </div>     
            
            
        </div>
    </div>
    </div>
    
    </div>
    <br>
@endsection