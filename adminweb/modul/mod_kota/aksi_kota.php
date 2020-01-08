<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kota
if ($module=='kota' AND $act=='hapus'){
  mysql_query("DELETE FROM kota WHERE id_kota='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kota
elseif ($module=='kota' AND $act=='input'){
  
  mysql_query("INSERT INTO kota(nama_kota,ongkos_kirim) VALUES('$_POST[nama_kota]','$_POST[ongkos_kirim]')");
  header('location:../../media.php?module='.$module);
}

// Update kota
elseif ($module=='kota' AND $act=='update'){
  
  mysql_query("UPDATE kota SET nama_kota = '$_POST[nama_kota]', ongkos_kirim='$_POST[ongkos_kirim]' WHERE id_kota = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
