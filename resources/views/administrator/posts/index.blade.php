@extends('layouts.master')

@section('content')
@section('boxtitle')
    <a href="{{url('administrator/posts/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create Post</a>
@endsection
@if (count($posts) > 0)
<ul class="list-group">
  @foreach ($posts as $post)
      <div class="well">
      <h4><a href="posts/{{$post->id}}">{{$post->title}}</a></h4>
      <span>Written on {{$post->created_at}}</span>
      
      </div>
  @endforeach
  {{$posts->links()}}
</ul> 
@endif
    
@endsection