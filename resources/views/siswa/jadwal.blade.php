@extends('layouts.master')

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
										<h3 class="panel-title"><b>Jadwal Sidang</b></h3>
									</div>

									<div class="panel-body">
										<table class=" table table-hover">	
											<thead>
												<tr>
													<th>No</th>
													<th>Kelompok</th>
													<th>Tanggal</th>
													<th>Waktu</th>
													<th>Tempat</th>
													<th>Dosen Pembimgbing</th>
													<th>Dosen Penguji</th>
													<th>Deskripsi</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
										@foreach($jadwal as $k=>$kl)
											<tr>
												<td>{{++$k}}</td>
												<td>{{$kl->kelompok}}</td>
												<td>{{$kl->tanggal}}</td>
												<td>{{$kl->waktu}}</td>
												<td>{{$kl->tempat}}</td>
												@if(auth()->user()->role == 'admin' || auth()->user()->role == 'dospen')
												<td> 
													<input data-id="{{$kl->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Setuju" data-off="Tidak Setuju" {{ $kl->status1 ? 'checked' : '' }}>
												</td>
												<td>
														@if($kl->status2 == 1)
														setuju
														@else
														tidak setuju
													@endif

												</td>
												@elseif(auth()->user()->role == 'dosenpenguji')
												<td>
														@if($kl->status1 == 1)
														setuju
														@else
														tidak setuju
													@endif

												</td>
												<td>
													<input data-id="{{$kl->id}}" class="toggle-class1" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Setuju" data-off="Tidak Setuju" {{ $kl->status2 ? 'checked' : '' }}>
												</td>
											
												@elseif(auth()->user()->role == 'baak')
												<td>
														@if($kl->status1 == 1)
														setuju
														@else
														tidak setuju
													@endif

												</td>
												<td>
													@if($kl->status2 == 1)
														setuju
														@else
														tidak setuju
													@endif

												</td>
												@endif
												<td>{{$kl->des}}</td>
												<td>
													<a href="/jadwaledit/{{$kl->id}}" class="btn btn-warning btn-sm">Edit</a>
													@if(auth()->user()->role == 'baak' || auth()->user()->role == 'admin')
													<a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$kl->id}}">Delete</a>
													@endif
												</td>
											</tr>
										@endforeach
											</tbody>								
										
												<!-- Button trigger modal -->
												@if(auth()->user()->role == 'admin' || auth()->user()->role == 'koordinator' || auth()->user()->role == 'baak')
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												  Buat Jadwal Sidang
												</button><hr>
												@endif
												<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Buat Jadwal</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>

												      <div class="modal-body">
														<form action="/jadwal/create" method="POST" enctype="multipart/form-data">
															{{csrf_field()}}
														  <div class="form-group">
														    <label for="exampleInputEmail1">Nomor Kelompok</label>
														    <input type="text" name="kelompok" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="No.Kelompok" value="{{old('Kelompok')}}">
														  </div>
														  
														  <div class="form-group">
														    <label for="exampleInputPassword1">Tanggal</label>
														    <input type="date" name="tanggal" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="tanggal Tugas Akhir" value="{{old('tanggal')}}" >
														  </div>

														  <div class="form-group">
														    <label for="exampleInputPassword1">Waktu</label>
														    <input type="time" name="waktu" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="waktu Tugas Akhir" value="{{old('waktu')}}" >
														  </div>

														  <div class="form-group">
														    <label for="exampleInputEmail1">Tempat</label>
														    <input type="text" name="tempat" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="Tempat" value="{{old('tempat')}}">
														  </div>

														  <div class="form-group">
														    <label for="exampleInputEmail1">Deskripsi</label>
														    <input type="text" name="des" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="Deskripsi" value="{{old('des')}}">
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
@stop

@section('footer')

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/konfirmasijadwal',
            data: {'status': status, 'id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
<script>
  $(function() {
    $('.toggle-class1').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/konfirmasijadwal1',
            data: {'status': status, 'id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
<script>
	$('.delete').click(function(){
		  var siswa_id = $(this).attr('siswa-id');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus jadwal sidang dengan id " +siswa_id + "??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/hapusjadwal/"+siswa_id;
		  } 
		}); 
	});
</script>
 @stop 

