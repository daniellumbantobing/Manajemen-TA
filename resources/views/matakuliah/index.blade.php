@extends('layouts.master')
@section('title','Matakuliah')
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
												<th>Kode</th>
												<th>Matakuliah</th>
												<th>SKS</th>
												<th>PRODI</th>
												<th>Semester</th>
												<th>Aksi</th>
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
												<td>
													<a href="" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm delete" mt-id="{{$mk->id}}">Delete</a>
												</td>
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
			




@stop

 @section('footer')
<script>
	$('.delete').click(function(){
		  var mt_id = $(this).attr('mt-id');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus data siswa dengan id " +mt_id + "??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/matakuliah/"+mt_id+"/deletemt";
		  } 
		}); 
	});
</script>
<script type="text/javascript"> 
 $('#table-datatables').DataTable( {
"order": [[ 3, "asc" ]],

  dom: 'Bfrtip',
  buttons: [
    {
      extend:  'copy', 
      exportOptions: {
        columns: [ 0, 1, 3, 4 ]
      }
    },
    {
      extend:  'excel', 
      exportOptions: {
        columns: [  0, 1, 3, 4 ]
      }
    },
    {
      extend:  'pdf', 
      exportOptions: {
        columns: [  0, 1, 3, 4 ]
      }
    }

  ]
})
</script>
 @stop 
