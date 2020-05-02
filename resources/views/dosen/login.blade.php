<html lang="en" class="fullscreen-bg"><head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="password">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('admin/assets/img/logo.png')}}"alt="Logo" style="width: 75px;"></div>
								<p class="lead">Login Dosen</p>
							</div>
								@if(session('sukses'))
							<div class="alert alert-danger" role="alert">
								{{session('sukses')}}
							</div>
								@endif 
							<form class="form-auth-small" action="/logind" method="POST">
								@csrf
								<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" id="signin-email" placeholder="Username" name="nidn">
									@if($errors->has('username'))
									<span class="help-block">{{$errors->first('username')}}</span>
									@endif
								</div>
								<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input name="passwords" type="passwords" class="form-control" id="signin-password" placeholder="Password">
									@if($errors->has('password'))
									<span class="help-block">{{$errors->first('password')}}</span>
									@endif
								</div>
						
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								
							</form>

								<a href="/register" class="btn btn-success btn-lg btn-block">Register</a>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Aplikasi Manajemen TA</h1>
						</div>
					</div>
					<div class="row mt-3">
            				<div class="col-12" style="margin-left: 13px;">
				              <a href="/login" class="text-light"><h4>Login</h4></a>
				            </div>
				   </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->



</body>
</html>