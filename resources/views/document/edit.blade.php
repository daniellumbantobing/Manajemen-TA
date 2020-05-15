@extends('layouts.master')
@section('title','Document')
@section('content')
<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-12">
 				<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit</h3>
								</div>
								<div class="panel-body">
								<form action="/files/update/{{$document->id}}" method="POST" enctype="multipart/form-data">
								@csrf
						
							  <div class="form-group">
							    <label for="exampleInputEmail1">Judul</label>
							    <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"
							    value="{{$document->judul}}">
							  </div>

							  <div class="form-group">
							    <label for="exampleInputEmail1">Deskripsi</label>
							    <input name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan"
							    value="{{$document->description}}">
							  </div>

							  <div class="form-group">
							    <label for="exampleFormControlTextarea1">Avatar</label>
							    <input type="file" name="file" class="form-control"> 
							</div>
							 
								<button type="submit" class="btn btn-warning">Update</button>
						</form>
								</div>
							</div>

 				</div>
 			</div>
 		</div>
 	</div>


@stop