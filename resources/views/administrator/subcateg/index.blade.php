@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/subcateg/create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Add subCategory</a>
@endsection

@foreach ($categories as $category)
    
    
<!-- timeline item -->
@if (! $category->subcategories->isEmpty())
<ul class="timeline">
<!-- timeline time label -->
    <li class="time-label">
            <span class="bg-green">
                {{$category->category_name}}
            </span>
        </li>
        <!-- /.timeline-label -->
            @foreach ($category->subcategories as $subcateg)
            <li>
                    <!-- timeline icon -->
                    <i class="fa fa-long-arrow-right bg-aqua"></i>
                    <div class="timeline-item">
                        <span class="time"><a href="subcateg/{{$subcateg->id}}/edit"><i class="fa fa-pencil"></i> edit</a></span>
                        <span class="time">
                                {!! Form::open(['action' => ['admin\subCategsController@destroy', $subcateg->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('remove',['class' => 'btn btn-default btn-xs'])}}
                                {!! Form::close() !!}
                        </span>            
                    <h3 class="timeline-header"><a href="{{$subcateg->id}}">{{$subcateg->subcateg_name}}</a></h3>
            
                    </div>
                </li>
            @endforeach
    </ul>
        @endif
        
        <!-- END timeline item -->
@endforeach
        
    
        
    
    
@endsection