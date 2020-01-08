<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
include "config/library.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST['id'];
if ($module=='keranjang' AND $act=='tambah'){

	$sid = session_id();

	$sql2 = mysql_query("SELECT stok FROM produk WHERE id_produk='$id'");
	$r=mysql_fetch_array($sql2);
	$stok=$r[stok];
  
  if ($stok == 0){
      echo "<script>window.alert('Maaf Stok Habis');
        window.location=('index.php')</script>";
  }
  else{
	// check if the product is already
	// in cart table for this session
	$ukuran=$_POST['id_ukuran'];
	$sql = mysql_query("SELECT id_produk FROM orders_temp
			WHERE id_produk='$id' AND id_session='$sid' and id_ukuran='$ukuran'");
	$ketemu=mysql_num_rows($sql);
	if ($ketemu==0){
		// put the product in cart table
		mysql_query("INSERT INTO orders_temp (id_produk, jumlah, id_session, tgl_order_temp, jam_order_temp, stok_temp,id_ukuran)
				VALUES ('$id', 1, '$sid', '$tgl_sekarang', '$jam_sekarang', '$stok','$ukuran')");
				
	} else {
		// update product quantity in cart table
		mysql_query("UPDATE orders_temp 
		        SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_produk='$id' and id_ukuran='$ukuran'");	
						
	}	
	deleteAbandonedCart();
	header('Location:keranjang-belanja.html');
  }				
}

elseif ($module=='keranjang' AND $act=='hapus'){

	mysql_query("DELETE FROM orders_temp WHERE id_orders_temp='$_GET[id]'");
	header('Location:keranjang-belanja.html');

}

elseif ($module=='keranjang' AND $act=='update'){
  $id       = $_POST[id];
  $jml_data = count($id);
  $jumlah   = $_POST[jml];
  $ukuran   = $_POST[ukuran];// quantity
  for ($i=1; $i <= $jml_data; $i++){
	$sql2 = mysql_query("SELECT stok_temp FROM orders_temp	WHERE id_orders_temp='".$id[$i]."'");
	while($r=mysql_fetch_array($sql2)){
    if ($jumlah[$i] > $r[stok_temp]){
        echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');
        window.location=('keranjang-belanja.html')</script>";
    }
    else{
      mysql_query("UPDATE orders_temp SET jumlah = '".$jumlah[$i]."',
										  id_ukuran = '".$ukuran[$i]."'
                                      WHERE id_orders_temp = '".$id[$i]."'");
      header('Location:keranjang-belanja.html');
    }
  }
  }
}

$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
      // Update untuk menambah stok 
      mysql_query("UPDATE produk,orders_detail,orders SET produk.stok=produk.stok+orders_detail.jumlah 
												WHERE produk.id_produk=orders_detail.id_produk 
												AND orders.id_orders=orders_detail.id_orders
												AND orders.tgl_order < '$kemarin' 
												AND orders.status_order='Belum Dibayar'
												");
	mysql_query("DELETE FROM orders 
	        WHERE status_order='Belum Dibayar'
			AND tgl_order < '$kemarin'");
/*
	Delete all cart entries older than one day
*/
function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM orders_temp 
	        WHERE tgl_order_temp < '$kemarin'");
}
?>
