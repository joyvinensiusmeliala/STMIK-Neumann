<?php
$_GET['pelajaran'];

?>

<?php 
// tampilkan data mengajar

// $kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 

// INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
// INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

// INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
// INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
// WHERE tb_mengajar.id_guru='$data[id_guru]' AND tb_mengajar.id_mengajar='$_GET[pelajaran]'  AND tb_thajaran.status=1  ");

// foreach ($kelasMengajar as $d)

?>

<div class="page-inner">
  <div class="page-header">
    <h4 class="page-title">
        Rekap Absensi Approval
    </h4>
    
  </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header d-flex align-items-center">
                <h4 class="page-title">
                <?php 
                $carimapel = mysqli_query($con,"SELECT * FROM tb_mengajar
                -- INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
                -- INNER JOIN tb_guru ON _logabsensi.id_mengajar=tb_guru.id_g
                WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]'");
                
                foreach ($carimapel as $cmp){
                
                echo $cmp['mapel'];?></h4>
                <ul class="breadcrumbs">
                    <div class="card-title">
                      <h3 class="h4"><?php echo $_GET['Guru'];?></h3>
                    </div>
                </ul>
              </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
                <tr>
					<th>#</th>	
					<th>Nama Siswa</th>
					<th>Mata Kuliah</th>
					<th>Hari</th>
					<th>Tanggal Absen</th>
					<th>Jam Mengajar</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
            </thead>  
              <tbody>
                  
			  <?php 

			  $no=1;
									// tampilkan data absen setiap bulan, berdasarkan tahun ajaran yg aktif
									$qry = mysqli_query($con,"SELECT * FROM _logabsensi
									INNER JOIN tb_mengajar ON _logabsensi.id_mengajar=tb_mengajar.id_mengajar
									-- INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
									INNER JOIN tb_siswa ON _logabsensi.id_siswa=tb_siswa.id_siswa
									-- WHERE _logabsensi.id_mengajar='$_GET[pelajaran]'  
									and _logabsensi.status='Request'
									ORDER BY tgl_absen DESC
									");

									foreach ($qry as $z) { 
										
										$carimapel = mysqli_query($con,"SELECT * FROM tb_mengajar
										INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
										INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas
										INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru
										-- INNER JOIN tb_guru ON _logabsensi.id_mengajar=tb_guru.id_g
										WHERE tb_mengajar.id_guru='$q[id_guru]'");
										
										foreach ($carimapel as $cm){
										}
										
									?>


				<tr>
					<td><?=$no++;?></td>                          
					<td><?=$z['id_siswa'];?></td>
					<td><?=$cmp['mapel'];?></td>
					<td><?=$z['hari'];?></td>
					<td><?=$z['tgl_absen'];?></td>
					<td><?=$z['jam_mengajar'];?></td>
					<td><?=$z['status'];?></td>
					<td>
						<?php if($z['status']=='Request')
							{ ?>
								<span class="badge badge-warning"></i> Request</span>
								
							<?php
							}
							if($q['status']=='Approve')
							{ ?>
								<span class="badge badge-success"></i> Approve</span>   
							<?php
							} 
							if($q['status']=='Rejected')
							{ ?>
								<span class="badge badge-danger"></i> Rejected</span> 
						<?php } ?> 
					
					</td>

					<td>
                             							<?php } ?>

							
							

					
					</td>

					
					
				</tr> 
              <?php } ?>
              </tbody>                        
            </table>
      </div>
        </div>
          </div>
            </div>

  </div>
</div>
