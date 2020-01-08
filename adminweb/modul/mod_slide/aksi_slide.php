<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus slide
if ($module=='slide' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM slide WHERE id_slide='$_GET[id]'"));
  if ($data['gambar']!=''){
     mysql_query("DELETE FROM slide WHERE id_slide='$_GET[id]'");
     unlink("../../../foto_banner/$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM slide WHERE id_slide='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}

// Input slide
elseif ($module=='slide' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("INSERT INTO slide(judul,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO slide(judul) 
                            VALUES('$_POST[judul]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update slide
elseif ($module=='slide' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE slide SET judul     = '$_POST[judul]'
                             WHERE id_slide = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file);
    mysql_query("UPDATE slide SET judul     = '$_POST[judul]',
                                   gambar    = '$nama_file'   
                             WHERE id_slide = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
