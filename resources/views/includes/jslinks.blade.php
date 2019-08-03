<script src="{{asset('mainSite/js/jquery-2.1.4.min.js')}}"></script> 
<script src="{{asset('mainSite/js/JiSlider.js')}}"></script>
<!-- js for Counter -->
<script type="text/javascript" src="{{asset('mainSite/js/numscroller-1.0.js')}}"></script>
<!-- /js for Counter -->
		<script>
			$(window).load(function () {
				$('#JiSlider').JiSlider({color: '#fff', start: 3, reverse: false}).addClass('ff')
			})
		</script>
<!-- carousal -->
	<script src="{{asset('mainSite/js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(document).on('ready', function() {
		  $(".center").slick({
			dots: true,
			infinite: true,
			centerMode: true,
			slidesToShow: 2,
			slidesToScroll: 2,
			responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: true,
					centerMode: false,
					slidesToShow: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: true,
					centerMode: false,
					centerPadding: '40px',
					slidesToShow: 1
				  }
				}
			 ]
		  });
		});
	</script>
<!-- //carousal -->
	<script src="{{asset('mainSite/js/SmoothScroll.min.js')}}"></script>
<!-- start-smoth-scrolling -->
<!-- //for bootstrap working -->

<!-- start-smooth-scrolling -->
<script type="text/javascript" src="{{asset('mainSite/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('mainSite/js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smooth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<script type="text/javascript" src="{{asset('mainSite/js/bootstrap.js')}}"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 