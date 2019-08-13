@extends('layouts.master')

@section('content')
@section('boxtitle')
    {{'Edit Post'}}
    @endsection
{{-- main row --}}
<div class="row">
    <div class="col-md-10">       
        <form action="{{ route('serviceUpdate', $service->id)  }}" method="post">
        {{ csrf_field() }}
        {{-- {{Form::hidden('_method','PUT')}} --}}
        
        @include('administrator.assets.inc.forms.editServiceForm')
        </form>
        
    </div>
    <div class="col-md-2">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="{{asset('uploads/services_images/'.$service->icon)}}" width="150" alt="">
        </div>
        <div class="col-md-12 text-center">                
        <form action="{{ route('updateServiceImg', $service->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- {{Form::hidden('_method','PUT')}} --}}
            <div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
            <div class="wrap-custom-file col-md-3 col-xs-6">
                <input type="file" name="image" id="image2" accept=".gif, .jpg, .png" />
                <label  for="image2">
                    <span>Update</span>
                    <i class="fa fa-plus-circle"></i>
                </label>
            </div>
            @if($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                </span>
            @endif
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
                {{-- {!! Form::close() !!} --}}
            </div>
        </div> 
        
                   

    </div>
</div>
    
    
@endsection