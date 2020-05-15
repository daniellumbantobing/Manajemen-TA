@extends('layouts.master')
@section('title','Document')
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
									<h3 class="panel-title">Document</h3>
									<div class="right">
									<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-upload"></i> Upload Document</a>
									</div>
								</div>
								<div class="panel-body">
									
									 
									<table class="table table-hover">
										<thead>
											<tr>
												<th>NO</th>
												<th>Judul</th>
												<th>Deskripsi</th>
												<th>Nama File</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($file as $key=>$fl)
											<tr>
												<td>{{++$key}}</td>
												<td>{{$fl->judul}}</td>
												<td>{{$fl->description}}</td>
												<td>{{$fl->file}}</td>  
												<td>
													<a target="_blank" href="/files/{{$fl->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i>  View</a>
													<a href="/files/download/{{$fl->file}}" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Download</a>
													<a href="#" class="btn btn-danger btn-sm delete" siswa-id="{{$fl->id}}"><i class="fa fa-trash"></i> Delete</a>
							
													<a href="/files/edit/{{$fl->id}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
												
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
				        <h5 class="modal-title" id="exampleModalLabel">Upload Document</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
						<form action="/files" method="POST"  enctype="multipart/form-data">
								@csrf
								<div class="form-group{{$errors->has('judul') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Judul Dokumen:</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul" value="{{old('judul')}}">
							    @if($errors->has('judul'))
							    	<span class="help-block">{{$errors->first('judul')}}</span>
							    @endif
							  </div>

							 
								<div class="form-group{{$errors->has('description') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">Description:</label>
							    <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="description" value="{{old('description')}}">
							    @if($errors->has('description'))
							    	<span class="help-block">{{$errors->first('description')}}</span>
							    @endif
							  </div>

							  <div class="form-group{{$errors->has('file') ? ' has-error' : ''}}">
							    <label for="exampleInputEmail1">File:</label>
							    <input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="file" value="{{old('file')}}">
							    @if($errors->has('file'))
							    	<span class="help-block">{{$errors->first('file')}}</span>
							    @endif
							  </div>

							  	
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
	 ClassicEditor
        .create( document.querySelector( '#konten' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
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
		    window.location = "/document/"+siswa_id+"/hapus";
		  } 
		}); 
	});
</script>

 @stop 
@stop
