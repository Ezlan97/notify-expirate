<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
@include('layouts.style')
<body id="page-top">
	@include('layouts.navbar')	
	
	<div class="container">
		@yield('content')		
	</div>
	
	@include('layouts.footer')
	@include('layouts.script')
</body>
</html>
