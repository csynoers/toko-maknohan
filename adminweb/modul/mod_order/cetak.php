<?php
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Mak Nohan | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <body onload="window.print();"> -->
<body >
<?php
include "../../../config/koneksi.php";
include "../../../config/fungsi_rupiah.php";
include "../../../config/fungsi_indotgl.php";
$edit = mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
    $tanggal=tgl_indo($r['tgl_order']);
	$customer=mysql_query("select * from kustomer where id_kustomer='$r[id_kustomer]'");
  $c=mysql_fetch_array($customer);
echo"
<div class='wrapper'>
  <!-- Main content -->
  <section class='invoice'>
    <!-- title row -->
    <div class='row'>
      <div class='col-xs-12'>
        <h2 class='page-header'>
          <i class='fa fa-globe'></i> Toko Mak Nohan.
          <small class='pull-right'>Date: $tanggal</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class='row invoice-info'>
      <div class='col-sm-4 invoice-col'>
        Dari
        <address>
          <strong>Toko Mak Nohan.</strong><br>
          Jl. Raya Kertek km 05 Sayangan Wonosobo<br>
          Phone: 0813 9015 7959 <br>
          Email: tokomaknohan@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
        Kepada
        <address>
            <strong>$c[nama]</strong><br>
            $r[alamat]<br>
            Phone: $c[no_telp]<br>
            Email: $c[email]
          </address>
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
        <b>Invoice</b><br>
        <br>
        <b>Order ID:</b> $r[id_orders]<br>
          <b>Tgl. Transaksi:</b> $tanggal<br>
          <b>Metode Pembayaran:</b> $r[jenis_pembayaran]<br>
		  <b>Kurir:</b> $r[kurir]<br>
		  <b>Paket Kurir:</b> $r[paket]<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->";
// tampilkan rincian produk yang di order
  $sql2=mysql_query("SELECT * FROM orders_detail, produk 
                     WHERE orders_detail.id_produk=produk.id_produk 
                     AND orders_detail.id_orders='$_GET[id]'");
					 echo"
    <!-- Table row -->
    <div class='row'>
      <div class='col-xs-12 table-responsive'>
        <table class='table table-striped'>
            <thead>
            <tr>
              <th>Produk</th>
              <th>Berat(Kg)</th>
              <!--<th>Ukuran</th>-->
              <th>Jumlah</th>
              <th>Harga</th>
			  <th>Subtotal</th>
            </tr>
            </thead>";
			// tampilkan rincian produk yang di order
  $sql2=mysql_query("SELECT * FROM orders_detail a left join produk b on a.id_produk=b.id_produk
		left join ukuran c on a.id_ukuran=c.id_ukuran WHERE id_orders='$_GET[id]'");
		 while($s=mysql_fetch_array($sql2)){
  $subtotalberat = $s['berat'] * $s['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

    $harga1 = $s['harga'];
	
   
   $subtotal    = $harga1 * $s['jumlah'];
   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($harga1);
		echo"
            <tbody>
            <tr>
              <td>$s[nama_produk]</td>
              <td>$s[berat]</td>
              <!--<td>$s[kode_ukuran]</td>-->
              <td>$s[jumlah]</td>
              <td>Rp. $harga</td>
			  <td>Rp. $subtotal_rp</td>
            </tr>
			</tbody>";
			}
  
  $ongkoskirim1=$r['ongkir'];
  $ongkoskirim=$ongkoskirim1 * $totalberat;
	
  $grandtotal    = $total + $ongkoskirim; 

  $ongkoskirim_rp = format_rupiah($ongkoskirim);
  $ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
  $grandtotal_rp  = format_rupiah($grandtotal); 
			echo"
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class='row'>
        <!-- accepted payments column -->
        <div class='col-xs-6'>
          
        </div>
        <!-- /.col -->
        <div class='col-xs-6'>
          

          <div class='table-responsive'>
            <table class='table'>
              <tr>
                <th style='width:60%'>Total:</th>
                <td>Rp. $total_rp</td>
              </tr>
              <tr>
                <th>Ongkos Kirim:</th>
                <td>Rp. $ongkoskirim1_rp/Kg</td>
              </tr>
              <tr>
                <th>Total Berat:</th>
                <td>$totalberat Kg</td>
              </tr>
              <tr>
                <th>Total Ongkos Kirim:</th>
                <td>Rp. $ongkoskirim_rp</td>
              </tr>
			  <tr>
                <th>Grand Total:</th>
                <td>Rp. $grandtotal_rp</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class='row no-print'>
        <div class='col-xs-12'>
          
        </div>
      </div>
	  
	  
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
?>
</body>
</html>
