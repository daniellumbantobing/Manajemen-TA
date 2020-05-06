@extends('layouts.master')
@section('title','Detail Forum')
@section('content')
	<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-12">
 					<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">{{$forum->judul}}</h3>
									<p class="panel-subtitle">{{$forum->created_at->diffForHumans()}}</p>
								</div>
								<div class="panel-body">
										{!! $forum->konten !!}
								<hr>
								<h4>Komentar</h4>
									 <ul class="list-unstyled activity-list">
									 	@foreach($kmn as $km)
										<li>
											<img src="{{$km->user->siswa->getAvatar()}}" alt="Avatar" class="img-circle pull-left avatar">
											<p><a href="#">{{$km->user->siswa->nama_depan}}</a> {{$km->konten}}<span class="timestamp">{{$km->created_at->diffForHumans()}}</span></p>
											<div class="text-right">
												@if(auth()->user()->role == 'siswa')
												<a href="#" data-toggle="modal" data-target="#exampleModal">edit</a> | 
												<a href="#" class="delete" km-konten="{{$km->konten}}" km-id="{{$km->id}}">hapus</a></div>
												@endif
										</li>
										@endforeach	
									</ul>
									<form action="/komentar/created/{{$forum->id}}" method="post">
									@csrf
								<label>Tulis Komentar:</label>
								<div class="input-group">
								<input name="konten" type="text" class="form-control" placeholder="Masukkan komentar ...">
								<span class="input-group-btn"><button type="submit" class="btn btn-primary">Kirim</button></span>
							</div>
							</form>
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
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Forum</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
						<form action="/komentar/{{$km->id}}/updatekm" method="POST">
								@csrf
						
							  	 <div class="form-group">
								 <label for="exampleFormControlTextarea1">Komentar</label>
								 <textarea name="konten" class="form-control" id="konten" rows="3" >{{old('konten')}}</textarea>
								</div>

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				 		<button type="submit" class="btn btn-primary">Edit</button>
						</form>
				      </div>
				    </div>
				  </div>
				</div>		
		
 @stop

 @section('footer')
<script>
	$('.delete').click(function(){
		  var km_id = $(this).attr('km-id');
		  var km_konten = $(this).attr('km-konten') 
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus komentar " +km_konten + "?",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/komentar/"+km_id+"/deletekm";
		  } 
		}); 
	});
</script>
<script>
	 ClassicEditor
        .create( document.querySelector( '#konten' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
 @stop 