@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Create Utility'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-12">       
        {{-- {!! Form::open(['action' => 'admin\AboutController@store', 'method' => 'POST']) !!} --}}
        @include('administrator.assets.inc.forms.editUtilityForm')
        {{-- {!! Form::close() !!} --}}
    </div>
</div>
    
    
@endsection