@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

@section('mainNavbar')
    @include('temp.mainNavbar')
@endsection
@include('temp.header') 


	<!-- footer -->
<!-- contact -->
@foreach ($settings as $setting)@endforeach
	<div class="contact" id="contact">
		<div class="container">
			<div class="w3-heading-all">
				<h3>Contact Us</h3>
			</div>
			<div class="agile-contact-grids">
				<div class="col-md-5 address">
					<h4>Contact Info</h4>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Visit Us</h5>
						<p>{{$setting->address}}</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Mail Us</h5>
							<p><a href="mailto:{{$setting->email1}}"> {{$setting->email1}}</a></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Call Us</h5>
							<p>{{$setting->phone1}}</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						<div class="col-md-2 w3-agile-address-left">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 w3-agile-address-right">
							<h5>Also Call Us</h5>
							<p>{{$setting->phone2}}</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address-row">
						
						<div class="col-md-10 w3-agile-address-right">
								<h5>Follow us on:</h5>
							<div class="row">
								<div class="col-md-2 w3-agile-address-left">
										<a href="{{$setting->facebook}}"><i class="fa fa-facebook-f fa-2x"></i></a>
								</div>
								<div class="col-md-2 w3-agile-address-left">
									<a href="{{$setting->instagram}}"><i class="fa fa-instagram fa-2x"></i></a>
								</div>
								<div class="col-md-2 w3-agile-address-left">
										<a href="{{$setting->twitter}}"><i class="fa fa-twitter fa-2x"></i></a>
								</div>	
							</div>
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-7 contact-form">
					<form action="#" method="post">
						<input type="text" name="First Name" placeholder="First Name" required="">
						<input class="email" name="Last Name" type="text" placeholder="Last Name" required="">
						<input type="text" name="Number" placeholder="Mobile Number" required="">
						<input class="email" name="Email" type="text" placeholder="Email" required="">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" value="SUBMIT">
					</form>
				</div>
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact -->
@endsection

            
    
