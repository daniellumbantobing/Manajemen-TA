@extends('layouts.master')
@section('content')
<div class="main">
 		<div class="main-content">
 	
 			
 				@foreach($errors->all() as $error)
 				<div class="alert alert-danger" role="alert">
 					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
 					{{$error}}
					</div>
 				@endforeach
 			<div class="row">
 				<div class="col-md-12">
 				<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ubah Password</h3>
								</div>
								<div class="panel-body">
								<form action="/changepassword" method="POST" enctype="multipart/form-data">
								@csrf
						
									  <div class="form-group">
									    <label for="current_password">Password Lama</label>
									    <input name="current_password" type="Password" class="form-control" id="current_password" aria-describedby="emailHelp">
									  </div>

									  <div class="form-group">
									    <label for="new_password">Password Baru</label>
									    <input name="new_password" type="Password" class="form-control" id="new_password" aria-describedby="emailHelp">
									  </div>


									  <div class="form-group">
									    <label for="new_password_confirmation">Konfirmasi Password</label>
									    <input name="new_password_confirmation" type="Password" class="form-control" id="new_password_confirmation" aria-describedby="emailHelp">

									  </div>

							  	<button type="submit" class="btn btn-primary">Ubah Password</button>
								</form>
								</div>
							</div>

 				</div>
 			</div>
 		</div>
 	</div>
@stop
 @section('footer')


 @stop 

