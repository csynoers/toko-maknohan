<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus ukuran
if ($module=='ukuran' AND $act=='hapus'){
  mysql_query("DELETE FROM ukuran WHERE id_ukuran='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input ukuran
elseif ($module=='ukuran' AND $act=='input'){
 
  mysql_query("INSERT INTO ukuran(kode_ukuran) VALUES('$_POST[kode_ukuran]')");
  header('location:../../media.php?module='.$module);
}

// Update ukuran
elseif ($module=='ukuran' AND $act=='update'){
  
  mysql_query("UPDATE ukuran SET kode_ukuran = '$_POST[kode_ukuran]' WHERE id_ukuran = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
