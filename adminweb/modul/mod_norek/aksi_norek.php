<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus header
if ($module=='norek' AND $act=='hapus'){
  mysql_query("DELETE FROM norek WHERE id_norek='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input norek
elseif ($module=='norek' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("INSERT INTO norek(bank,
                                   atas_nama,
                                    nomor,
                                    gambar) 
                            VALUES('$_POST[bank]',
                                  '$_POST[atas_nama]',
                                   '$_POST[nomor]',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO norek(bank,
                                   atas_nama,
                                    nomor) 
                            VALUES('$_POST[bank]',
                                  '$_POST[atas_nama]',
                                   '$_POST[nomor]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update norek
elseif ($module=='norek' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE norek SET bank     = '$_POST[bank]',
								nomor     = '$_POST[nomor]',
                                   atas_nama = '$_POST[atas_nama]'
                             WHERE id_norek = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file);
    mysql_query("UPDATE norek SET bank     = '$_POST[bank]',
								nomor     = '$_POST[nomor]',
                                   atas_nama = '$_POST[atas_nama]',
                                   gambar    = '$nama_file'   
                             WHERE id_norek = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
