@extends('layouts.master')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@stop
@section('content')
<div class="main">	
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@if(session('sukses'))
						<div class="alert alert-success" role="alert">
							{{session('sukses')}}
						</div>
					@endif
					@if(session('error'))
						<div class="alert alert-danger" role="alert">
							{{session('error')}}
						</div>
					@endif
						<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							
								<!-- END PROFILE DETAIL -->
					
								<div class="panel-heading">
									<h3 class="panel-title">Data Dosen</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<tbody>		
												<tr>
												<th>Nama</th> 
												<td>{{$dosen->nama}}</td>
											</tr>
											<tr>
												<th>NIDN</th>
												<td>{{$dosen->nidn}}</td>
											</tr>
											<tr>
												<th>Prodi</th>
												<td>{{$dosen->prodi->nama_prodi}}</td>
											</tr>
											<tr>
												<th>Status</th>
												<td>{{$dosen->status}}</td>
											</tr>
											<tr>
												<th>Jabatan Akademik</th>
												<td>{{$dosen->jabatan}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							
							
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
						
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
 @stop
 
 @section('footer')
 
 @stop