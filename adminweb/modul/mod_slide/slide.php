<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_slide/aksi_slide.php";
switch($_GET[act]){
  // Tampil header
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>slide</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah slide' onclick=\"window.location.href='?module=slide&act=tambahslide';\">
							<p>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>
<thead>	
          <tr><th>No</th><th>Judul</th><th>Gambar</th><th>Aksi</th></tr></thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM slide ORDER BY id_slide DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td><img width=100 src='../foto_banner/$r[gambar]'></td>
                <td><a href=?module=slide&act=editslide&id=$r[id_slide] class='btn btn-warning'>Edit</a>
				<a href=$aksi?module=slide&act=hapus&id=$r[id_slide]&namafile=$r[gambar] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>				</td>
		        </tr>";
    $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
  
  case "tambahslide":
    
	echo"
   	<div class='col-md-6'>  
		 <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Tambah Slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method=POST action='$aksi?module=slide&act=input' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputEmail1'>Judul</label>
                  <input type='text' class='form-control' name='judul' id='exampleInputEmail1' placeholder='Masukkan Judul' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Gambar</label>
                  <input type='file' name='fupload' id='exampleInputFile'>
                  <p class='help-block'>Pastikan File yang diupload berekstensi *JPG atau *JPEG.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Simpan</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
            </form>
         </div>
	 </div>";
     break;
    
  case "editslide":
    $edit = mysql_query("SELECT * FROM slide WHERE id_slide='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	echo"
	<div class='col-md-6'>  
		 <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Edit Slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method=POST enctype='multipart/form-data' action=$aksi?module=slide&act=update>
            <input type=hidden name=id value=$r[id_slide]>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputEmail1'>Judul</label>
                  <input type='text' class='form-control' name='judul' id='exampleInputEmail1' placeholder='Masukkan Judul' value='$r[judul]' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Gambar</label>
                  <p class='help-block'><img width=300 src='../foto_banner/$r[gambar]'></p>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Ganti Gambar</label>
                  <input type='file' name='fupload' id='exampleInputFile'>
                  <p class='help-block'>*)File gambar (harus jpg) ukuran 1000px x 291px. Apabila gambar tidak diubah, dikosongkan saja..</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Update</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
            </form>
         </div>
	 </div>";
    
    break;  
}
}
?>
