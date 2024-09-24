<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="{{ $settings['meta_keywords'] }}">
	<meta name="description" content="{{ $settings['meta_description'] }}">
	<title>{{ $settings['site_title'] }}</title>

	<link href="{{ asset('assets/user/images/favicon.ico') }}" type="image/gif" rel="icon" >
	@include('user.templates.head')
	<script src="{{ asset('assets/user/libs/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/slick/slick.min.js') }}"></script>	
	<script src="{{ asset('assets/user/libs/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/wow.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/picker_color.js') }}"></script>
	<script src="{{ asset('assets/user/libs/spectrum.js') }}"></script>
	<script src="{{ asset('assets/user/libs/sweetalert-master/dist/sweetalert.min.js') }}"></script>

	<script src="{{ asset('assets/user/libs/chart.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/chart.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/blob.js') }}"></script>
	<script src="{{ asset('assets/user/libs/canvas-toBlob.min.js') }}"></script>
	<script src="{{ asset('assets/user/libs/fileSaver.min.js') }}"></script>

	<style type="text/css">
		.preloading {
		    overflow: hidden;
		}
		.preload-container {
		    width: 100%;
		    height: 100%;
		    background: #213047;
		    position: fixed;
		    top: 0;
		    bottom: 0;
		    right: 0;
		    left: 0;
		    z-index: 99999999999;
		    display: block;
		    padding-right: 17px;
		    overflow-x: hidden;
		    overflow-y: auto;
		}
		.preload-icon {
		    left: 50%;
		    position: absolute;
		    top: 50%;
		    transform: translate(-50%);
		}
		.preload-icon img {
		    width: 75px;
    		height: 75px;
		}
	</style>
</head>

<body id="page-top">	

	@include('user.templates.header')

	<!-- Page container -->
	<div class="page-container">		
		<!-- Page content -->
		<div class="page-content preloading">
			<!-- Preload -->
			<div id="preload" class="preload-container text-center">
				<div class="preload-icon">	
			    	<img src="assets/user/images/chart-preloader.gif" alt="">
			    </div>
			</div>
			<!-- / Preload -->
			<!-- Main content -->
			<div class="content-wrapper">

				@yield('content')
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->

	@include('user.templates.footer')
	
</body>
	
</html>


<script type="text/javascript">
    $(window).load(function() {
        $('page-content').removeClass('preloading');
        $('#preload').delay(1000).fadeOut('fast');
    });
</script>