@extends('layouts.master')
@section('title','Dosen')
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
									<h3 class="panel-title">Data Dosen</h3>
									<div class="left">
											<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Buat Akun Dosen</a>

									</div>
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
												<th>NIDN</th>
												<th>Prodi</th>
												<th>Status</th>
												<th>Jabatan Akademik</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($dosen as $ds)
											<tr>
												<td><a href="/dosen/{{$ds->id}}/profile">{{$ds->nama}}</td></a>
												<td>{{$ds->nidn}}</td>
												<td>{{$ds->prodi->nama_prodi}}</td>
												<td>{{$ds->status}}</td>
												<td>{{$ds->jabatan}}</td>
												<td>
													<a href="" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$ds->id}}">Delete</a>
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
						<form action="/dosen/createdosen" method="POST" enctype="multipart/form-data">
								@csrf
							 <div class="form-group{{$errors->has('name') ? ' has-error' : ''}}">
								  <label for="exampleInputEmail1">Nama</label>
							<select name="name" class="form-control" id="exampleFormControlSelect1">
							@foreach($dosen as $p)
							<option value="{{$p->nama}}" >{{$p->nama}}</option>
							@endforeach
							</select>
							 @if($errors->has('name'))
							<span class="help-block">{{$errors->first('name')}}</span>
							@endif
							</div>							

							<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Username</label>
							    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" value="{{old('username')}}">
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

							 <div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Password</label>
							    <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="password" value="{{old('password')}}">
							     @if($errors->has('password'))
							    	<span class="help-block">{{$errors->first('password')}}</span>
							    @endif
							 </div>

							  <div class="form-group{{$errors->has('role') ? ' has-error' : ''}}">
							    <label for="exampleFormControlSelect1">Role</label>
							    <select name="role" class="form-control" id="exampleFormControlSelect1">
							      <option value="koordinator"{{(old('role') == 'P') ? 'selected' : ''}}>Koordinator TA</option>
							      <option value="dospen"{{(old('role') == 'L') ? 'selected' : ''}}>Dosen Pembingbing</option>
							      <option value="dosenpenguji"{{(old('role') == 'P') ? 'selected' : ''}}>Dosen Penguji</option>
							    </select>
							     @if($errors->has('role'))
							    	<span class="help-block">{{$errors->first('role')}}</span>
							    @endif
							 </div>

							<!-- <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
							    <label for="exampleFormControlTextarea1">Avatar</label>
							    <input type="file" name="avatar" class="form-control">
							     @if($errors->has('avatar'))
							    	<span class="help-block">{{$errors->first('avatar')}}</span>
							    @endif 
							</div> -->
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
 