@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Sub Category'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => 'admin\TagsController@store', 'method' => 'POST']) !!}
        @include('administrator.assets.inc.forms.createTagForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection