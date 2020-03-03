<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET['act']){
  // Tampil Hubungi Kami
  default:
    echo"<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Hubungi</b></h3>
            </div>			
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'> 
	<thead>
          <tr><th>no</th><th>nama</th><th>email</th><th>subjek</th><th>tanggal</th><th>aksi</th></tr></thead>
	<tbody>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT $posisi, $batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r['tanggal']);
      echo "<tr><td>$no</td>
                <td>$r[nama]</td>
                <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
                <td>$r[subjek]</td>
                <td>$tgl</a></td>
                <td><a href=$aksi?module=hubungi&act=hapus&id=$r[id_hubungi] onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>
                </td></tr>";
    $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    
    break;

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);

    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Replay Email</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
          <form method=POST action='?module=hubungi&act=kirimemail'>
          <table id='example1' class='table table-bordered table-striped'> 
          <tr><td>Kepada</td><td> : <input type=text name='email' size=30 value='$r[email]'></td></tr>
          <tr><td>Subjek</td><td> : <input type=text name='subjek' size=50 value='Re: $r[subjek]'></td></tr>
          <tr><td>Pesan</td><td> <textarea name='pesan' style='width: 600px; height: 380px;'><br><br><br><br>     
  -----------------------------------------------------------------------------------------------------------------
  $r[pesan]</textarea></td></tr>
          <tr><td colspan=2><input type=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
     break;
    
  case "kirimemail":
    mail($_POST['email'],$_POST['subjek'],$_POST['pesan'],"From: support@maknohan.com");
    echo "<h5>Status Email</h5>
          <p>Email telah sukses terkirim ke tujuan</p>
          <p>[ <a href=javascript:history.go(-2)>Kembali</a> ]</p>";	 		  
    break;  
}
}
?>
