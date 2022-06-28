<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecom</title>
	<link rel="stylesheet" href="{{ asset('backend/common/font-awesome/css/all.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/common/bootstrap/scss/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/master.css') }}" />
	<script src="{{ asset('backend/common/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/nl.js') }}"></script>
	@stack('css')
</head>
<body>
	<form id="logout" action="{{ route('admin.logout') }}" method="post">@csrf</form>
    <!-- Everything wrapped by .main_wrap -->
	<div class="main_wrap">
		<!-- aside nav is relative to its inner content and 100vh height -->
		@include('backend.layouts.inc.aside')
		<div class="content_wrap">
			@include('backend.layouts.inc.top_nav')
			<div class="main_content">
				@yield('content')
			</div>
		</div>
	</div>

	<script src="{{ asset('backend/common/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
	@stack('js')
</html>