@extends('layouts.master')

@section('content')
@section('boxtitle')
    <a href="{{url('administrator/about/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create about</a>
@endsection
@if (count($abouts) > 0)
<ul class="list-group">
  @foreach ($abouts as $about)
      <div class="well">
      <h4><a href="abouts/{{$about->id}}">{{$about->title}}</a></h4>
      <span>Written on {{$about->created_at}}</span>
      
      </div>
  @endforeach
  {{$abouts->links()}}
</ul> 
@else 
    <p class="text-muted">About us is empty</p>
@endif
    
@endsection