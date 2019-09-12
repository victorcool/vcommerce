@extends('layouts.master')

@section('content')
@section('boxtitle')
    <a href="{{url('administrator/utility/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create utility</a>
@endsection
@if (count($abouts) > 0)
<ul class="list-group">
  @foreach ($abouts as $about)
     <tr> <div class="well noBorderButShadow">
      <h4><a href="abouts/{{$about->uid}}">{{$about->title}}</a></h4>
      <label for="label">Label:</label> <span class="label label-info"> {{$about->name}}</span> 
     <div class="pull-right "> 
        <a href="{{url('administrator/utility/'.$about->uid.'/edit')}}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
     <a href="#" class="btn btn-xs btn-default rmUtilityBtn" data-id="{{$about->uid}}"><i class="fa fa-trash text-danger"></i></a>
    </div> 
      </div></tr>
  @endforeach
  {{$abouts->links()}}
</ul> 
@else 
    <p class="text-muted">About us is empty</p>
@endif
    
@endsection