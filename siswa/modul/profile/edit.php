<!-- Syntax SQL  -->
<?php 
			// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
			$qry = mysqli_query($con,"SELECT * FROM _logabsensi
				INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
				INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
				-- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
				WHERE _logabsensi.id_siswa='$data[id_siswa]' and tb_thajaran.status=1
				GROUP BY MONTH(tgl_absen) ORDER BY MONTH(tgl_absen) DESC
			 ");

			// foreach ($qry as $bulan) {
			// 	echo date('m',strtotime($bulan['tgl_absen']));
			// }
			 foreach ($qry as $bulan) { 
            ?>
			 	<?php 
			 	$bulan = date('m',strtotime($bulan['tgl_absen']));
			    ?>
		    
            <?php } ?>
            <!-- End Syntax  -->



<!-- 
<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						
					</div>
				</div> -->
<div class="page-inner">

	<div class="page-header">
<!-- <h4 class="page-title">Rekap Absen</h4>  -->
<h4 class="card-title"><b>Profile</b></h4>
<ul class="breadcrumbs">
<li class="nav-home">
<li class="nav-item">
<h4 class="card-title"> <b style="text-transform: uppercase;"><code> <?=$data['nama_siswa'] ?></code></h4>
</li>

</ul>
</div>

		<!-- Link Tab  -->
            <ul class="nav nav-pills" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
                </li> -->
                <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#menu2">Silabus</a>
                </li>
            </ul>
        <!-- End Link Tab  -->		
		<br>
	<div class="row">
		
		<div class="col-md-12 col-xs-12">	
						

			<div class="card">
				<div class="card-body">
					
					<!-- Tab panes -->
					<div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <h3>Foto Profile</h3>
                                    <p>
                                        <center>
                                        <img src="../assets/img/user/<?=$data['foto'] ?>" class="img-thumbnail" style="height: 90px;width: 90px;">
                                        </center> 
                                    </p>
                                    <input type="file" name="foto"> 
      			                    <input type="hidden" name="id" value="<?=$data['id_siswa'] ?>"> 
                                </div>
                                    <div class="form-group">      
                                    <button name="updateProfile" type="submit" class="btn btn-primary btn-block">Simpan</button>
                                    </div>
                            </form>
                                        <?php 
                                                    if (isset($_POST['updateProfile'])) {

                                                    $gambar = @$_FILES['foto']['name'];
                                                    if (!empty($gambar)) {
                                                    move_uploaded_file($_FILES['foto']['tmp_name'],"../assets/img/user/$gambar");
                                                    $ganti = mysqli_query($con,"UPDATE tb_siswa SET foto='$gambar' WHERE id_siswa='$_POST[id]' ");
                                                    if ($ganti) {
                                                                echo "
                                                                                    <script type='text/javascript'>
                                                                                    setTimeout(function () { 

                                                                                    swal('Berhasil', 'Foto Berhasil Diubah', {
                                                                                    icon : 'success',
                                                                                    buttons: {        			
                                                                                    confirm: {
                                                                                    className : 'btn btn-success'
                                                                                    }
                                                                                    },
                                                                                    });    
                                                                                    },10);  
                                                                                    window.setTimeout(function(){ 
                                                                                    window.location.replace('?page=profile');
                                                                                    } ,3000);   
                                                                                    </script>";
                                                        }
                                                    }  	                                           
                                                    }
                                                    ?>
                            </div>
                            <!-- <div id="menu1" class="container tab-pane fade"><br>
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div> -->
                            <div id="menu2" class="container tab-pane fade"><br>
                                <div class="page-inner">
                                    <div class="page-header">
                                        <h4 class="page-title"><?=$s['semester'] ?></h4>
                                        <ul class="breadcrumbs">
                                        <li class="nav-home">
                                            <a href="#">
                                            <i class="flaticon-home"></i>
                                            </a>
                                        </li>
                                        <li class="separator">
                                            <i class="flaticon-right-arrow"></i>
                                        </li>
                                        
                                        </ul>
                                    </div>
                                    <div class="row">
                                                <div class="table-responsive">
                                                 <table class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Kode</th>
                                                        <th>Nama Mapel</th>
                                                        <th>Nama Dosen</th>
                                                    </tr>
                                                </thead>  
                                                <tbody>
                                                    <?php 
                                                    $no=1;
                                        $semester = mysqli_query($con,"SELECT * FROM tb_siswa WHERE nis='$data[nis]'");	
                                                    foreach ($semester as $s)
                                        { $sem=$s['id_semester']; 
                                            if ($s['th_angkatan']<2021) {
                                                $id_kurikulum = 1 ; 
                                            }
                                            if ($s['th_angkatan']>=2021) {
                                                $id_kurikulum = 2 ; 
                                            } }
                                        // echo $sem; }
                                        // $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
                                        // INNER JOIN tb_dosen ON tb_mengajar.id_dosen=tb_dosen.id_dosen
                                        // INNER JOIN tb_silabus ON tb_mengajar.id_silabus=tb_silabus.id_silabus
                                        // INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
                                    
                                        // -- INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
                                        // INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran 
                                        // WHERE tb_mengajar.id = 
                                        //     ");
                                        //     foreach ($kelasMengajar as $jk) {
                                            // echo $id_kurikulum;
                                        $mapel = mysqli_query($con,"SELECT * FROM tb_silabus 
                                        INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
                                        WHERE 
                                        tb_silabus.id_kurikulum='$id_kurikulum'
                                        ");
                                                    foreach ($mapel as $k) {?>
                                                    <tr>
                                                        <td><?=$no++;?>.</td>              
                                                        <td><?=$k['kode_mapel'];?></td>
                                                        <td><?=$k['mapel'];?></td>
                                                        <td><?=$k['nama_dosen'];?></td>
                                                    
                                                    </tr>
                                                <?php } ?>
                                                </tbody>                        
                                            </table>
                                </div>
                                    </div>
                                    </div>
                                    </div>
                    </div>
                                    
                    <!-- End Tab  -->
				
				</div>
					
			</div>
		</div>
		
	</div>
					
				</div>