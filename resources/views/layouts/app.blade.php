<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('includes.head')
</head>
<body>
<!-- header -->
@yield('content')
<!-- //banner -->

<!-- footer -->
@include('temp.footer')
<!-- //footer -->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	@include('includes.jslinks')
	@yield('jslink')
{{-- // --}}
</body>
</html>