@extends('layouts.master')
@section('title','Detail Document')
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
									<h3 class="panel-title">Detail Document</h3>
									<div class="right">
									</div>
								</div>
								<div class="panel-body">
									
									<h2>{{$file->judul}}</h2>		 
									<h3>{{$file->description}}</h3>
									<p>
											<iframe src="{{url('storage/'.$file->file)}}" style="width: 600px; height: 500px;"></iframe>
									</p>
								</div>
							</div>
 						</div>
 					</div>
 				</div>
 			</div>

@stop