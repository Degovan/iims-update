<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inventory Management System</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="description" content="siAkad Cloud solusi terbaik Perguruan Tinggi. Langsung Bisa Digunakan, Tidak Ribet dan Pelaporan Beres.">
<meta name="keywords" content="">
<meta name="author" content="siAkad Cloud">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<style type="text/css">
 body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #f2f2f2;
    background-repeat: no-repeat
}
.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}
.card2 {
    margin: 0px 40px
}
.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 30px
}
.image {
    width: 360px;
    height: 230px
}
.border-line {
    border-right: 1px solid #EEEEEE
}
.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}
.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}
.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}
.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}
.or {
    width: 10%;
    font-weight: bold
}
.text-sm {
    font-size: 14px !important
}
::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}
:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}
::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}
input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}
input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}
button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
a {
    color: inherit;
    cursor: pointer
}
.btn-blue {
    background-color: #1a0250;
    width: 150px;
    color: #fff;
    border-radius: 2px
}
.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}
.bg-blue {
    color: #fff;
    background-color:#1a0250;
}
@media screen and (max-width: 991px) {
    .logo {
        margin-left: 20px
    }
    .image {
        width: 300px;
        height: 220px
    }
    .border-line {
        border-right: none
    }
    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>
</head>
<body class="login-page">
<div class="container px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
	<div class="card card0 border-0">
		<div class="row d-flex" style="margin-bottom: -70px;">
			<div class="col-lg-6">
				<div class="card1 pb-5" style="background-image:url('/assets/images/background-login.png'); width: 110%; height: 85.5%;" >
					<div class="row">
						<img src="asset/img/logo.png" style=" width: 60px; height: 50px;" class="logo">
					</div>
					<div class="row mt-4 mb-5 border-line">
						<p src="" class="" >
                            <h3 style="margin-left: 50px; margin-top: 30%; color: #297373;"><p>Selamat Datang<br>
                                <small style="color: white;"><b style="text-decoration: underline;">Inventory Management System</b><br><b style="color: #f3c969;">PT</b></small>
                            </h3> 
                        </p>
					</div>      
				</div>
			</div>
			<div class="col-lg-6">
                <form method="POST" action="{{ route('login') }}">
                @csrf
				<div class="card2 card border-0 px-4 py-5">
					<div class="row px-3 mb-4">
						<h3 class="text-center">Silahkan Login</h3> 
					
					</div>
                    
					<div class="row px-3">
						<label class="mb-1">
						<h6 class="mb-0 text-sm">Email Address</h6>
						</label>
                        <input class="mb-4 input-line @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter a valid email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="row px-3">
						<label class="mb-1">
						<h6 class="mb-0 text-sm">Password</h6>
						</label>
                        <input type="password" name="password" placeholder="Enter password" class="input-line @error('password') is-invalid @enderror" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="row px-3 mb-4">
						<div class="custom-control custom-checkbox custom-control-inline">
							<input id="chk1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                            <label for="chk1" class="custom-control-label text-sm">{{ __('Remember Me') }}</label>
						</div>
						<a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
					</div>
					<div class="row px-3">
						<button type="submit" class="btn btn-blue text-center">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
					</div>
				</div>
                </form>
			</div>
		</div>
		<div class="bg-blue py-4">
			<div class="row px-3">
				<small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. ims.</small>
				<!-- <div class="social-contact ml-4 ml-sm-auto">
					<span class="fa fa-facebook mr-4 text-sm"></span>
                    <span class="fa fa-google-plus mr-4 text-sm"></span>
                    <span class="fa fa-linkedin mr-4 text-sm"></span>
                    <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
				</div> -->
			</div>
		</div>
	</div>
</div>
<!-- jQuery 2.0.2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</body>
</html>
