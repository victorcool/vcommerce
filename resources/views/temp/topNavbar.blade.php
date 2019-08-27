
<div class="header">
	<div class="container">
			<div class="header-left">
				<div class="agileinfo-phone">
					
					@if (Auth::guest())
					<a href="{{route('login')}}" class="topNavbar_menu"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
					<span class="topNavbar_menu_divider">|</span>
					<a href="{{route('register')}}" class="topNavbar_menu"> Register</a>
					@else 
						<a href="{{ route('myaccount') }}" class="topNavbar_menu" ><i class="fa fa-user" aria-hidden="true"></i> My account</a>
						<span class="topNavbar_menu_divider">|</span>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
										document.getElementById('logout-form').submit();" class="topNavbar_menu">
							Logout
						</a>
	
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					
					@endif
				</div>
				
				{{-- <div class="search-grid">
					<form action="#" method="post">
						<input type="text" name="subscribe" placeholder="Search" class="big-dog" name="Subscribe" required="">
						<button class="btn1"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div> --}}
				<div class="clearfix"> </div>
			</div>
		</div>	
		</div> 