<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Kurikulum</h4>
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
                <a href="#">Daftar Kurikulum</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addKurikulum"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kurikulum</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$kurikulum = mysqli_query($con,"SELECT * FROM tb_kurikulum");
                        foreach ($kurikulum as $kur) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$kur['nama_kurikulum'];?></td>
                            <td><?php 
                            if ($kur['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            <td>
                              <?php 
                            if ($kur['status']==0) {
                             ?>
                             <a onclick="return confirm('Yakin Aktifkan Kurikulum  ??')" href="?page=master&act=set_kurikulum&id=<?=$kur['id_kurikulum'] ?>&status=1" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i> Aktifkan</a>
                             <?php
                              
                            }else{
                              ?>
                              <a onclick="return confirm('Yakin NonAktifkan Kurikulum  ??')" href="?page=master&act=set_kurikulum&id=<?=$kur['id_kurikulum'] ?>&status=0" class="btn btn-dark btn-sm"><i class="far fa-times-circle"></i> Nonaktif</a>
                              <?php
                            }

                            ?>
                               
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$kur['id_kurikulum'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delkurikulum&id=<?=$kur['id_kurikulum'] ?>">
<i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$kur['id_kurikulum'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Kurikulum</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-10">
                          <div class="form-group">
                        <label>Kurikulum</label>
                         <input name="id" type="hidden" value="<?=$kur['id_kurikulum'] ?>">
                        <input name="kurikulum" type="text" value="<?=$kur['nama_kurikulum'] ?>" class="form-control">
                    </div>
                   
                    <div class="form-group">                    
                            <button name="edit" class="btn btn-primary" type="submit">Edit</button>
                     
                    </div>                        
                    </div>                      
                  </div>
                </form>
                <?php 
                if (isset($_POST['edit'])) {
                    $save= mysqli_query($con,"UPDATE tb_kurikulum SET nama_kurikulum='$_POST[kurikulum]' WHERE id_kurikulum='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=kurikulum';
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
</div>
</div>
</div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addKurikulum" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Kurikulum</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Kurikulum</label>
                        <input name="kurikulum" type="text" placeholder="Nama Kurikulum .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_kurikulum VALUES(NULL,'$_POST[kurikulum]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=kurikulum';
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


