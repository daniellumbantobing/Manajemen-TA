<html lang="en" class="fullscreen-bg">
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css 	')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/icon.png')}}">
</head>

<body>
	 @if(session('sukses'))
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif  
<div class="login-page">
  <div class="form">
  					{!! Form::open(['url' => '/postregister','class' => 'login-form']) !!}
					<div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
					{!!Form::text('nama_depan','',['class' => 'form-control','placeholder' => 'Nama Depan'])!!}
					 @if($errors->has('nama_depan'))
					<span class="help-block">{{$errors->first('nama_depan')}}</span>
					@endif
					</div>

					<div class="form-group{{$errors->has('nim') ? ' has-error' : ''}}">
					{!!Form::text('nim','',['class' => 'form-control','placeholder' => 'NIM'])!!}
					 @if($errors->has('nim'))
					<span class="help-block">{{$errors->first('nim')}}</span>
					@endif
					</div>
					

					<div class="form-group{{$errors->has('prodi_id') ? ' has-error' : ''}}">
					<select name="prodi_id" class="form-control" id="exampleFormControlSelect1">
					@foreach($prodi as $p)
					<option value="{{$p->id}}" >{{$p->nama_prodi}}</option>
					@endforeach
					</select>
					 @if($errors->has('prodi_id'))
					<span class="help-block">{{$errors->first('prodi_id')}}</span>
					@endif
					</div>

					
					<div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
					{!!Form::text('agama','',['class' => 'form-control','placeholder' => 'Agama'])!!}
					 @if($errors->has('agama'))
					<span class="help-block">{{$errors->first('agama')}}</span>
					@endif
					</div>
					
					<div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
					<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{old('alamat')}}</textarea>
					
					</div>
					
					<div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
					<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
					<option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
					<option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
					</select>
					 @if($errors->has('jenis_kelamin'))
					<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
					@endif
					</div>
					
					<div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
					{!!Form::email('email','',['class' => 'form-control','placeholder' => 'Email'])!!}
					 @if($errors->has('email'))
					<span class="help-block">{{$errors->first('email')}}</span>
					@endif
					</div>
						
					<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
					{!!Form::text('username','',['class' => 'form-control','placeholder' => 'Username'])!!}
					 @if($errors->has('username'))
					<span class="help-block">{{$errors->first('username')}}</span>
					@endif
					</div>

					<div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
					{!!Form::password('password',['class' => 'form-control','placeholder' => 'Password'])!!}
					 @if($errors->has('password'))
					<span class="help-block">{{$errors->first('password')}}</span>
					@endif
				</div>
					<input  type="submit" class="btn btn-primary  btn-md btn-block text-uppercase" value="Daftar" style="text-align: center;">
					{!! Form::close()!!}
  </div>
</div>
								



</body>
</html>
<style>

.login-page {
padding: 15px;  
  margin: auto;
}
.form {
  background: #FFFFFF;
  width: 490px;
  margin: 0 auto;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  border-radius: 6px;
}

.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
</style>