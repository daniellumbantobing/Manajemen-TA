@extends('layouts.master')

@section('content')
			<h1>Edit Data Kelompok</h1>
			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
			  {{session('sukses')}}
			</div>
			@endif
			<div class="main" style="margin-top: -85px;">
				<div class="main-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Kelompok</h3>
								</div>
									<div class="panel-body">
										<form action="/kelompok/{{$kelompok->id}}/update" method="POST" enctype="multipart/form-data">
											{{csrf_field()}}
												<div class="form-group">
													<label for="exampleInputEmail1">Nomor Kelompok</label>
													<input type="text" name="noKel" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="No.Kelompok" value="{{$kelompok->noKel}}">
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Judul</label>
													<input type="text" name="judul" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Judul Tugas Akhir" value="{{$kelompok->judul}}" >
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Deskripsi</label>
													<input type="text" name="des" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Judul Tugas Akhir" >
												</div>
											<button type="submit" class="btn btn-warning">Update</button>
										</form>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
			</div>
@endsection	