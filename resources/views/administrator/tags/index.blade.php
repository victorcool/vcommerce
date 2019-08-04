@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/tags/create')}}"
     class="btn btn-default"><i class="fa fa-plus"></i> Create Tag</a>
@endsection

@if (count($tags)>0)
    @include('administrator.assets.inc.tables.tags_list_tbl')    
    @else 
<h4>No Tag created</h4>

@endif


    
@endsection