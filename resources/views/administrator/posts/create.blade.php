@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Post'}}
@endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            @include('administrator/assets.inc.forms.createPostForm')
        {!! Form::close() !!}
    </div>
</div>
@endsection     