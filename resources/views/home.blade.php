@extends('layouts.app')

@section('content')
@include('temp.mainNavbar')
<div class="breadcrumb"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default noBorder_addShadow">
                <div class="panel-heading">Activity List</div>

                <div class="panel-body ">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="list-group noBorder_addShadow">
                        <a href="{{url('/myaccount/profile')}}"><li class="list-group-item">My profile</li></a>
                        <a href="{{url('/myaccount/profile')}}"><li class="list-group-item">Settings</li></a>
                        <a href="{{url('/myaccount/profile')}}"><li class="list-group-item">Order history</li></a>
                        <a href="{{url('/myaccount/profile')}}"><li class="list-group-item">My ads</li></a>
                        <a href="{{url('/myaccount/profile')}}"><li class="list-group-item">Active Order</li></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron text-center noBorder_addShadow">
                <h4 class="text-default">You have no Order</h4>
                <div class="add">
                <a href="{{route('market.index')}}" class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Continue Shopping</a>
                </div><br>
                <div class="add">
                    <a href="{{route('cart.index')}}" class="btn btn-default my-cart-btn my-cart-b">GoTo Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
