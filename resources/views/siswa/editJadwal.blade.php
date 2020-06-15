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
								<form action="/updatejadwal/{{$jadwal->id}}" method="POST" enctype="multipart/form-data">
								@csrf
							<div class="form-group">
														    <label for="exampleInputEmail1">Nomor Kelompok</label>
														    <input type="text" name="kelompok" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="No.Kelompok" value="{{$jadwal->kelompok}}">
														  </div>
														  
														  <div class="form-group">
														    <label for="exampleInputPassword1">Tanggal</label>
														    <input type="date" name="tanggal" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="tanggal Tugas Akhir" value="{{$jadwal->tanggal}}" >
														  </div>

														  <div class="form-group">
														    <label for="exampleInputPassword1">Waktu</label>
														    <input type="time" name="waktu" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="waktu Tugas Akhir" value="{{$jadwal->waktu}}" >
														  </div>

														  <div class="form-group">
														    <label for="exampleInputEmail1">Tempat</label>
														    <input type="text" name="tempat" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="Tempat" value="{{$jadwal->tempat}}">
														  </div>

														  <div class="form-group">
														    <label for="exampleInputEmail1">Deskripsi</label>
														    <input type="text" name="des" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="Deskripsi" value="{{old('des')}}">
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
