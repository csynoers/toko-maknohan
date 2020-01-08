<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
$module=$_GET[module];
$act=$_GET[act];

// Input user
if ($module=='kios' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);

  mysql_query("INSERT INTO kios(no_kios,
                                 ukuran,
                                 harga,
                                 deskripsi,
								 gambar) 
	                       VALUES('$_POST[no_kios]',
                                '$_POST[ukuran]',
                                '$_POST[harga]',
                                '$_POST[deskripsi]',
								'$nama_file_unik')");
	}
	else {
	 mysql_query("INSERT INTO kios(no_kios,
                                 ukuran,
                                 harga,
                                 deskripsi) 
	                       VALUES('$_POST[no_kios]',
                                '$_POST[ukuran]',
                                '$_POST[harga]',
                                '$_POST[deskripsi]')");
	}
  echo "<script>window.alert('Data berhasil disimpan');
        window.location=('../../media.php?module=kios')</script>";
}

// Update user
elseif ($module=='kios' AND $act=='update'){
$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE kios SET no_kios    = '$_POST[no_kios]',
                                 ukuran           = '$_POST[ukuran]',  
                                 deskripsi           = '$_POST[deskripsi]',
								 harga         = '$_POST[harga]',
								 status         = '$_POST[status]'
                           WHERE id_kios      = '$_POST[id]'");
  }
  else {
  UploadImage($nama_file_unik);
  mysql_query("UPDATE kios SET no_kios    = '$_POST[no_kios]',
                                 ukuran           = '$_POST[ukuran]',  
                                 deskripsi           = '$_POST[deskripsi]',
								 harga         = '$_POST[harga]',
								 status         = '$_POST[status]',
								 gambar      = '$nama_file_unik'
                           WHERE id_kios      = '$_POST[id]'");
  }
  echo "<script>window.alert('Data berhasil diubah');
        window.location=('../../media.php?module=kios')</script>";
}
elseif ($module=='kios' AND $act=='hapus'){
  mysql_query("DELETE FROM kios WHERE id_kios='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
