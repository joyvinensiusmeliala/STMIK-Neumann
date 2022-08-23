<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Data Silabus</h4>
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
                <a href="#">Daftar Silabus</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addSilabus"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div>
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Mata Kuliah</th>
                            <th>Semester</th>
                            <th>Kurikulum</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$silabus = mysqli_query($con,"SELECT * FROM tb_silabus
      INNER JOIN tb_master_mapel ON tb_silabus.id_mapel=tb_master_mapel.id_mapel
      INNER JOIN tb_semester ON tb_silabus.id_semester=tb_semester.id_semester
      INNER JOIN tb_kurikulum ON tb_silabus.id_kurikulum=tb_kurikulum.id_kurikulum
      ");
                        foreach ($silabus as $sbs) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$sbs['kode_mapel'];?></td>
                            <td><?=$sbs['mapel'];?></td>
                            <td><?=$sbs['semester'];?></td>
                            <td><?=$sbs['nama_kurikulum'];?></td>
                            
                            <td>
                               
                                
                            <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?=$sbs['id_silabus'] ?>"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=master&act=delsilabus&id=<?=$sbs['id_silabus'] ?>">
<i class="fas fa-trash"></i> Del</a>

                            <!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?=$sbs['id_silabus'] ?>" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Edit Silabus</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Mata Kuliah</label>
                         <input name="id" type="hidden" value="<?=$sbs['id_silabus'] ?>">
                        <select class="form-control" name="mapel">
                          <option>Pilih Mata Kuliah</option>
                          <?php
                          $sqlMapel=mysqli_query($con, "SELECT * FROM tb_master_mapel
                          ORDER BY id_mapel ASC");
                          while($mapel=mysqli_fetch_array($sqlMapel)){

                            if ($mapel['id_mapel']==$sbs['id_mapel']) {
                              $selected= "selected";
                              
                            }else{
                              $selected='';
                            }
                          echo "<option value='$mapel[id_mapel]' $selected>$mapel[mapel]</option>";
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="sms">
                          <option>Pilih Semester</option>
                          <?php
                          $sqlSemester=mysqli_query($con, "SELECT * FROM tb_semester
                          ORDER BY id_semester ASC");
                          while($semester=mysqli_fetch_array($sqlSemester)){

                            if ($semester['id_semester']==$sbs['id_semester']) {
                              $selected= "selected";
                              
                            }else{
                              $selected='';
                            }
                          echo "<option value='$semester[id_semester]' $selected>$semester[semester]</option>";
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kurikulum</label>
                        <select class="form-control" name="kur">
                          <option>Pilih Kurikulum</option>
                          <?php
                          $sqlKurikulum=mysqli_query($con, "SELECT * FROM tb_kurikulum
                          ORDER BY id_kurikulum ASC");
                          while($kurikulum=mysqli_fetch_array($sqlKurikulum)){

                            if ($kurikulum['id_kurikulum']==$sbs['id_kurikulum']) {
                              $selected= "selected";
                              
                            }else{
                              $selected='';
                            }
                          echo "<option value='$kurikulum[id_kurikulum]' $selected>$kurikulum[nama_kurikulum]</option>";
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
                    $save= mysqli_query($con,"UPDATE tb_silabus SET id_mapel='$_POST[mapel]',id_semester='$_POST[sms]',id_kurikulum='$_POST[kur]' WHERE id_silabus='$_POST[id]' ");
                    if ($save) {
                        echo "<script>
                        alert('Data diubah !');
                        window.location='?page=master&act=silabus';
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addSilabus" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah Silabus</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Mata Kuliah</label>
                        <!-- <input name="kurikulum" type="text" placeholder="Nama Kurikulum .." class="form-control"> -->
                        <select class="form-control" name="mapel">
                          <option>Pilih Mata Kuliah</option>
                          <?php
                          $sqlMapel=mysqli_query($con, "SELECT * FROM tb_master_mapel 
                          ORDER BY id_mapel ASC");
                          while($mapel=mysqli_fetch_array($sqlMapel)){
                          echo "<option value='$mapel[id_mapel]'>$mapel[mapel]</option>";
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Semester</label>
                        <!-- <input name="kurikulum" type="text" placeholder="Nama Kurikulum .." class="form-control"> -->
                        <select class="form-control" name="sms">
                          <option>Pilih Semester</option>
                          <?php
                          $sqlSemester=mysqli_query($con, "SELECT * FROM tb_semester 
                          ORDER BY id_semester ASC");
                          while($sms=mysqli_fetch_array($sqlSemester)){
                          echo "<option value='$sms[id_semester]'>$sms[semester]</option>";
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kurikulum</label>
                        <!-- <input name="kurikulum" type="text" placeholder="Nama Kurikulum .." class="form-control"> -->
                        <select class="form-control" name="kur">
                          <option>Pilih Kurikulum</option>
                          <?php
                          $sqlKurikulum=mysqli_query($con, "SELECT * FROM tb_kurikulum 
                          ORDER BY id_kurikulum ASC");
                          while($kur=mysqli_fetch_array($sqlKurikulum)){
                          echo "<option value='$kur[id_kurikulum]'>$kur[nama_kurikulum]</option>";
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_silabus VALUES(NULL,'$_POST[mapel]','$_POST[sms]','$_POST[kur]') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=silabus';
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


