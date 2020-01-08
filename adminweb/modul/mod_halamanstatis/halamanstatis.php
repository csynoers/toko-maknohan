<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){
  // Tampil Halaman Statis
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Halaman Statis</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah Halaman Statis' onclick=\"window.location.href='?module=halamanstatis&act=tambahhalamanstatis';\">
            <!-- /.box-header -->
            <div class='box-body'>
		<table id='example1' class='table table-bordered table-striped'>             
	<thead>
          <tr><th>no</th><th>judul</th><th>tgl. posting</th><th>aksi</th></tr></thead>
	<tbody>";

    $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[judul]</td>
                <td>$tgl_posting</td>
		            <td><a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman] class='btn btn-warning'>Edit</a>|
						<a href=$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>					
		                </td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;

  case "tambahhalamanstatis":
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Tambah Halaman Statis</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
          <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
           <table id='example1' class='table table-bordered table-striped'>
          <tr><td width=70>Judul</td>     <td> <input class='form-control' type=text name='judul' size=60></td></tr>
          <tr><td>Isi Halaman</td>  <td> <textarea name='isi_halaman'  style='width: 600px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>  <td>  <input class='form-control' type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Simpan</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
           </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
     break;
    
  case "edithalamanstatis":
    $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Edit Halaman Statis</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
          <input type=hidden name=id value=$r[id_halaman]>
           <table id='example1' class='table table-bordered table-striped'>
          <tr><td width=70>Judul</td>  <td>  <input class='form-control' type=text name='judul' size=60 value='$r[judul]'></td></tr>
          <tr><td>Isi Halaman</td>   <td> <textarea name='isi_halaman' style='width: 600px; height: 350px;'>$r[isi_halaman]</textarea></td></tr>
          <tr><td>Gambar</td>       <td>   ";
          if ($r[gambar]!=''){
              echo "<img src='../foto_banner/$r[gambar]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gbr</td>    <td>  <input class='form-control' type=file name='fupload' size=40> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    echo  "<tr><td colspan=2><button type='submit' class='btn btn-primary'>Update</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;  
}

}
?>
