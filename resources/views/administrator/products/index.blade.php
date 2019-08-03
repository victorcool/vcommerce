@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/products/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Product</a>
@endsection

@if (count($products)>0)
    @include('administrator.assets.inc.tables.products_list_tbl')    
    @else 
<h4>No Product created</h4>

@endif


    
@endsection