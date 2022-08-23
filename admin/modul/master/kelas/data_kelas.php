<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Kelas</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Data Umum</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Daftar Kelas</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">
										 <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addKelas"><i class="fa fa-plus"></i> Tambah</a>
									</div>
								</div>
								<div class="card-body">
									
									<table class="table table-sm">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Kode Kelas</th>
												<th scope="col">Nama Kelas</th>
                                                <th scope="col">Jurusan</th>
                                                <th scope="col">Nama Kepala Prodi</th>
                                                <th scope="col">Waktu</th>
												<th scope="col">Opsi</th>
											</tr>
										</thead>
										<tbody>
                        <?php 
                        $no=1;
                        $kelas = mysqli_query($con,"SELECT * FROM tb_mkelas
                        INNER JOIN tb_jurusan ON tb_mkelas.id_jurusan = tb_jurusan.id_jurusan
                        ");
                        foreach ($kelas as $k) {

                            $carimapel = mysqli_query($con,"SELECT * FROM tb_jurusan 
                            INNER JOIN tb_dosen ON tb_dosen.id_dosen = tb_jurusan.ka_prodi
                            WHERE tb_jurusan.id_jurusan='$k[id_jurusan]'
                            
                               ");
                              foreach ($carimapel as $cm) {
                              }  
                            
                        ?>
                        <tr>
                            <td><b><?=$no++;?>.</b></td>                            
                            <td><?=$k['kd_kelas'];?></td>
                            <td><?=$k['nama_kelas'];?></td>
                            <td><?=$k['nama_jurusan'];?></td>
                            <td><?=$cm['nama_dosen'];?></td>
                            <td><?=$k['waktu'];?></td>
                            <td>
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$k['id_mkelas'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delkelas&id=<?=$k['id_mkelas'] ?>"><i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$k['id_mkelas'] ?>" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                          <div class="row">
                                            <div class="col-md-10">
                                                  <div class="form-group">
                                                <label>Nama Kelas</label>
                                                 <input name="id" type="hidden" value="<?=$k['id_mkelas'] ?>">
                                                <input name="kelas" type="text" value="<?=$k['nama_kelas'] ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Waktu</label>
                                                 <!-- <input name="id" type="hidden" value="<?=$k['id_mkelas'] ?>"> -->
                                                <input name="waktu" type="text" value="<?=$k['waktu'] ?>" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <select class="form-control" name="jurusan">
                                                <option>Pilih Jurusan</option>
                                                <?php
                                                $sqlJurusan=mysqli_query($con, "SELECT * FROM tb_jurusan
                                                ORDER BY id_jurusan ASC");
                                                while($jurusan=mysqli_fetch_array($sqlJurusan)){

                                                    if ($jurusan['id_jurusan']==$k['id_jurusan']) {
                                                    $selected= "selected";
                                                    
                                                    }else{
                                                    $selected='';
                                                    }
                                                echo "<option value='$jurusan[id_jurusan]' $selected>$jurusan[nama_jurusan]</option>";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                           
                                            <div class="form-group">                    
                                                    <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                                             
                                            </div>                        
                                            </div>                      
                                          </div>
                                        </form>
                                        <?php 
                                        if (isset($_POST['edit'])) {
                                            $save= mysqli_query($con,"UPDATE tb_mkelas SET nama_kelas='$_POST[kelas]',waktu='$_POST[waktu]',id_jurusan='$_POST[jurusan]' WHERE id_mkelas='$_POST[id]' ");
                                            if ($save) {
                                                echo "<script>
                                                alert('Data diubah !');
                                                window.location='?page=master&act=kelas';
                                                </script>";                        
                                            }
                                        }

                                         ?>


                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->



                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>      
									</table>
								</div>
							</div>



							<!-- Modal -->
<div id="addKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Kelas</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Kode Kelas</label>
                        <input name="kode" type="text" value="KL-<?=time();?>" class="form-control" readonly>
                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input name="kelas" type="text" placeholder="Nama kelas .." class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Waktu</label>
                        <input name="waktu" type="text" placeholder="Waktu" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan">
                        <option>Pilih Jurusan</option>
                        <?php
                        $sqlJurusan=mysqli_query($con, "SELECT * FROM tb_jurusan
                        ORDER BY id_jurusan ASC");
                        while($jurusan=mysqli_fetch_array($sqlJurusan)){
                        echo "<option value='$jurusan[id_jurusan]' $selected>$jurusan[nama_jurusan]</option>";
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                   
                    $save= mysqli_query($con,"INSERT INTO tb_mkelas VALUES(NULL,'$_POST[kode]','$_POST[kelas]','$_POST[waktu]','$_POST[jurusan]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=kelas';
                        </script>";                        
                    }
                }

                 ?>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

				</div>
			</div>
		</div>

	</div>
</div>
</div>
</div>
</div>
</div>
</div>
