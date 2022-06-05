<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>403</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{url('front/icon/idn.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('atlantis/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{asset("atlantis/assets/css/fonts.min.css")}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.min.css')}}">

    <style>

        .page-not-found {
            background-image: url('{{asset("atlantis/assets/img/bg-404.jpeg")}}');
            background-size: cover;
            background-position: center;
            image-rendering: pixelated;
        }
        .wrapper {
            min-height: 100vh;
            position: relative;
            top: 0;
            height: 100vh;
        }
        .page-not-found .wrapper.not-found {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.61);
        }
        .page-not-found .wrapper.not-found h1 {
            font-size: 100px;
            letter-spacing: .15em;
            font-weight: 600;
            animation-delay: .5s;
        }
        .page-not-found .wrapper.not-found .desc {
            font-size: 27px;
            text-align: center;
            line-height: 50px;
            animation-delay: 1.5s;
            letter-spacing: 2px;
        }
        .page-not-found .wrapper.not-found .btn-back-home {
            border-radius: 50px;
            padding: 13px 25px;
            animation-delay: 2.5s;
        }

    </style>

</head>
<body class="page-not-found">
	<div class="wrapper not-found">
		<h1 class="animated fadeIn">403</h1>
		<div class="desc animated fadeIn">
            <span style="font-size: 30px;">Forbidden !</span><br/>
            <p style="font-size: 20px; line-height: 30px; letter-spacing: 1px;">Access to this resource on the server is denied! <br> 
            You don’t have permission to access on this server</p>
            
        </div>
		<a href="/" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
			<span class="btn-label mr-2">
				<i class="flaticon-home"></i>
			</span>
			Back To Home
		</a>
	</div>

    <!--   Core JS Files   -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>

</body>
</html>