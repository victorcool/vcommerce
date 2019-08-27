<div class="header">

	<div class="container">
		
		<div class="logo">
			<h1 ><a href="index.html"><img src="{{asset('uploads/healmassLogo.png')}}" class="img-fluid" style="width:4em; line-height:0%;" alt="logo"> </span></a></h1>
		</div>
		<div class="head-t">
			<ul class="card">
				@if (Auth::guest())
				<li><a href="{{ route('login') }}" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
				<li><a href="{{ route('register') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
				
				@else
				<li><a href="{{ route('myaccount') }}" ><i class="fa fa-user" aria-hidden="true"></i>My account</a></li>
				<li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
				<li>
					<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
				@endif
				
			</ul>	
		</div>
		
		{{-- <div class="header-ri">
			<ul class="social-top">
				<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
				<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
				<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
				<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
			</ul>	
		</div> --}}

			@include('market/assets.temp.navigation')
				
		</div>			
</div>