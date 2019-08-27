@extends('layouts.master')

@section('content')

@section('boxtitle')
    <a href="{{url('administrator/newMember')}}"
     class="btn btn-default"><i class="fa fa-plus"></i> Create</a>
@endsection
<form action="{{route('storeUser')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
@include('administrator.assets.inc.forms.create_newMember_form')
</form>
@endsection