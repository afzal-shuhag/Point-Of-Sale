<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - POS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<style media="screen">
		@font-face{font-family:Poppins-Regular;src:url(../fonts/poppins/Poppins-Regular.ttf)}@font-face{font-family:Poppins-Medium;src:url(../fonts/poppins/Poppins-Medium.ttf)}@font-face{font-family:Poppins-Bold;src:url(../fonts/poppins/Poppins-Bold.ttf)}@font-face{font-family:Poppins-SemiBold;src:url(../fonts/poppins/Poppins-SemiBold.ttf)}*{margin:0;padding:0;box-sizing:border-box}body,html{height:100%;font-family:Poppins-Regular,sans-serif}a{font-family:Poppins-Regular;font-size:14px;line-height:1.7;color:#666;margin:0;transition:all .4s;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s}a:focus{outline:0!important}a:hover{text-decoration:none;color:#fff}h1,h2,h3,h4,h5,h6{margin:0}p{font-family:Poppins-Regular;font-size:14px;line-height:1.7;color:#666;margin:0}li,ul{margin:0;list-style-type:none}input{outline:0;border:none}textarea{outline:0;border:none}input:focus,textarea:focus{border-color:transparent!important}input:focus::-webkit-input-placeholder{color:transparent}input:focus:-moz-placeholder{color:transparent}input:focus::-moz-placeholder{color:transparent}input:focus:-ms-input-placeholder{color:transparent}textarea:focus::-webkit-input-placeholder{color:transparent}textarea:focus:-moz-placeholder{color:transparent}textarea:focus::-moz-placeholder{color:transparent}textarea:focus:-ms-input-placeholder{color:transparent}input::-webkit-input-placeholder{color:#fff}input:-moz-placeholder{color:#fff}input::-moz-placeholder{color:#fff}input:-ms-input-placeholder{color:#fff}textarea::-webkit-input-placeholder{color:#fff}textarea:-moz-placeholder{color:#fff}textarea::-moz-placeholder{color:#fff}textarea:-ms-input-placeholder{color:#fff}label{margin:0;display:block}button{outline:0!important;border:none;background:0 0}button:hover{cursor:pointer}iframe{border:none!important}.txt1{font-family:Poppins-Regular;font-size:13px;color:#e5e5e5;line-height:1.5}.limiter{width:100%;margin:0 auto}.container-login100{width:100%;min-height:100vh;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:center;align-items:center;padding:15px;background-repeat:no-repeat;background-position:center;background-size:cover;position:relative;z-index:1}.container-login100::before{content:"";display:block;position:absolute;z-index:-1;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,.9)}.wrap-login100{width:500px;border-radius:10px;overflow:hidden;padding:55px 55px 37px 55px;background:#9152f8;background:-webkit-linear-gradient(top,#7579ff,#b224ef);background:-o-linear-gradient(top,#7579ff,#b224ef);background:-moz-linear-gradient(top,#7579ff,#b224ef);background:linear-gradient(top,#7579ff,#b224ef)}.login100-form{width:100%}.login100-form-logo{font-size:60px;color:#333;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;width:120px;height:120px;border-radius:50%;background-color:#fff;margin:0 auto}.login100-form-title{font-family:Poppins-Medium;font-size:30px;color:#fff;line-height:1.2;text-align:center;text-transform:uppercase;display:block}.wrap-input100{width:100%;position:relative;border-bottom:2px solid rgba(255,255,255,.24);margin-bottom:30px}.input100{font-family:Poppins-Regular;font-size:16px;color:#fff;line-height:1.2;display:block;width:100%;height:45px;background:0 0;padding:0 5px 0 38px}.focus-input100{position:absolute;display:block;width:100%;height:100%;top:0;left:0;pointer-events:none}.focus-input100::before{content:"";display:block;position:absolute;bottom:-2px;left:0;width:0;height:2px;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s;background:#fff}.focus-input100::after{font-family:Material-Design-Iconic-Font;font-size:22px;color:#fff;content:attr(data-placeholder);display:block;width:100%;position:absolute;top:6px;left:0;padding-left:5px;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.input100:focus{padding-left:5px}.input100:focus+.focus-input100::after{top:-22px;font-size:18px}.input100:focus+.focus-input100::before{width:100%}.has-val.input100+.focus-input100::after{top:-22px;font-size:18px}.has-val.input100+.focus-input100::before{width:100%}.has-val.input100{padding-left:5px}.contact100-form-checkbox{padding-left:5px;padding-top:5px;padding-bottom:35px}.input-checkbox100{display:none}.label-checkbox100{font-family:Poppins-Regular;font-size:13px;color:#fff;line-height:1.2;display:block;position:relative;padding-left:26px;cursor:pointer}.label-checkbox100::before{content:"\f26b";font-family:Material-Design-Iconic-Font;font-size:13px;color:transparent;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;position:absolute;width:16px;height:16px;border-radius:2px;background:#fff;left:0;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%)}.input-checkbox100:checked+.label-checkbox100::before{color:#555}.container-login100-form-btn{width:100%;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;flex-wrap:wrap;justify-content:center}.login100-form-btn{font-family:Poppins-Medium;font-size:16px;color:#555;line-height:1.2;display:-webkit-box;display:-webkit-flex;display:-moz-box;display:-ms-flexbox;display:flex;justify-content:center;align-items:center;padding:0 20px;min-width:120px;height:50px;border-radius:25px;background:#9152f8;background:-webkit-linear-gradient(bottom,#7579ff,#b224ef);background:-o-linear-gradient(bottom,#7579ff,#b224ef);background:-moz-linear-gradient(bottom,#7579ff,#b224ef);background:linear-gradient(bottom,#7579ff,#b224ef);position:relative;z-index:1;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.login100-form-btn::before{content:"";display:block;position:absolute;z-index:-1;width:100%;height:100%;border-radius:25px;background-color:#fff;top:0;left:0;opacity:1;-webkit-transition:all .4s;-o-transition:all .4s;-moz-transition:all .4s;transition:all .4s}.login100-form-btn:hover{color:#fff}.login100-form-btn:hover:before{opacity:0}@media (max-width:576px){.wrap-login100{padding:55px 15px 37px 15px}}.validate-input{position:relative}.alert-validate::before{content:attr(data-validate);position:absolute;max-width:70%;background-color:#fff;border:1px solid #c80000;border-radius:2px;padding:4px 25px 4px 10px;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%);right:0;pointer-events:none;font-family:Poppins-Regular;color:#c80000;font-size:13px;line-height:1.4;text-align:left;visibility:hidden;opacity:0;-webkit-transition:opacity .4s;-o-transition:opacity .4s;-moz-transition:opacity .4s;transition:opacity .4s}.alert-validate::after{content:"\f12a";font-family:FontAwesome;font-size:16px;color:#c80000;display:block;position:absolute;top:50%;-webkit-transform:translateY(-50%);-moz-transform:translateY(-50%);-ms-transform:translateY(-50%);-o-transform:translateY(-50%);transform:translateY(-50%);right:5px}.alert-validate:hover:before{visibility:visible;opacity:1}@media (max-width:992px){.alert-validate::before{visibility:visible;opacity:1}}
	</style>
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>
					@include('partials.message')
					<span class="login100-form-title p-b-34 p-t-27 mt-5" style="margin-top:10px;">
						Log in
					</span>

					@if($errors->any())
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						@foreach($errors->all() as $error)
						<strong>{{ $error }}</strong> <br>
						@endforeach
					</div>
					@endif

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" name="email" placeholder="Enter Your Email" id="email" type="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" name="password" placeholder="Enter Your Password" id="password" type="password" autocomplete="current-password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
					<div class="text-center p-t-90">
						<a class="txt1" href="{{ route('registerrr') }}">
							Create a new Account.
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript">
		!function(t){"use strict";t(".input100").each(function(){t(this).on("blur",function(){""!=t(this).val().trim()?t(this).addClass("has-val"):t(this).removeClass("has-val")})});var a=t(".validate-input .input100");function i(a){if("email"==t(a).attr("type")||"email"==t(a).attr("name")){if(null==t(a).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/))return!1}else if(""==t(a).val().trim())return!1}function n(a){var i=t(a).parent();t(i).addClass("alert-validate")}t(".validate-form").on("submit",function(){for(var t=!0,e=0;e<a.length;e++)0==i(a[e])&&(n(a[e]),t=!1);return t}),t(".validate-form .input100").each(function(){t(this).focus(function(){var a;a=t(this).parent(),t(a).removeClass("alert-validate")})});var e=0;t(".btn-show-pass").on("click",function(){0==e?(t(this).next("input").attr("type","text"),t(this).addClass("active"),e=1):(t(this).next("input").attr("type","password"),t(this).removeClass("active"),e=0)})}(jQuery);
	</script>
</body>
</html>
