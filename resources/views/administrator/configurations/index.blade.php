@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'site settings'}}
@endsection
@if (count($settings) > 0)

  @foreach ($settings as $setting)
  {!! Form::open(['action' => ['admin\SettingsController@update', $setting->id], 'method' => 'POST']) !!}
  {{Form::hidden('_method','PUT')}}
  @include('administrator.assets.inc.forms.settingsReadOnly')
  {!! Form::close() !!}
    
  @endforeach

  @endif
    
@endsection