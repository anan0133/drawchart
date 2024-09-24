<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Draw Chart - @lang('text.error')</title>

	<link href="{{ asset('assets/user/images/favicon.ico') }}" type="image/gif" rel="icon" >
	<!-- <link type="text/css" rel="stylesheet" href="{{ asset('js/core/libraries/bootstrap.min.js') }}"> -->
			<style>
		body {
			text-align: center;
			color: #fff;
			background-color: #f1f1f1;
			position: relative;
			height: 100vh; 
		}

		img.bg-error {
		    position: absolute;
		    height: 100%;
		    width: 100%;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    opacity: 0.7;
		}

		.error-wrapper {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			width: 40%;
			padding: 50px;
			text-align: center;
			box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
			text-shadow: 0 2px 1px hsla(0,0%,100%,.2);
			background-color: rgba(0, 0, 0, 0.5);
		}
		.logo{
			position: relative;
			margin: 10px auto;
		}
		.logo img{
			position: absolute;
			left: 0;
			top: 0;
			bottom: 0;
			right: 0;
			margin: 0 auto;
			width: 300px;
		}
		.content-error{
			margin-top: 100px;
		}
		h1 {
			font-size: 2.5em;
			margin-bottom: 0.2em;
		}

		p {
			margin-top: 1em;
			padding-bottom: 3px;
		}

		a {
			text-decoration: none;
		}

		a:hover.btn-style {
		    background: transparent;
		    border-color: #ffb400;
		}
		a:hover {
		    color: #ffb400;
		}
		.btn-style {
		    color: #fff;
		    width: 200px;
		    padding: 12px;
		    display: inline-block;
		    margin: 1.5em .5em;
		    text-transform: uppercase;
		    border: 2px solid #213047;
		    font-size: 14px;
		    font-weight: 600;
		    background: #213047;
		    transition: all 0.5s ease;
		}
		@media        screen and (max-width:1024px) {
			.error-wrapper {
				width: 80%;
			}
		}
		@media        screen and (max-width:425px) {
			.error-wrapper {
				width: 95%;
				padding: 10px;
			}
			h1 {
				font-size: 1.6em;
			}
		}
	</style>
</head>

<body>
	<img src="{{ asset('assets/admin/images/1.jpg') }}" alt="" class="bg-error">
	<div class="error-wrapper">
		<div class="logo">
			<img src="{{ asset('assets/user/images/logo.png') }}" alt="" onerror="" class="img-responsive"/>
		</div>
		<div class="content-error">
			@yield('error')
		</div>
		<hr/>
		<p>&copy; @lang('text.of') <strong>Drawchart</strong></p>
	</div>
</body>
</html>


