<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Tahun Pelajaran</h4>
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
                <a href="#">Daftar Tahun Pelajaran</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addTahun Pelajaran"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div> -->
                <div class="card-body">
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TAHUN PELALAJARAN</th>
                            <th>STATUS</th>
                            <!-- <th>OPSI</th> -->
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$ta = mysqli_query($con,"SELECT * FROM tb_thajaran");
                        foreach ($ta as $t) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><b><?=$t['tahun_ajaran'];?></b></td>
                            <td>
                            <?php 
                            if ($t['status']==0) {
                              echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                              
                            }else{
                              echo "<span class='badge badge-success'>Aktif</span>";
                            }

                            ?></td>
                            
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
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addTahun Pelajaran" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Tahun</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>TAHUN PELAJARAN</label>
                        <input name="tp" type="text" placeholder="2020/2021" class="form-control" required>
                    </div>
                   
                    <div class="form-group">                    
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_thajaran VALUES(NULL,'$_POST[tp]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=ta';
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


