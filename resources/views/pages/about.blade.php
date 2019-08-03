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

<!-- about-page --> 
<div class="about">
		<div class="container">
		<div class="w3-heading-all">
        <h3>About {{config('app.name')}}</h3>
		    </div>
			<div class="agileits_w3layouts_team_grids w3ls_about_grids new-agileinfo">
				<div class="col-md-6 w3ls_banner_bottom_left w3ls_about_left">
					<div class="w3ls_about_left_grids">
						<div class="w3ls_about_left_grid">
							<h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>pulvinar neque pharetra eget</h3>
							<p>Pellentesque convallis diam consequat magna vulputate malesuada. 
								Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.</p>
						</div>
						<div class="w3ls_about_left_grid">
							<h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>consequat magna vulputate</h3>
							<p>Pellentesque convallis diam consequat magna vulputate malesuada. 
								Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.</p>
						</div>
						<div class="w3ls_about_left_grid">
							<h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i>convallis diam consequat magna</h3>
							<p>Pellentesque convallis diam consequat magna vulputate malesuada. 
								Cras a ornare elit. Nulla viverra pharetra sem, eget pulvinar neque pharetra ac.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 agileits_about_right">
					<img src="{{asset('mainSite/images/ab11.jpg')}}" alt=" " class="img-responsive"/>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->

<!-- Counter -->
<div class="stats">
	<div class="container">	
		<div class="row">
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-1 gridw3">
				<i class="fa fa-smile-o" aria-hidden="true"></i>
				<div class="numscroller" data-slno='1' data-min='0' data-max='158' data-delay='3' data-increment="1">85</div>
				<h4>Happy Customers</h4>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-2 gridw3">
				<i class="fa fa-trophy" aria-hidden="true"></i>
				<div class="numscroller" data-slno='1' data-min='0' data-max='63' data-delay='3' data-increment="1">95</div>
				<h4>Awards </h4>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-3 gridw3">
				<i class="fa fa-laptop" aria-hidden="true"></i>
				<div class="numscroller" data-slno='1' data-min='0' data-max='421' data-delay='3' data-increment="1">80</div>
				<h4>collaboration</h4>
			</div>
			<div class="col-md-3 col-sm-3 stats-grid stats-grid-4 gridw3">
				<i class="fa fa-users" aria-hidden="true"></i>
				<div class="numscroller" data-slno='1' data-min='0' data-max='562' data-delay='3' data-increment="1">90</div>
				<h4>Members</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //Counter -->

	<!-- team -->
<div class="team" id="team">
	<div class="container">
		<div class="w3-heading-all">
				<h3>Our Team</h3>
			</div>
		<div class="teamgrids">
			<div class="col-md-3 teamgrid1">
				<img src="images/tm1.jpg" alt="" />
				<div class="teaminfo">
					<h3>marry</h3>
					<div class="team-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
					<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i> surgery dept</p>
					<p><i class="fa fa-phone" aria-hidden="true"></i> +02 133 4567</p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"> mail@example.com</a></p>
				</div>
			</div>
			<div class="col-md-3 teamgrid1">
				<img src="images/tm2.jpg" alt="" />
				<div class="teaminfo">
					<h3> Robert</h3>
					<div class="team-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
					<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Senior surgeon</p>
					<p><i class="fa fa-phone" aria-hidden="true"></i> +02 133 4568</p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"> mail@example1.com</a></p>
				</div>
			</div>
			<div class="col-md-3 teamgrid1">
				<img src="images/tm3.jpg" alt="" />
				<div class="teaminfo">
					<h3>Mitchel</h3>
					<div class="team-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
					<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Fertility Consultant</p>
					<p><i class="fa fa-phone" aria-hidden="true"></i> +02 133 4569</p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"> mail@example2.com</a></p>
				</div>
			</div>
			<div class="col-md-3 teamgrid1">
				<img src="images/tm4.jpg" alt="" />
				<div class="teaminfo">
					<h3> Paul steve</h3>
					<div class="team-social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest-p"></i></a>
					</div>
					<p><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Managing Director</p>
					<p><i class="fa fa-phone" aria-hidden="true"></i> +02 133 4570</p>
					<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"> mail@example3.com</a></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //team -->

@endsection

            
    
