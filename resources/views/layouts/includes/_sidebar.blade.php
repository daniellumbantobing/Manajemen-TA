<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'admin')
							<li><a href="/dosen"><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
						
							 		<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> 
										<span>Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="/siswa" class="">Semua Mahasiswa</a></li>
											<li><a href="/SI" class="">S1 Sistem Informasi</a></li>
											<li><a href="/TI" class="">S1 Teknik Informatika</a></li>
											<li><a href="/TE" class="">S1 Teknik Elektro</a></li>
											
									</ul>
									</div>
								</li>
								
								<li>
									<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="lnr lnr-book"></i> 
										<span>Matakuliah</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPage" class="collapse ">
										<ul class="nav">
											<li><a href="/matakuliah" class="">Semua Matkuliah</a></li>
											<li><a href="/SI" class="">S1 Sistem Informasi</a></li>
											<li><a href="/TI" class="">S1 Teknik Informatika</a></li>
											<li><a href="/TE" class="">S1 Teknik Elektro</a></li>
											
									</ul>
									</div>
								</li>
						
								<li><a href="/posts" class=""><i class="lnr lnr-pencil"></i> <span>Post</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>