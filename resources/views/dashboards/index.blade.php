@extends('layouts.master')

@section('content')

@if(auth()->user()->role == 'admin') 
<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-6">
	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title"></h3>
				</div>
					 <div class="panel-body">
						   <table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Nilai</th>
										</tr>
								</thead>
								@php
									$ranking = 1;
								@endphp
								@foreach(ranking5besar() as $s)
									<tbody>
										<tr>
										<td>{{$ranking}}</td>
										<td>{{$s->namalengkap()}}</td>
										<td>{{$s->rataratanilai()}}</td>
										
										</tr>
									</tbody>
									@php
									$ranking ++;
								@endphp
								@endforeach
								</table>
							</div>
					</div>
				</div>
				<div class="col-md-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-graduation-hat award-icon"></span>
												</div>
												<span class="number">{{totalsiswa()}}</span><br>
												<span class="title">Mahasiswa</span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-user award-icon"></span>
												</div>
												<span class="number">{{totalguru()}}</span><br>
												<span class="title">Dosen</span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-book award-icon"></span>
												</div>
												<span class="number">{{totalmatakuliah  ()}}</span><br>
												<span class="title">Matakuliah</span>
											</div>
										</div>
		</div>
	</div>
	@elseif(auth()->user()->role == 'siswa')


	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
<!-- 						<div class="col-md-2">
						<div class="metric">
							<span class="icon"><i class="lnr lnr-user"></i></span>
							<p>
								<span class="number">{{totalsiswa()}}</span>
								<span class="title">Mahasiswa</span>
							</p>
						</div>
				</div>
				<div class="col-md-2">
						<div class="metric">
							<span class="icon"><i class="lnr lnr-user"></i></span>
							<p>
								<span class="number">{{totalguru()}}</span>
								<span class="title">Dosen</span>
							</p>
						</div>
				</div>
				<div class="col-md-2">
						<div class="metric">
							<span class="icon"><i class="lnr lnr-user"></i></span>
							<p>
								<span class="number">{{totalguru()}}</span>
								<span class="title">Matakuliah</span>
							</p>
						</div>
				</div>
 -->
 							<div class="row">
										<div class="col-md-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-graduation-hat award-icon"></span>
												</div>
												<span class="number">{{totalsiswa()}}</span><br>
												<span class="title">Mahasiswa</span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-user award-icon"></span>
												</div>
												<span class="number">{{totalguru()}}</span><br>
												<span class="title">Dosen</span>
											</div>
										</div>
										<div class="col-md-2 col-lg-2">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-book award-icon"></span>
												</div>
												<span class="number">{{totalmatakuliah()}}</span><br>
												<span class="title">Matakuliah</span>
											</div>
										</div>
									
							<div class="col-md-6">
							<!-- PANEL NO CONTROLS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fas fa-bullhorn"></i>
									<b>Pengumuman</b></h3>
								</div>
								<div class="panel-body">
										@foreach($posts as $ps)
										<div class="header">
								<!-- 	<img class="img-fluid" src="{{$ps->thumbnail()}}" alt="" width="30px">	
								 -->	</div>
									<h4><a href="{{route('site.single.post',$ps->slug)}}">{{$ps->title}}</a></h4>
										<small>{{$ps->created_at->format('d M Y')}} {{$ps->created_at->format('H:i:s')}} oleh <a href="#">{{$ps->user->name}}</a></small>
						
										@endforeach
								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
					</div>
				</div>
			</div>
		</div>

	@endif

@stop