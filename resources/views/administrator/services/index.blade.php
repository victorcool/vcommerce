@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/services/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Service</a>
@endsection

@if (count($services)>0)
    @include('administrator.assets.inc.tables.services_list_tbl')    
    @else 
<h4>No Service created</h4>

@endif


    
@endsection