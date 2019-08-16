@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Edit role'}}
@endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['action' => ['admin\RolesController@update', $role->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method','PUT')}}
            @include('administrator/assets.inc.forms.editRoleForm')
        {!! Form::close() !!}
    </div>
</div>
@endsection     