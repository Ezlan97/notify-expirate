<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.head')
@include('layouts.style')
<body>
	@include('layouts.navbar')	
	
	<div class="container">
		@include('layouts.notify')
		@yield('content')
	</div>
	
	@include('layouts.footer')
	@include('layouts.script')
</body>
</html>
