<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$email = $_POST['email'];
$pass     = md5($_POST['password']);


$login=mysql_query("SELECT * FROM kustomer WHERE email='$email' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  

  $_SESSION[kustomer_id]     = $r[id_kustomer];
  $_SESSION[namalengkap]  = $r[nama];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[kota]    = $r[id_kota];
  $_SESSION[email]     = $r[email];

  header('location:media2.php?module=home');
}


else{
 echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'index.php'</script>";
}

?>
