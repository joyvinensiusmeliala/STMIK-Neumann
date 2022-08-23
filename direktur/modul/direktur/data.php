<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Kepala Sekolah</h4>
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
                <a href="#">Data Kepala Sekolah</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Daftar Kepala Sekolah</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                
                <div class="card-body">
                  
                      <div class="table-responsive">
                   <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nip</th>
                            <th>Nama Kepala Sekolah</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Foto</th>
                        </tr>
                    </thead>  
                    
                    <tbody>
                        <?php 
                        $no=1;
      $direktur = mysqli_query($con,"SELECT * FROM tb_direktur");
                        foreach ($direktur as $k) {?>
                        <tr>
                            <td><?=$no++;?>.</td>
                          
                            <td><?=$k['nip'];?></td>
                            <td><?=$k['nama_direktur'];?></td>
                            <td><?=$k['email'];?></td>
                            <td><?php if ($k['status']=='Y') {
                                echo "<span class='badge badge-success'>Aktif</span>";
                                
                            }else {
                                echo "<span class='badge badge-danger'>Off</span>";
                            } ?></td>
                            <td><img src="../assets/img/user/<?=$k['foto'] ?>" width="45" height="45"></td>
                              <!-- <td>
              <a class="btn btn-info btn-sm" href="?page=direktur&act=edit&id=<?=$k['id_direktur'] ?>"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data ??')" href="?page=direktur&act=del&id=<?=$g['id_direktur'] ?>"><i class="fas fa-trash"></i>
              </a>

                            </td> -->
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






