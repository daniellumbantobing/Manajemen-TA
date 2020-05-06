 @extends('layouts.master')
 @section('title','Siswa')
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
									<h3 class="panel-title">Posts</h3>
									<div class="right">
									<a href="{{route('posts.add')}}" class="btn btn-primary">Add new post</a>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Id</th>
												<th>Title</th>
												<th>User</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($posts as $post)
											<tr>
												<td>{{$post->id}}</td>
												<td>{{$post->title}}</td>
												<td>{{$post->user->name}}</td>  
												<td>
													<a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
													<a href="#" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" class="btn btn-danger btn-sm delete" post-id="{{$post->id}}">Delete</a>
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
		  var post_id = $(this).attr('post-id');
		  swal({
		  title: "Yakin  ?",
		  text: "Mau menghapus data siswa dengan id " +post_id + "??",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  
		  if (willDelete) {
		    window.location = "/posts/"+post_id+"/delete";
		  } 
		}); 
	});
</script>
 @stop 
 