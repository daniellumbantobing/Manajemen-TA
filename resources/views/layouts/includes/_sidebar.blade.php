 <div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/home" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'siswa')
						<li>
									<a href="/matakuliah"><i class="lnr lnr-book"></i> 
										<span>Matakuliah</span></a>
										
								</li>
						<li><a href="/forum"><i class="far fa-comments"></i><span>Forum</span></a></li>
					
						<li><a href="/files/create"><i class="far fa-folder"></i><span>Document</span></a></li>
						<li>
							<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="fas fa-cogs"></i> 
							<span>Tugas Akhir</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPage" class="collapse ">
								<ul class="nav">
									<li><a href="/kelompok"><i class="fas fa-users"></i>Kelompok TA</a></li>
									<li><a href="/history"><i class="fas fa-history"></i>Perubahan Judul</a></li>
									<li><a href="/form"><i class="far fa-sticky-note"></i>Form Maju Sidang</a></li>
									<li><a href="/jadwal"><i class="fas fa-calendar-alt"></i>Jadwal Sidang</a></li>
								</ul>
							</div>
						</li>
							@elseif(auth()->user()->role == 'dospen')
								<li><a href="/dosen"><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
						
							 		<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> 
										<span>Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="/siswa"><i class="far fa-circle"></i>Semua Mahasiswa</a></li>
											<li><a href="/SI"><i class="far fa-circle"></i>S1 Sistem Informasi</a></li>
											<li><a href="/TI"><i class="far fa-circle"></i></i>S1 Teknik Informatika</a></li>
											<li><a href="/TE"><i class="far fa-circle"></i>S1 Teknik Elektro</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="/matakuliah"><i class="lnr lnr-book"></i> 
										<span>Matakuliah</span></a>
										
								</li>
								<li>
									<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="fas fa-cogs"></i> 
										<span>Tugas Akhir</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPage" class="collapse ">
										<ul class="nav">
											<li><a href="/kelompokMahasiswa"><i class="fas fa-users"></i>Kelompok TA</a></li>
											<li><a href="/history"><i class="fas fa-history"></i>Perubahan Judul</a></li>
											<li><a href="/form"><i class="fas fa-sticky-note"></i>Form Maju Sidang</a></li>
											<li><a href="/jadwal"><i class="fas fa-calendar-alt"></i>Jadwal Sidang</a></li>
											
									</ul>
									</div>
								</li>
						
							@elseif(auth()->user()->role == 'dosenpenguji')
									<li><a href="/dosen"><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
						
							 		<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> 
										<span>Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="/siswa"><i class="far fa-circle"></i>Semua Mahasiswa</a></li>
											<li><a href="/SI"><i class="far fa-circle"></i>S1 Sistem Informasi</a></li>
											<li><a href="/TI"><i class="far fa-circle"></i></i>S1 Teknik Informatika</a></li>
											<li><a href="/TE"><i class="far fa-circle"></i>S1 Teknik Elektro</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="/matakuliah"><i class="lnr lnr-book"></i> 
										<span>Matakuliah</span></a>
										
								</li>
								<li>
									<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="fas fa-cogs"></i> 
										<span>Tugas Akhir</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPage" class="collapse ">
										<ul class="nav">
											<li><a href="/kelompokMahasiswa"><i class="fas fa-users"></i>Kelompok TA</a></li>
											<li><a href="/history"><i class="fas fa-history"></i>Perubahan Judul</a></li>
											<li><a href="/form"><i class="fas fa-sticky-note"></i>Form Maju Sidang</a></li>
											<li><a href="/jadwal"><i class="fas fa-calendar-alt"></i>Jadwal Sidang</a></li>
											
									</ul>
									</div>
								</li>
						
						@elseif(auth()->user()->role == 'admin' || auth()->user()->role == 'koordinator')
							<li><a href="/dosen"><i class="lnr lnr-user"></i> <span>Dosen</span></a></li>
						
							 		<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> 
										<span>Mahasiswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="/siswa"><i class="far fa-circle"></i>Semua Mahasiswa</a></li>
											<li><a href="/SI"><i class="far fa-circle"></i>S1 Sistem Informasi</a></li>
											<li><a href="/TI"><i class="far fa-circle"></i></i>S1 Teknik Informatika</a></li>
											<li><a href="/TE"><i class="far fa-circle"></i>S1 Teknik Elektro</a></li>
										</ul>
									</div>
								</li>
								<li>
									<a href="/matakuliah"><i class="lnr lnr-book"></i> 
										<span>Matakuliah</span></a>
										
								</li>
								<li>
									<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="fas fa-cogs"></i> 
										<span>Tugas Akhir</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
										<div id="subPage" class="collapse ">
										<ul class="nav">
											<li><a href="/kelompokMahasiswa"><i class="fas fa-users"></i>Kelompok TA</a></li>
											<li><a href="/history"><i class="fas fa-history"></i>Perubahan Judul</a></li>
											<li><a href="/form"><i class="fas fa-sticky-note"></i>Form Maju Sidang</a></li>
											<li><a href="/form"><i class="fas fa-calendar-alt"></i>Jadwal Sidang</a></li>
											
									</ul>
									</div>
								</li>
						
								<li><a href="/forum"><i class="far fa-comments"></i><span>Forum</span></a></li>
								<li><a href="/posts" class=""><i class="lnr lnr-pencil"></i> <span>Post</span></a></li>
								<li><a href="/files"><i class="far fa-folder"></i><span>Document</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>