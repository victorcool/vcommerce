@extends('layouts.app')

@section('content')
@include('temp.mainNavbar')
<div class="breadcrumb"></div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
    </div>
</div>
@endsection
