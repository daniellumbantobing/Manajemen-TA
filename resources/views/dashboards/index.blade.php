@extends('layouts.master')

@section('content')

@if(auth()->user()->role == 'admin' || auth()->user()->role == 'koordinator' || auth()->user()->role == 'dospen' || auth()->user()->role == 'dosenpenguji') 
<div class="main">
 		<div class="main-content">

 		<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang {{auth()->user()->name}} (
								@if(auth()->user()->role == 'dospen') 
							Dosen Pembingbing 
							@elseif(auth()->user()->role == 'koordinator')
							Koordiantor
							@elseif(auth()->user()->role == 'dosenpenguji')
							Dosen Penguji
							@elseif(auth()->user()->role == 'admin')
							Admin
							@endif)
						</h3>
						</div>
						<div class="panel-body">
							<div class="row">
									
 		<div class="panel-body">
				<div class="col-md-3">
					<div class="award-item">
						<div class="hexagon">
							<span class="lnr lnr-graduation-hat award-icon"></span>
						</div>
							<span class="number">{{totalsiswa()}}</span><br>
							<span class="title">Mahasiswa</span>
					</div>
					</div>
					<div class="col-md-3">
						<div class="award-item">
						<div class="hexagon">
						<span class="lnr lnr-user award-icon"></span>
												</div>
												<span class="number">{{totalguru()}}</span><br>
												<span class="title">Dosen</span>
											</div>
										</div>
										<div class="col-md-3">
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

								
							</div>


						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Mahasiswa</h3>
									
								</div>
								
								<div class="panel-body">
									<table lass="table table-hover" id="table-datatables">
										<thead>
											<tr>
												<th>Nama</th>
												<th>NIM</th>
												<th>PRODI</th>
												<th>Jenis Kelamin</th>
												<th>Agama</th>
												<th>Alamat</th>
												<th>Nilai Akhir</th>
												<th>Grade</th>
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
												<td>{{$siswa->prodi->nama_prodi}}</td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
												<td>{{$siswa->rataratanilai1()}}</td>
												<td>{{$siswa->rataratanilai()}}</td>
												@if(auth()->user()->role == 'admin' || auth()->user()->role == 'koordinator')
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
</div>
@elseif(auth()->user()->role == 'baak') 
<div class="main">
 		<div class="main-content">

 		<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat Datang {{auth()->user()->name}} 
						</h3>
						</div>
						<div class="panel-body">
							<div class="row">
									
 		<div class="panel-body">
				<div class="col-md-3">
					<div class="award-item">
						<div class="hexagon">
							<span class="lnr lnr-graduation-hat award-icon"></span>
						</div>
							<span class="number">{{totalsiswa()}}</span><br>
							<span class="title">Mahasiswa</span>
					</div>
					</div>
					<div class="col-md-3">
						<div class="award-item">
						<div class="hexagon">
						<span class="lnr lnr-user award-icon"></span>
												</div>
												<span class="number">{{totalguru()}}</span><br>
												<span class="title">Dosen</span>
											</div>
										</div>
										<div class="col-md-3">
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

								
							</div>


						</div>

</div>

	@elseif(auth()->user()->role == 'siswa')


	<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
			
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
					<div class="row">
 				<div class="col-md-12">
 					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Matakuliah</h3>
									<!-- <div class="left">
									<a href="/siswa/exportexel" class="btn btn-primary" target="_balank">Export Exel</a>
									<a href="/siswa/exportpdf" class="btn btn-primary">Export PDF</a>
									</div>
									<div class="right">
										<form class="navbar-form navbar-left" method="get" action="/siswa/cari">
											<div class="input-group">
												<input type="text" value="{{old('cari')}}" name="cari" class="form-control" placeholder="Cari data Mahasiswa">
												<span class="input-group-btn"><input  type="submit" class="btn btn-primary" value="cari"></span>
											</div>
										</form>
									</div> -->
								</div>
								
								<div class="panel-body">
									<table class="table table-hover" id="table-datatables">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Matakuliah</th>
												<th>SKS</th>
												<th>PRODI</th>
												<th>Semester</th>
												
											</tr>
										</thead>
										<tbody>
											@foreach($matkul as $mk)
											<tr>
												<td>{{$mk->kode_matkul}}</td>
												<td>{{$mk->matakuliah}}</td>
												<td>{{$mk->sks}}</td>
												<td>{{$mk->prodi->nama_prodi}}</td>
												<td>{{$mk->semester->semester}}</td>
												
											</tr>
											@endforeach
										</tbody>
									</table>
							
								</div>
						
							</div>
 				</div>
 			</div>
					
				</div>
			</div>
		</div>

	@endif

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
<script type="text/javascript"> 
 $('#table-datatables').DataTable( {

})
</script>
 @stop 
