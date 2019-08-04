@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Edit Products'}} 
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => 'admin\ProductsController@store', 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
        @include('administrator.assets.inc.forms.editProductForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection

