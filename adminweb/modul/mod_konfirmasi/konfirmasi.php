<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_konfirmasi/aksi_konfirmasi.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo"
  <div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Konfirmasi Pembayaran</b></h3>
            </div>
			
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>";  
    echo "<thead>
          <tr><th>No</th><th>Nama</th><th>ID Orders</th><th>Pemilik Rekening</th><th>Tanggal</th><th>Gambar</th></tr></thead>
	<thead>
	<tbody>"; 
	$tampil = mysql_query("SELECT * FROM konfirmasi,orders,kustomer WHERE konfirmasi.id_orders=orders.id_orders 
																	AND orders.id_kustomer=kustomer.id_kustomer
																	ORDER BY id_konfirmasi DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	$harga=format_rupiah($r[harga]);
	$tanggal=tgl_indo($r[tanggal]);
       echo "<tr><td>$no</td>
             <td>$r[nama]</td>
			 <td><a href=?module=order&act=detailorder&id=$r[id_orders]>$r[id_orders]</a></td>
			 <td>$r[pemilik_rekening]</td>			 
			  <td>$tanggal-$r[jam]</td>
			 <td ><a href='../bukti_bayar/$r[gambar]' target='_blank'><img src='../bukti_bayar/$r[gambar]' width='50' height='50' title='klik untuk memperbesar gambar'></a></td> 
		         </tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
  
   
}
}
?>
