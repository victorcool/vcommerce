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
@endsection

            
    
