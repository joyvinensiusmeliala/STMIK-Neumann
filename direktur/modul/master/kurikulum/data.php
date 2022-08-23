<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Data Kurikulum</h4>
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
                <a href="#">Data Kurikulum</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kurikulum</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
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

                            ?>
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


