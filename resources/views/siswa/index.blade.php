@extends('layouts.master')
@section('title','Siswa')
@section('content')

 	<div class="main">
 		<div class="main-content">
 			<!-- @if(session('sukses'))
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif  -->
 			@if(count($data_siswa))
 			<div class="row">
 				<div class="col-md-12">
 					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
									<div class="left">
									<a href="/siswa/exportexel" class="btn btn-primary" target="_balank">Export Exel</a>
									<a href="/siswa/exportpdf" class="btn btn-primary">Export PDF</a>
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
									<div class="right">
										<form class="navbar-form navbar-left" method="get" action="/siswa/cari">
											<div class="input-group">
												<input type="text" value="{{old('cari')}}" name="cari" class="form-control" placeholder="Cari data Mahasiswa">
												<span class="input-group-btn"><input  type="submit" class="btn btn-primary" value="cari"></span>
											</div>
										</form>
									</div>
								</div>
								
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Nama</th>
												<th>NIM</th>
												<th>PRODI</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Rata - rata nilai</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<!-- @if($data_siswa->count() == 0)
													<p style="color: red;">Data mahasiswa tidak ada</p>
											@endif -->
											@foreach($data_siswa as $siswa)
											<tr>
												
												<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
												<td>{{$siswa->nim}}</td>
												<td>{{$siswa->nama_prodi}}</td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
												<td>{{$siswa->rataratanilai()}}</td>
												@if(auth()->user()->role == 'admin')
												<td>

													<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Delete</a>
												</td>
												@endif
											</tr>
											@endforeach
										</tbody>

									</table>
									{{ $data_siswa->links() }}
							
								</div>
						
							</div>
 				</div>

 			</div>
 			@else
 				<div class="row">
 				<div class="col-md-12">
 					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
									<div class="left">
									<a href="/siswa/exportexel" class="btn btn-primary" target="_balank">Export Exel</a>
									<a href="/siswa/exportpdf" class="btn btn-primary">Export PDF</a>
									<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
									</div>
									<div class="right">
										<form class="navbar-form navbar-left" method="get" action="/siswa/cari">
											<div class="input-group">
												<input type="text" value="{{old('cari')}}" name="cari" class="form-control" placeholder="Cari data Mahasiswa">
												<span class="input-group-btn"><input  type="submit" class="btn btn-primary" value="cari"></span>
											</div>
										</form>
									</div>
								</div>
								
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Nama</th>
												<th>NIM</th>
												<th>PRODI</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Rata - rata nilai</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												
											<td><p style="color: red;">Data mahasiswa tidak ada</p></td>
											</tr>
										</tbody>

									</table>
									{{ $data_siswa->links() }}
							
								</div>
						
							</div>
 				</div>

 			</div>
 			@endif
 		</div>
 	</div>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Mahasiswa</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
						<form action="/siswa/create" method="POST" enctype="multipart/form-data">
								@csrf
							  <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Nama Depan</label>
							    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
							    @if($errors->has('nama_depan'))
							    	<span class="help-block">{{$errors->first('nama_depan')}}</span>
							    @endif
							  </div>

							    <div class="form-group">
							    <label for="exampleInputEmail1">NIM</label>
							    <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nim"
							    value="{{old('nim')}}">
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

							  <div class="form-group">
							    <label for="exampleInputEmail1">Username</label>
							    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username"
							    value="{{old('username')}}">
							     @if($errors->has('username'))
							    	<span class="help-block">{{$errors->first('username')}}</span>
							    @endif
							  </div>

							  <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Email</label>
							    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"
							    value="{{old('email')}}">
							     @if($errors->has('email'))
							    	<span class="help-block">{{$errors->first('email')}}</span>
							    @endif
							  </div>
							 <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
							    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							      <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
							      <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
							    </select>
							     @if($errors->has('jenis_kelamin'))
							    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
							    @endif
							 </div>
							 <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Agama</label>
							    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{old('agama')}}">
							     @if($errors->has('agama'))
							    	<span class="help-block">{{$errors->first('agama')}}</span>
							    @endif
							 </div>
							 <div class="form-group">
							    <label for="exampleFormControlTextarea1">Alamat</label>
							    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{old('alamat')}}</textarea>
							</div>
							<div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
							    <label for="exampleFormControlTextarea1">Avatar</label>
							    <input type="file" name="avatar" class="form-control">
							     @if($errors->has('avatar'))
							    	<span class="help-block">{{$errors->first('avatar')}}</span>
							    @endif 
							</div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				 		<button type="submit" class="btn btn-primary">Submit</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>	
		
 @stop

 @section('footer')
<script>
	$('.delete').click(function(){
		  var siswa_id = $(this).attr('siswa-id');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus data siswa dengan id " +siswa_id + "??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/siswa/"+siswa_id+"/delete";
		  } 
		}); 
	});
</script>

 @stop 
 