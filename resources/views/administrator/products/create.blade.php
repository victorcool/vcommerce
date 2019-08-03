@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Products'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => 'admin\ProductsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        @include('administrator.assets.inc.forms.createProductForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection

