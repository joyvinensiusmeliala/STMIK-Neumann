<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Jurusan</h4>
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
								<a href="#">Data Jurusan</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									
									<table class="table table-sm">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Kode Jurusan</th>
												<th scope="col">Nama Jurusan</th>
												<!-- <th scope="col">Opsi</th> -->
											</tr>
										</thead>
										<tbody>
                        <?php 
                        $no=1;
                        $jurusan = mysqli_query($con,"SELECT * FROM tb_jurusan");
                        foreach ($jurusan as $k) {?>
                        <tr>
                            <td><b><?=$no++;?>.</b></td>                            
                            <td><?=$k['kd_jurusan'];?></td>
                            <td><?=$k['nama_jurusan'];?></td>
                        
                        </tr>
                    <?php } ?>
                    </tbody>      
									</table>
								</div>
							</div>



							<!-- Modal -->
<div id="addJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Jurusan</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Kode Jurusan</label>
                        <input name="kode" type="text" value="KL-<?=time();?>" class="form-control" readonly>
                    <div class="form-group">
                        <label>Nama Jurusan</label>
                        <input name="jurusan" type="text" placeholder="Nama Jurusan .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                   
                    $save= mysqli_query($con,"INSERT INTO tb_jurusan VALUES(NULL,'$_POST[kode]','$_POST[jurusan]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=jurusan';
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
