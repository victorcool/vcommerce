@extends('layouts.market')

@section('content')   
@include('market.assets.temp.slider') 

{{-- we are including only slider without sidebar --}}
@include('market.assets.temp.onlySlider')  
{{-- <h1>{{ $title }}</h1>
    @if(count($services) > 0)
        <ul>
            @foreach ($services as $service)
                <li>{{ $service }}</li>
            @endforeach
        </ul>
    @endif --}}
@endsection