<div class="header">

	<div class="container">
		
		<div class="logo">
			<h1 ><a href="index.html"><img src="{{asset('uploads/healmassLogo.png')}}" class="img-fluid" style="width:4em; line-height:0%;" alt="logo"> </span></a></h1>
		</div>
		<div class="head-t">
			<ul class="card">
				{{-- <li><a href="wishlist.html" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li> --}}
				<li><a href="login.html" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
				<li><a href="register.html" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
				<li><a href="about.html" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
				{{-- <li><a href="shipping.html" ><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li> --}}
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