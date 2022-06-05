
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{$title ?? ''}}</title>
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

	<style>
        body {
            min-height: 100vh;
            position: relative;
            font-size: 14px;
            letter-spacing: 0.05em;
            color: #2A2F5B;
        }
		.login {
            /* background: #efefee; */
            /* background: linear-gradient(-45deg, #2A20AC, #6861CE) !important; */
            background: linear-gradient(-45deg, #2072ac, #3e7e64);
            /* background-image: url('{{asset("front/img/login-bg1.jpg")}}');
            background-size: cover;
            background-position: center;
            image-rendering: pixelated; */
		}
        .wrapper {
            min-height: 100vh;
            position: relative;
            top: 0;
            height: 100vh;
        }
        .login .wrapper.wrapper-login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: unset;
            padding: 15px;
        }
        .login .wrapper.wrapper-login .container-login:not(.container-transparent), .login .wrapper.wrapper-login .container-signup:not(.container-transparent) {
            background: #ffffff;
            -webkit-box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%);
            -moz-box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
            box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%);
            border: 1px solid #ebecec;
        }
        .login .wrapper.wrapper-login .container-login, .login .wrapper.wrapper-login .container-signup {
            width: 400px;
            padding: 60px 25px;
            border-radius: 5px;
        }
        .login .wrapper.wrapper-login .container-login h3, .login .wrapper.wrapper-login .container-signup h3 {
            font-size: 19px;
            font-weight: 600;
            margin-bottom: 25px;
        }
        .form-floating-label {
            position: relative;
        }
        .input-border-bottom {
            border-width: 0 0 1px 0;
            border-radius: 0px;
            padding: .75rem 0;
            background: transparent !important;
        }
        .form-floating-label .placeholder {
            position: absolute;
            padding: .375rem .75rem;
            transition: all .2s;
            opacity: 0.8;
            margin-bottom: 0 !important;
            font-size: 14px !important;
            font-weight: 400;
            top: 12px;
        }
        .input-border-bottom {
            border-width: 0 0 1px 0;
            border-radius: 0px;
            padding: .75rem 0;
            background: transparent !important;
        }
        .login .show-password {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            cursor: pointer;
        }
        .form-group, .form-check {
            margin-bottom: 0;
            padding: 10px;
        }
        .custom-control.custom-radio, .custom-control.custom-checkbox {
            margin-bottom: 0;
            padding-left: 2em;
            cursor: pointer;
            line-height: 24px;
            margin-right: 25px;
            display: inline-block;
        }
        .login .wrapper.wrapper-login .container-login .form-sub, .login .wrapper.wrapper-login .container-signup .form-sub {
            align-items: center;
            justify-content: space-between;
            padding: 8px 10px;
        }
        .login .wrapper.wrapper-login .container-login .form-action, .login .wrapper.wrapper-login .container-signup .form-action {
            text-align: center;
            padding: 25px 10px 0;
        }
        .login .wrapper.wrapper-login .container-login .btn-login, .login .wrapper.wrapper-login .container-signup .btn-login {
            padding: 15px 0;
            width: 135px;
        }
        .login .wrapper.wrapper-login .container-login .login-account, .login .wrapper.wrapper-login .container-signup .login-account {
            padding-top: 10px;
            text-align: center;
        }
	</style>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/demo.css')}}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">


		<div class="container container-login animated fadeIn">
            <h3 class="text-center">New Password</h3>
			<div class="login-form">
                <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group form-floating-label">
                        <input id="email" type="email" name="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" class="placeholder">Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="@error('password') is-invalid @enderror form-control input-border-bottom" required>
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>   
                    <div class="form-group form-floating-label">
                        <input  id="password_confirmation" name="password_confirmation" type="password" class="form-control input-border-bottom" required>
                        <label for="password_confirmation" class="placeholder">Confirm Password</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				    </div>                 
                    <div class="form-action">
                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Reset Now</button>
                    </div>
                </form>
			</div>
		</div>

	</div>
	

    <!--   Core JS Files   -->
    <script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>

</body>
</html>