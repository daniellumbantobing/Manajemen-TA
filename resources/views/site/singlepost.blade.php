@extends('layouts.master')
@section('title','Detail Pengumuman')
@section('content')


<!-- <div class="main">
		
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8">
				
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">{{$post->title}}</h3>
								</div>
								<div class="panel-body">
									{!!$post->content!!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 -->
 <div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">

								<div class="profile">
								<div class="panel-heading">
									<h3 class="panel-title"><b>{{$post->title}}</b></h3><br>
									<img src="{{$post->thumbnail}}" style="width: 200px; height: 200px;">
								</div>
								<div class="panel-body">
									{!!$post->content!!}
								</div>
							
					</div>
				</div>
			</div>
		</div>

@stop