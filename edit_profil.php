<?php
session_start();

include "config/koneksi.php";

if (empty($_POST[password])) {
    mysql_query("UPDATE kustomer SET nama   = '$_POST[nama]',
                                  email          = '$_POST[email]',
                                  address          = '$_POST[address]',
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  id_kustomer     = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE kustomer SET password        = '$pass',
                                 nama    = '$_POST[nama]',
                                 address          = '$_POST[address]',
                                 email           = '$_POST[email]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id_kustomer      = '$_POST[id]'");
  }
  echo "<script>window.alert('Data berhasil diubah');
        window.location=('edit-member.html')</script>";
?>
