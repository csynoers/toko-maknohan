<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
// Hapus kustomer
if ($module=='kustomer' AND $act=='hapus'){
  mysql_query("DELETE FROM kustomer WHERE id_kustomer='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

if ($module=='kustomer' AND $act=='update'){
  if (empty($_POST[password])) {
    mysql_query("UPDATE kustomer SET nama   = '$_POST[nama]',
                                  email          = '$_POST[email]',
								 blokir         = '$_POST[blokir]',
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_kustomer     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE kustomer SET password        = '$pass',
                                 nama    = '$_POST[nama]',
                                 email           = '$_POST[email]',
								blokir         = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id_kustomer      = '$_POST[id]'");
  }
  echo "<script>window.alert('Data berhasil diubah');
        window.location=('../../media.php?module=kustomer')</script>";
}
}
?>
