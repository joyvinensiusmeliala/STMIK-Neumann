<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Mata Pelajaran</h4>
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
                <a href="#">Daftar Mata Pelajaran</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div> -->
                <div class="card-body">
                      <div class="table-responsive">

               

                 <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama Mapel</th>
                            <th>SKS Teori</th>
                            <th>SKS Praktek</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$mapel = mysqli_query($con,"SELECT * FROM tb_master_mapel
      -- INNER JOIN tb_semester ON tb_master_mapel.id_semester=tb_semester.id_semester
      ");
                        foreach ($mapel as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            
                            <td><?=$k['kode_mapel'];?></td>
                            <td><?=$k['mapel'];?></td>
                            <td><?=$k['sks_teori'];?></td>
                            <td><?=$k['sks_praktek'];?></td>
                            
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Mapel</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                      <div class="form-group">
                        <label>Kode Mata Kuliah</label>
                        <!-- <input name="kode" type="text" value="MP-<?=time() ?>" class="form-control" readonly> -->
                        <input name="kode" type="text" placeholder="Kode Mata Kuliah" class="form-control">
                      </div>
                    <div class="form-group">
                        <label>Nama Mata Kuliah</label>
                        <input name="mapel" type="text" placeholder="Nama Mata Kuliah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>SKS Teori</label>
                        <input name="sks_teori" type="text" placeholder="SKS Teori" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>SKS Praktek</label>
                        <input name="sks_praktek" type="text" placeholder="SKS Praktek" class="form-control">
                    </div>
                    

                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_master_mapel VALUES(NULL,'$_POST[kode]','$_POST[mapel]','$_POST[sks_teori]','$_POST[sks_praktek]')" );
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=mapel';
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



