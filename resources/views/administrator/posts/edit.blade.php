@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Edit Post'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method','PUT')}}
        @include('administrator.assets.inc.forms.editPostForm')
        {!! Form::close() !!}
    </div>
</div>
    
    
@endsection