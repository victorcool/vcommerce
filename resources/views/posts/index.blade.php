@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Post</h1>
    @if(count($posts) > 0)
    
        @foreach ($posts as $post)
        <div class="well">
            <h3>{{$post->title}}</h3>
        <small>Written on {{$post->created_at}}<small>
        </div>
        @endforeach
    
    @else
        <p>No post found</p>
    @endif
</div>
@endsection