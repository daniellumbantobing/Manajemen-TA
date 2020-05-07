@extends('layouts.master')
@section('title','Detail Forum')
@section('content')
	

<div class="main">
 		<div class="main-content">
 			<div class="row">
 				<div class="col-md-12">
 				<div class="panel">
 					<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
 			
						<form action="/komentar/{{$komentar->id}}/updatekm" method="POST">
								@csrf
						
							  	 <div class="form-group">
								 <label for="exampleFormControlTextarea1">Komentar</label>
								 <textarea name="konten" class="form-control" id="konten" rows="3" >{{$komentar->konten}}</textarea>
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
				</div>
			</div>
		</div>
	</div>
@stop