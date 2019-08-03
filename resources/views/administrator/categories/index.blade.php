@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/categories/create')}}" class="btn btn-sm btn-info btn-flat"><i class="fa fa-plus"></i> Add Category</a>
@endsection

@if (count($categories)>0)
    @include('administrator.assets.inc.tables.categ_list_tbl')    
    @else 
<h4>No Category created</h4>

@endif


    
@endsection