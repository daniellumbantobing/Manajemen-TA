@extends('layouts.master')
@section('title','S1 Teknik Elektro')
@section('content')



<div class="main">
 		<div class="main-content">
 			<!-- @if(session('sukses'))
					<div class="alert alert-success" role="alert">
						{{session('sukses')}}
					</div>
				@endif  -->
 			<div class="row">
 				<div class="col-md-12">
 					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
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
											@if($MR->count() == 0)
													<p style="color: red;">Data mahasiswa tidak ada</p>
											@endif
											@foreach($MR as $siswa)
											<tr>
												
												<td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
												<td>{{$siswa->nim}}</td>
												<td>{{$siswa->prodi->nama_prodi}}</td>
												<td>{{$siswa->jenis_kelamin}}</td>
												<td>{{$siswa->agama}}</td>
												<td>{{$siswa->alamat}}</td>
												<td>{{$siswa->rataratanilai()}}</td>
												<td>
													<a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$siswa->id}}">Delete</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								{{ $MR->links() }}
								</div>
						
							</div>
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
<script type="text/javascript"> 
 $('#table-datatables').DataTable( {
  dom: 'Bfrtip',
  buttons: [
    {
      extend:  'copy', 
      exportOptions: {
        columns: [ 0, 1, 3, 4, 5 ]
      }
    },
    {
      extend:  'excel', 
      exportOptions: {
        columns: [  0, 1, 3, 4, 5 ]
      }
    },
    {
      extend:  'pdf', 
      exportOptions: {
        columns: [  0, 1, 3, 4, 5 ]
      }
    }

  ]
})
</script>
 @stop 
 