<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_norek/aksi_norek.php";
switch($_GET[act]){
  // Tampil norek
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-norek'>
              <h3 class='box-title'><b>No rekening</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah Nomor Rek' onclick=\"window.location.href='?module=norek&act=tambahnorek';\">
							<p>
            <!-- /.box-norek -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>
<thead>	
          <tr><th>No</th><th>Bank</th><th>Nomor</th><th>Atas Nama</th><th>Aksi</th></tr></thead>
		  <tbody>";
    $tampil=mysql_query("SELECT * FROM norek ORDER BY id_norek DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[bank]</td>
                <td>$r[nomor]</td>
				 <td>$r[atas_nama]</td>
                <td><a href=?module=norek&act=editnorek&id=$r[id_norek] class='btn btn-warning'>Edit</a> | 
	               <a href=$aksi?module=norek&act=hapus&id=$r[id_norek] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a</td>
		        </tr>";
    $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
  
  case "tambahnorek":
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-norek'>
              <h3 class='box-title'><b>Tambah norek</b></h3>
            </div>
            <!-- /.box-norek -->
            <div class='box-body'>
          <form method=POST action='$aksi?module=norek&act=input' enctype='multipart/form-data'>
            <table id='example1' class='table table-bordered table-striped'>
          <tr><td>Bank</td><td>   <input class='form-control' type=text name='bank' required></td></tr>
		  <tr><td>Atas Nama</td><td>   <input class='form-control' type=text name='atas_nama' required></td></tr>
		  <tr><td>Nomor Rek</td><td>   <input class='form-control' type=text name='nomor' required></td></tr>		
         
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Simpan</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
     break;
    
  case "editnorek":
    $edit = mysql_query("SELECT * FROM norek WHERE id_norek='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-norek'>
              <h3 class='box-title'><b>Edit norek</b></h3>
            </div>
            <!-- /.box-norek -->
            <div class='box-body'>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=norek&act=update>
          <input type=hidden name=id value=$r[id_norek]>
            <table id='example1' class='table table-bordered table-striped'>
          
		 <tr><td>Bank</td><td>   <input class='form-control' type=text name='bank' value='$r[bank]' required></td></tr>
		  <tr><td>Atas Nama</td><td>   <input class='form-control' type=text name='atas_nama' value='$r[atas_nama]' required></td></tr>
		  <tr><td>Nomor Rek</td><td>   <input class='form-control' type=text name='nomor' value='$r[nomor]' required></td></tr>
          
          
         <tr><td colspan=2><button type='submit' class='btn btn-primary'>Update</button>
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
