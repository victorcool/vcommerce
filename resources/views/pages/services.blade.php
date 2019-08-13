@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

@section('topNavbar')
    @include('temp.topNavbar')
@endsection

@section('mainNavbar')
    @include('temp.mainNavbar')
@endsection

@include('temp.header') 

{{-- main content --}}
    @if (count($services)>0)
    <div class="row" style="padding:5%; background:#fcfcfc">
        @foreach ($services as $service)
        <div class="col-md-4 text-center">
        <embed src="{{asset('uploads/services_images/'.$service->icon)}}" class="img-circle serviceImg">
        <h4>{{$service->title}}</h4>
        <div>{{$service->description}}</div>
        </div> 
        
        @endforeach
    </div>
    @else
    <div class="jumbotron text-center">
    <embed src="{{asset('uploads/healmassLogo.png')}}" type="" style="width:200px"><p class="text-muted">No Service</p>       
    </div>
    @endif
@endsection

            
    
