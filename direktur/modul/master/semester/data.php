<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Data Semester</h4>
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
                <a href="#">Data Semester</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- <div class="card-header">
                  <div class="card-title">
                     <a href="" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#addSemester"><i class="fa fa-plus"></i> Tambah</a>
                  </div>
                </div> -->
                    <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Semester</th>
                            <th>Status</th>
                            <!-- <th>Opsi</th> -->
                        </tr>
                    </thead>  
                    <tbody>
                        <?php 
                        $no=1;
			$semester = mysqli_query($con,"SELECT * FROM tb_semester");
                        foreach ($semester as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                            <td><?=$k['semester'];?></td>
                            <td><?php 
                            if ($k['status']==0) {
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

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="addSemester" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">           
            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah semester</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
            <div class="modal-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label>Semester</label>
                        <input name="semester" type="text" placeholder="Nama semester .." class="form-control">
                    </div>
                   
                    <div class="form-group">                     
                            <button name="save" class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
                <?php 
                if (isset($_POST['save'])) {
                    $save= mysqli_query($con,"INSERT INTO tb_semester VALUES(NULL,'$_POST[semester]','1') ");
                    if ($save) {
                        echo "<script>
                        alert('Data tersimpan !');
                        window.location='?page=master&act=semester';
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


