@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Add Category'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => 'admin\CategoriesController@store', 'method' => 'POST']) !!}
        @include('administrator.assets.inc.forms.createCategoryForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection