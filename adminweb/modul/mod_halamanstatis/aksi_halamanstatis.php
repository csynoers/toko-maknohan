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

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus halaman statis
if ($module=='halamanstatis' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM halamanstatis WHERE id_halaman='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  }
  echo "<script>window.alert('Data berhasil dihapus');
        window.location=('../../media.php?module=halamanstatis')</script>";
}

// Input halaman statis
elseif ($module=='halamanstatis' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    
    UploadBanner($nama_file);
    mysql_query("INSERT INTO halamanstatis(judul,
                                    isi_halaman,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_halaman]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
 echo "<script>window.alert('Data berhasil disimpan');
        window.location=('../../media.php?module=halamanstatis')</script>";
  
  }
  else{
    mysql_query("INSERT INTO halamanstatis(judul,
                                    isi_halaman,
                                    tgl_posting) 
                            VALUES('$_POST[judul]',
                                   '$_POST[isi_halaman]',
                                   '$tgl_sekarang')");
 echo "<script>window.alert('Data berhasil disimpan');
        window.location=('../../media.php?module=halamanstatis')</script>";
  }
}

// Update halaman statis
elseif ($module=='halamanstatis' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE halamanstatis SET judul       = '$_POST[judul]',
                                          isi_halaman = '$_POST[isi_halaman]'
                                    WHERE id_halaman  = '$_POST[id]'");
  echo "<script>window.alert('Data berhasil diubah');
        window.location=('../../media.php?module=halamanstatis')</script>";
  }
  else{
     
    UploadBanner($nama_file);
    mysql_query("UPDATE halamanstatis SET judul       = '$_POST[judul]',
                                          isi_halaman = '$_POST[isi_halaman]',
                                          gambar      = '$nama_file'   
                                    WHERE id_halaman  = '$_POST[id]'");
  echo "<script>window.alert('Data berhasil diubah');
        window.location=('../../media.php?module=halamanstatis')</script>";
  
  }
}
}
?>
