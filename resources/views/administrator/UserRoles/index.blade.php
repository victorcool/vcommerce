@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/UserRoles/create')}}"
     class="btn btn-default"><i class="fa fa-plus"></i> Create role</a>
@endsection

@if (count($roles)>0)
    @include('administrator.assets.inc.tables.roles_list_tbl')    
    @else 
<h4>No role created</h4>

@endif


    
@endsection