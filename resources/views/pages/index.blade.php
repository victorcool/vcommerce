@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content') 

@section('mainNavbar')
    @include('temp.mainNavbar')
@endsection

@section('slider')
    @include('temp.slider')
@endsection

@include('temp.header')

<div class="row" style="padding-top:5%;padding-bottom:5%;">
    @foreach ($visionMission as $vm)
    <div class="col-md-6 text-center">
            <div class="col-md-12">
                <div class="col-md-4">
                        <embed src="{{asset('uploads/'.$vm->cover_image)}}" class="img-circle serviceImg" width="100">
                </div>
                <div class="col-md-8">
                    <h3>{{$vm->title}}</h3>
                    <p class="text-muted">{!!$vm->body!!}</p>
                    
                </div>
            </div>
        </div> 
    @endforeach
  
</div>

@endsection