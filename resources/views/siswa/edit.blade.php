@extends('layouts.master')
@section('content')
<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-12">
 				<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit</h3>
								</div>
								<div class="panel-body">
								<form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
								@csrf
						
							  <div class="form-group">
							    <label for="exampleInputEmail1">Nama Depan</label>
							    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"
							    value="{{$siswa->nama_depan}}">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Prodi</label>
							    <input name="prodi_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"
							    value="{{$siswa->prodi->nama_prodi}}">
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
							    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
							    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							      <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
							      <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
							    </select>
							 </div>
							 <div class="form-group">
							    <label for="exampleInputEmail1">Agama</label>
							    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
							 </div>
							 <div class="form-group">
							    <label for="exampleFormControlTextarea1">Alamat</label>
							    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{($siswa->alamat)}}</textarea>
							</div>
							 <div class="form-group">
							    <label for="exampleFormControlTextarea1">Avatar</label>
							    <input type="file" name="avatar" class="form-control"> 
							</div>
								<button type="submit" class="btn btn-warning">Update</button>
						</form>
								</div>
							</div>

 				</div>
 			</div>
 		</div>
 	</div>
@stop
