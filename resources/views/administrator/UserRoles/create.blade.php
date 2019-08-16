@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Post'}}
@endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['action' => 'admin\RolesController@store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        @include('administrator/assets.inc.forms.createRoleForm')
        {!! Form::close() !!}
    </div>
</div>
@endsection     