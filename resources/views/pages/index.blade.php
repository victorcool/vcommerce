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


@endsection