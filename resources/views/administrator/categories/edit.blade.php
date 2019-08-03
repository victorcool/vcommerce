@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Edit Post'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => ['admin\CategoriesController@update', $categoryToEdit->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method','PUT')}}
        @include('administrator.assets.inc.forms.editCategoryForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection