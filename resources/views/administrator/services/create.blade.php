@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Add Service'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => 'admin\servicesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('administrator.assets.inc.forms.createServiceForm')
        {!! Form::close() !!}
    </div>
</div>
    
@endsection