<div class="nav-top">
	<nav class="navbar navbar-default">
	
	<div class="navbar-header nav_2">
		<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div> 
	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
		<ul class="nav navbar-nav ">
		<li class=" active"><a href="{{url('/')}}" class="hyper "><span>Home</span></a></li>	
			@if (count($categories) > 0)
				@foreach ($categories as $category)
					@if (! $category->subcategories->isEmpty())
					<li class="dropdown ">
							<a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span>{{$category->category_name}}<b class="caret"></b></span></a>
							<ul class="dropdown-menu multi">
								<div class="row">
									@foreach ($category->subcategories as $subcateg)
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">				
											<li><a href="{{url('market/showroom/subcategory/'.$subcateg->id)}}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{$subcateg->subcateg_name}}</a></li>												
										</ul>										
										</div>
									@endforeach								
									<div class="col-sm-3 w3l">
										<a href="kitchen.html"><img src="images/me.png" class="img-responsive" alt=""></a>
									</div>
									<div class="clearfix"></div>
								</div>	
							</ul>
						</li>
					@else
						<li><a href="{{url('market/showroom/category/'.$category->id)}}" class="hyper "><span>{{$category->category_name}}</span></a></li>
					@endif
				@endforeach
			@endif
			
			
		</ul>
	</div>
	</nav>
	 <div class="cart" >
	
		<span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
	</div>
	<div class="clearfix"></div>
</div>