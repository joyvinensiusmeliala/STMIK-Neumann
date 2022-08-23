<div class="page-inner">
          <div class="page-header">
            <h4 class="page-title">Siswa</h4>
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
                <a href="#">Data Siswa</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">Tambah Siswa</a>
              </li>
            </ul>
          </div>
          <div class="row">
                <div class="col-lg-8">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Form Entry Siswa</h3>
                    </div>
                    <div class="card-body">
<form action="?page=siswa&act=proses" method="post" enctype="multipart/form-data">

<table cellpadding="3" style="font-weight: bold;">
  <tr>
    <td>Nama Peserta Didik </td>
    <td>:</td>
    <td><input type="text" class="form-control" name="nama" placeholder="Nama lengkap" required></td>
  </tr>
  <tr>
    <td>NIS/NISN</td>
    <td>:</td>
    <td><input name="nis" type="text" class="form-control" placeholder="NIS/NISN" required>	</td>
  </tr>
  <tr>
    <td>Tempat,Tanggal Lahir </td>
    <td>:</td>
    <td><input type="text" class="form-control" name="tempat" placeholder="Tempat Lahir"></td>
    <td>/</td>
    <td><input type="date" class="form-control" name="tgl" placeholder="Tanggal Lahir"></td>
  </tr>
  <tr>
    <td>Jenis Kelamin </td>
    <td>:</td>
    <td>
    	<select name="jk" class="form-control">
    		<option value="L">Laki-laki</option>
    		<option value="P">Perempuan</option>
    	</select>
    </td>
  </tr>

  <tr>
    <td>Alamat Peserta Didik </td>
    <td>:</td>
    <td><textarea name="alamat" class="form-control"></textarea></td>
  </tr>
  <tr>
    <td colspan="3">Akademik</td>
  </tr>
  <tr>
    <td>Jurusan</td>
    <td>:</td>

  <td>

  
    <select class="form-control" name="jurusan">
    <option>Pilih Jurusan</option>
    <?php
    $sqlJurusan=mysqli_query($con, "SELECT * FROM tb_jurusan 
    ORDER BY id_jurusan ASC");
    while($jurusan=mysqli_fetch_array($sqlJurusan)){
    echo "<option value='$jurusan[id_jurusan]'>$jurusan[nama_jurusan]</option>";
    }
    ?>
    
    </select>
	</td>
  </tr>

  </tr>
  
  <tr>
    <td>Kelas Siswa</td>
    <td>:</td>

  <td>

  
    <select class="form-control" name="kelas">
    <option>Pilih Kelas</option>
    <?php
    $sqlKelas=mysqli_query($con, "SELECT * FROM tb_mkelas 
    ORDER BY id_mkelas ASC");
    while($kelas=mysqli_fetch_array($sqlKelas)){
    echo "<option value='$kelas[id_mkelas]'>$kelas[nama_kelas]</option>";
    }
    ?>
    
    </select>
	</td>
  </tr>

  </tr>

  <tr>
    <td>Semester</td>
    <td>:</td>
	<td>
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
	</td>
  </tr>

  </tr>

   <tr>
    <td>Tahun Masuk</td>
    <td>:</td>
    <td><input name="th_masuk" type="number" class="form-control" placeholder="2019"></td>
  </tr>
  <tr>
    <td>Pas Foto</td>
    <td>:</td>
    <td><input type="file" class="form-control" name="foto"></td>
  </tr>
  <tr>
    <td colspan="3">
		<button name="saveSiswa" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		<a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Batal</a>
    </td>
  </tr>
</table>
</form>
</div>
</div>
</div>
</div>
</div>

