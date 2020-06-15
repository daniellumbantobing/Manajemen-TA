@extends('layouts.master')
@section('title','Kelompok TA')
@section('content')
			<div class="main" style="margin-top: -1%;">
				<div class="main-content">
					<div class="container-fluid">
						@if(session('sukses'))
							<div class="alert alert-success" role="alert">
							  {{session('sukses')}}
							</div>
						@endif
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title"><b>KELOMPOK TUGAS AKHIR</b></h3>
									</div>

									<div class="panel-body">
										<table class=" table table-hover">	
											<thead>
												<tr>
													<th>No</th>
													<th>Nomor Kelompok</th>
													<th>Judul Tugas Akhir</th>
													<th>Nama Mahasiwa 1</th>
													<th>Nama Mahasiwa 2</th>
													<th>Nama Mahasiwa 3</th>
													<th>Dosen Pembimbing</th>
													<th>Dosen Penguji</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach($kelompok as $k=>$kl)
												<tr>
													<td>{{++$k}}</td>
													<td>{{$kl->noKel}}</td>
													<td>{{$kl->judul}}</td>
													<td>{{$kl->namaMhs}}</td>
													<td>{{$kl->namaMhs1}}</td>
													<td>{{$kl->namaMhs2}}</td>
													<td>{{$kl->pembimbing}}</td>
													<td>{{$kl->penguji}}</td>
													<td>
													<a href="/kelompok/{{$kl->id}}/editKelompok" class="btn btn-warning btn-sm">Edit</a>
													<a href="/kelompok/{{$kl->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Anda ingin menghapus?')">Delete</a>
												</td>
												</tr>
												@endforeach										
											</tbody>								
												<!-- Button trigger modal -->
												@if(auth()->user()->role == 'admin' || auth()->user()->role == 'koordinator')
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												  Alokasikan Kelompok
												</button><hr>
												@endif
												<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Alokasikan Kelompok</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>

												      <div class="modal-body">
														<form action="/kelompokMahasiswa/alokasi" method="POST" enctype="multipart/form-data">
															{{csrf_field()}}
														  <div class="form-group">
														    <label for="exampleInputEmail1">Nomor Kelompok</label>
														    <input type="text" name="noKel" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="No.Kelompok" value="{{old('noKel')}}">
														  </div>
<!-- 														  <div class="form-group">
														    <label for="exampleInputPassword1">Judul</label>
														    <input type="text" name="judul" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Judul Tugas Akhir" value="{{old('judul')}}" >
														  </div> -->
														  <div class="form-group">
														    <label for="sel1">Dosen Pembimbing</label>
															    <select class="form-control" id="exampleFormControlSelect1" name="pembimbing">
															    	@foreach($dosen as $ds)
															    		<option value="{{$ds->nama}}">{{$ds->nama}}</option>
															    	@endforeach
															    </select>														    
														  </div>
														  <div class="form-group">
														    <label for="sel1">Dosen Penguji</label>
															    <select class="form-control" id="exampleFormControlSelect1" name="penguji">
															    	@foreach($dosen as $ds)
															    		<option value="{{$ds->nama}}">{{$ds->nama}}</option>
															    	@endforeach
															    </select>
														  </div>													
												          <div class="modal-footer">
												        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												        	<button type="submit" class="btn btn-primary">Submit</button>
												          </div>
												        </form> 
												      </div>
												  </div>
												</div>		
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
