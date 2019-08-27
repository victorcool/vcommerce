@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

@section('mainNavbar')
    @include('temp.mainNavbar')
@endsection

@include('temp.header') 

<!-- about-page --> 
<div class="about">
		<div class="container">
		<div class="w3-heading-all">
        <h3> {{config('app.name')}}</h3>
		    </div>
			<div class="agileits_w3layouts_team_grids w3ls_about_grids new-agileinfo">
					<div class="col-md-6 agileits_about_right">
						<img src="{{asset('mainSite/images/ab11.jpg')}}" alt=" " class="img-responsive"/>
					</div>
				<div class="col-md-6 w3ls_banner_bottom_left w3ls_about_left">
					<div class="w3ls_about_left_grids">
						@foreach ($histories as $history)
							
						@endforeach
						<div class="w3ls_about_left_grid">
						<h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{$history->title}}</h3>
						<p>
							{{ str_limit(strip_tags($history->body), 400) }}
							@if (strlen(strip_tags($history->body)) > 50)
							<a href="#moreHistory" class="btn btn-info btn-xs">Read More</a>
						  @endif
						</p>
						</div>
						
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->

<!-- Counter -->
@include('includes.counter');
<!-- //Counter -->

	<!-- team -->
	@include('includes.team');
<!-- //team -->

@endsection

            
    
