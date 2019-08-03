@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Sub Category'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => ['admin\subCategsController@update', $subcategory->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method','PUT')}}
        @include('administrator.assets.inc.forms.editSubCategForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection