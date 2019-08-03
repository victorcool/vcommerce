@extends('layouts.master')

@section('content')
      <a href="#" onclick="history.back()" class="btn btn-default">Go back</a>      
      <h1>{{$post->title}}</h1>

      <div>{!! $post->body !!}</div>
      <hr>
<small>written on {{$post->created_at}}</small>
<hr>
<a href="../posts/{{$post->id}}/edit" class="btn btn-sm btn-default">Edit</a>

{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
{!! Form::hidden('_method','DELETE')!!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
{!! Form::close() !!}
     
@endsection