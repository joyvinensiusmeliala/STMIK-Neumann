
<?php
@session_start();
 include '../config/db.php';

if (!isset($_SESSION['direktur'])) {
?> <script>
    alert('Maaf ! Anda Belum Login !!');
    window.location='../index.php';
 </script>
<?php
}
 ?>


   <?php

$jumlahSiswa = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_siswa WHERE status=1 "));
// jumlah Dosen
$jumlahDosen = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_dosen WHERE status='Y' "));

$id_login = @$_SESSION['direktur'];
$sql = mysqli_query($con,"SELECT * FROM tb_direktur
 WHERE id_direktur = '$id_login'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Direktur | Aplikasi Presensi</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/logo-neumann.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php" class="logo">
					<img src="../assets/img/logo-neumann.png" alt="navbar brand" class="navbar-brand" width="40">
					<b class="text-white">Presensi Siswa</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
				<!-- 	<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div> -->
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<!-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> -->
						
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../assets/img/user/<?=$data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../assets/img/user/<?=$data['foto'] ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?=$data['nama_direktur'] ?></h4>
												<p class="text-muted"><?=$data['email'] ?></p>
												
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="?page=akun" >Akun Saya</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/user/<?=$data['foto'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?=$data['nama_direktur'] ?>
									<span class="user-level"><?=$data['nip'] ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="?page=akun">
											<span class="link-collapse">Akun Saya</span>
										</a>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="index.php" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>							
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Main Utama</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-folder-open"></i>
								<p>Data Umum</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="?page=master&act=kurikulum">
											<span class="sub-item">Kurikulum</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=jurusan">
											<span class="sub-item">Jurusan</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=kelas">
											<span class="sub-item">Kelas</span>
										</a>
									</li>

									<li>
										<a href="?page=master&act=semester">
											<span class="sub-item">Semester</span>
										</a>
									</li>

									<li>
										<a href="?page=master&act=ta">
											<span class="sub-item">Tahun Pelajaran</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=mapel">
											<span class="sub-item">Mata Kuliah</span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=silabus">
											<span class="sub-item">Silabus</span>
										</a>
									</li>
									<li>
										<a href="?page=walas">
											<span class="sub-item"> Wali Kelas </span>
										</a>
									</li>
									<li>
										<a href="?page=master&act=jabatan">
											<span class="sub-item">Jabatan</span>
										</a>
									</li>
							
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-clipboard-list"></i>
								<p>Jadwal Mengajar</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									
									<li>
										<a href="?page=jadwal">
											<span class="sub-item"> Daftar Mengajar </span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#direktur">
								<i class="fas fa-user-tie"></i>
								<p>Data Direktur</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="direktur">
								<ul class="nav nav-collapse">
									<!-- <li>
										<a href="?page=direktur&act=add ">
											<span class="sub-item"> Tambah Kepala Sekolah </span>
										</a>
									</li> -->
									<li>
										<a href="?page=direktur">
											<span class="sub-item"> Data Direktur </span>
										</a>
									</li>
								</ul>
							</div>
						</li>
				
						<li class="nav-item">
							<a data-toggle="collapse" href="#dosen">
								<i class="fas fa-user-tie"></i>
								<p>Data Dosen</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dosen">
								<ul class="nav nav-collapse">
									<!-- <li>
										<a href="?page=dosen&act=add ">
											<span class="sub-item"> Tambah Dosen </span>
										</a>
									</li> -->
									<li>
										<a href="?page=dosen">
											<span class="sub-item"> Daftar Dosen </span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#siswa">
								<i class="fas fa-user-friends"></i>
								<p>Data Siswa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="siswa">
								<ul class="nav nav-collapse">
									<!-- <li>
										<a href="?page=siswa&act=add ">
											<span class="sub-item"> Tambah Siswa </span>
										</a>
									</li> -->
									<li>
										<a href="?page=siswa">
											<span class="sub-item"> Daftar Siswa </span>
										</a>
									</li>
								</ul>
							</div>
						</li>


							<li class="nav-item">
							<a data-toggle="collapse" href="#rekapAbsen">
								<i class="fas fa-list-alt"></i>
								<p>Rekap Absen</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="rekapAbsen">
								<ul class="nav nav-collapse">
									<?php 
									$kelas = mysqli_query($con,"SELECT * FROM tb_mkelas ORDER BY id_mkelas ASC");
									foreach ($kelas as $k) {?>
									<li>
										<a href="?page=rekap&kelas=<?=$k['id_mkelas'] ?> ">
											<span class="sub-item">KELAS - <?=strtoupper($k['nama_kelas']); ?> -<b> <?=strtoupper($k['waktu']); ?></b></span>
										</a>
									</li>
								<?php } ?>
								</ul>
							</div>
						</li>
						<li class="nav-item active mt-3">
							<a href="logout.php" class="collapsed">
								<i class="fas fa-arrow-alt-circle-left"></i>
								<p>Logout</p>
							</a>							
						</li>
	
					<!-- 
						<li class="mx-4 mt-2">
							<a href="logout.php" class="btn btn-primary btn-block"><span class="btn-label"> <i class="fas fa-arrow-alt-circle-left"></i> </span> Logout</a> 
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<!-- Halaman dinamis -->
				<?php 
				error_reporting();
				$page= @$_GET['page'];
				$act = @$_GET['act'];

				if ($page=='absen') {
					if ($act=='') {
						include 'modul/absen/absen_kelas.php';
					}elseif ($act=='update') {
						include 'modul/absen/absen_kelas_update.php';
					}
					// Jurusan 
					}elseif($act=='jurusan') {
						include 'modul/master/jurusan/data_jurusan.php';
					}elseif ($act=='deljurusan') {
						include 'modul/master/jurusan/del.php';
				
					// kelas
					}elseif ($act=='kelas') {
						include 'modul/master/kelas/data_kelas.php';
					}elseif ($act=='delkelas') {
						include 'modul/master/kelas/del.php';
					// semster
				}elseif ($act=='semester') {
					include 'modul/master/semester/data.php'; 
					}elseif ($act=='delsemester') {
					include 'modul/master/semester/del.php';
					}elseif ($act=='set_semester') {
						include 'modul/master/semester/set.php';
					// jabatan
					}elseif ($act=='jabatan') {
					include 'modul/master/jabatan/data.php'; 
					}elseif ($act=='deljabatan') {
					include 'modul/master/jabatan/del.php';
					}elseif ($act=='set_jabatan') {
						include 'modul/master/jabatan/set.php';

					// Kurikulum
				}elseif ($act=='kurikulum') {
					include 'modul/master/kurikulum/data.php'; 
					}elseif ($act=='delkurikulum') {
					include 'modul/master/kurikulum/del.php';
					}elseif ($act=='set_kurikulum') {
						include 'modul/master/kurikulum/set.php';
					// Silabus
					}elseif ($act=='silabus') {
					include 'modul/master/silabus/data.php'; 
					}elseif ($act=='delsilabus') {
					include 'modul/master/silabus/del.php';
					}elseif ($act=='set_silabus') {
						include 'modul/master/silabus/set.php';
					}
					// tahun ajaran
					elseif ($act=='ta') {
					include 'modul/master/ta/data.php'; 
					}elseif ($act=='delta') {
					include 'modul/master/ta/del.php';
					}elseif($act=='set_ta'){
						include 'modul/master/ta/set.php';
						// mapel
				}elseif ($act=='mapel') {
					include 'modul/master/mapel/data.php'; 
					}elseif ($act=='delmapel') {
					include 'modul/master/mapel/del.php';
					
				}elseif ($page=='walas') {
					if ($act=='') {
					 include 'modul/wakel/data.php';  	
					}

				}elseif ($page=='direktur') {
					if ($act=='') {
						include 'modul/direktur/data.php'; 
					}elseif ($act=='add') {
						 include 'modul/direktur/add.php'; 
					}elseif ($act=='edit') {
						include 'modul/direktur/edit.php'; 
					}elseif ($act=='del') {
						 include 'modul/direktur/del.php'; 
					}elseif ($act=='proses') {
						 include 'modul/direktur/proses.php'; 
					}
					 }elseif ($page=='dosen') {
					if ($act=='') {
						include 'modul/dosen/data.php'; 
					}elseif ($act=='add') {
						 include 'modul/dosen/add.php'; 
					}elseif ($act=='edit') {
						include 'modul/dosen/edit.php'; 
					}elseif ($act=='del') {
						 include 'modul/dosen/del.php'; 
					}elseif ($act=='proses') {
						 include 'modul/dosen/proses.php'; 
					}

				}elseif ($page=='siswa') {
					if ($act=='') {
						 include 'modul/siswa/data.php'; 
					 }elseif ($act=='add') {
						  include 'modul/siswa/add.php'; 
					 }elseif ($act=='edit') {
						 include 'modul/siswa/edit.php'; 
					 }elseif ($act=='del') {
						  include 'modul/siswa/del.php'; 
					 }elseif ($act=='proses') {
						  include 'modul/siswa/proses.php'; 
					 }elseif ($act=='unduhpdf') {
					  include 'modul/siswa/mpdf/data_siswa.php'; 
					  
				 }   
				  }
					  elseif ($page=='rekap') {
							  if ($act=='') {
								  include 'modul/rekap/rekap_absen.php';
							  }elseif ($act='rekap-perbulan') {
								  include 'modul/rekap/rekap_perbulan.php';
							  }					
				  }elseif ($page=='jadwal') {
					  if ($act=='') {
						  include 'modul/jadwal/data_mengajar.php';
					  }elseif ($act=='add') {
						  include 'modul/jadwal/tambah.php';
					  }elseif ($act=='cancel') {
						  include 'modul/jadwal/cancel.php';
					  }					
							
					}elseif ($page=='akun') {
						include 'modul/akun/akun.php';
					}

					elseif ($page=='') {
						include 'modul/home.php';
					}else{
						echo "<b>Tidak ada Halaman</b>";
					}


				 ?>


				<!-- end -->


				
			</div>
		<footer class="footer">
				<div class="container">
					<div class="copyright ml-auto">
						&copy; <?php echo date('Y');?> Absensi STMIK Kristen Neumann Indonesia (<a href="index.php">Ruth Juni</a> | 2022)
					</div>				
				</div>
			</footer>
		</div>
		
	
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>



	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	

</body>
</html>