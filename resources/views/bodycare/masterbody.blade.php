<!DOCTYPE html>
<html>
<head>
@include('bodycare.frontend.partial.head')
</head>
<body>
@include('bodycare.frontend.partial.menutop')
@include('bodycare.frontend.partial.navmenu')
@if(url('/'))
	@include('bodycare.frontend.partial.banner')
@endif
@yield('content')
@if(url('/'))
	@include('bodycare.frontend.partial.news')
@endif
@include('bodycare.frontend.partial.footer')
@include('bodycare.frontend.partial.js')
</body>
</html>

