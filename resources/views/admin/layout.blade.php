<!DOCTYPE html>
<head>
@include('admin.partials.header')
</head>
<body>
@include('admin.partials.nav')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@include('admin.partials.messages')
		@yield('content')
		
</section>
 @include('admin.partials.footer')
</section>
<!--main content end-->
</section>
</body>
</html>
