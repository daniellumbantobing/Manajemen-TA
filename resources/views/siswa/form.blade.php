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
										<h3 class="panel-title"><b>Form Maju Sidang</b></h3>
									</div>

									<div class="panel-body">
										<table class=" table table-hover">	
											<thead>
												<tr>
													<th>No</th>
													<th>Kelompok</th>
													<th>Judul</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
										@foreach($form as $k=>$kl)
											<tr>
												<td>{{++$k}}</td>
												<td>{{$kl->noKel}}</td>
												<td>{{$kl->judul}}</td>
												@if(auth()->user()->role == 'siswa')
												<td>
														@if($kl->status == 1)
														setuju
														@else
														tidak setuju
													@endif

												</td>
												@endif
												@if(auth()->user()->role == 'admin')
												<td>
											
													     <input data-id="{{$kl->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Setuju" data-off="Tidak Setuju" {{ $kl->status ? 'checked' : '' }}>
												</td>
												@endif
											</tr>
										@endforeach
											</tbody>								
										
												<!-- Button trigger modal -->
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												  Buat Form Maju Sidang
												</button><hr>
												<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Tambah Form</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>

												      <div class="modal-body">
														<form action="/form/create" method="POST" enctype="multipart/form-data">
															{{csrf_field()}}
														  <div class="form-group">
														    <label for="exampleInputEmail1">Nomor Kelompok</label>
														    <input type="text" name="noKel" class="form-control" id="exampleInputNama1" aria-describedby="emailHelp" placeholder="No.Kelompok" value="{{old('noKel')}}">
														  </div>
														  
														  <div class="form-group">
														    <label for="exampleInputPassword1">Judul</label>
														    <input type="text" name="judul" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Judul Tugas Akhir" value="{{old('judul')}}" >
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
            url: '/konfirmasi',
            data: {'status': status, 'id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
 @stop 

