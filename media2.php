<?php
error_reporting(0);
  session_start();	
  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  include "config/fungsi_thumb.php";
  require_once("include/config.php");

$serverUrlAndPath = "http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["REQUEST_URI"]);

$succesUrl = $serverUrlAndPath."success.php";
$failUrl = $serverUrlAndPath."fail.php";
$statusUrl = $serverUrlAndPath."status.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Toko Batik Sinar Abadi shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">      
	<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<?php
		if (empty($_SESSION['namalengkap']) AND empty($_SESSION['passuser'])){
		?>
				<a href="index.php"> <span class="icon-home"></span> Home</a>
				<a href="daftar-member.html"><span class="icon-edit"></span> Free Register </a> 
				<a href="hubungi-kami.html"><span class="icon-envelope"></span> Hubungi Kami</a>
				<a href="keranjang-belanja.html"><span class="icon-shopping-cart"></span> Keranjang Anda</a>
		<?php
		  }
		  if (!empty($_SESSION['namalengkap']) AND !empty($_SESSION['passuser'])){
		  ?>
		  <a href="index.php"> <span class="icon-home"></span> Home</a> 
				<a href="edit-member.html"><span class="icon-user"></span> My Account</a>
				<a href="data-transaksi.html"><span class="icon-edit"></span> Riwayat Order </a>
				<a href="konfirmasi-pembayaran.html"><span class="icon-envelope"></span> Konfirmasi Pembayaran</a>
				<a href="hubungi-kami.html"><span class="icon-envelope"></span> Hubungi Kami</a>
				<a href="keranjang-belanja.html"><span class="icon-shopping-cart"></span> Keranjang Anda</a>
				<?php
		  }
		  ?>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	
	</div>
	
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class=""><a href="index.php">Home	</a></li>
			  <li class=""><a href="semua-produk.html">Produk</a></li>
			  <li class=""><a href="cara-pembelian.html">Cara Beli</a></li>
			  <li class=""><a href="profil-kami.html">Profil</a></li>
			</ul>
			<form action="hasil-pencarian.html" method="POST" class="navbar-search pull-left">
			  <input type="text" name="kata" placeholder="Pencarian" class="search-query span2">
			</form>
			<?php
		if (empty($_SESSION['namalengkap']) AND empty($_SESSION['passuser'])){
		?>
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form action="cek_login.php" method="POST" class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="email" name="email" class="span2" id="inputEmail" placeholder="Email" required>
				  </div>
				  <div class="control-group">
					<input type="password" name="password" class="span2" id="inputPassword" placeholder="Password" required>
				  </div>
				  <div class="control-group">
					
					<button type="submit" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
			</ul>
			<?php
		  }
		  if (!empty($_SESSION['namalengkap']) AND !empty($_SESSION['passuser'])){
		  ?>
		  <ul class="nav pull-right">
		  <li class=""><a href="logout.php">Logout	</a></li>
		  </ul>
		  <?php
		  }
		  ?>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->
	<div class="row">
<div id="sidebar" class="span3">
<?php include"kiri.php" ?>
	</div>
	<div class="span9">
	<?php
	if ($_GET[module]=='home'){
	?>
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			<?php
$header=mysql_query("SELECT * FROM slide ");
while($b=mysql_fetch_array($header)){
			echo"
			<div class='item'>
                <img style='width:100%' src='foto_banner/$b[gambar]' alt='$b[judul]'>
                <div class='carousel-caption'>
                      <p><span>$b[judul]</span></p>
                </div>
              </div>";
			  }
			  ?>
			  
			 
			  
              
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
     </div>
	 <?php
	 }
	 ?>
<!--
New Products
-->
	<?php include"kanan.php" ?>
	<!--
	Featured Products
	-->
	
	</div>
	</div>
<!-- 
Clients 
-->


<!--
Footer
-->
<footer class="footer">
<div class="row-fluid">

<div class="span2">
<h5>Navigasi</h5>
<a href="hubungi-kami.html">HUBUNGI KAMI</a><br>
<a href="cara-beli.html">CARA BELI</a><br>
<a href="profil-kami.html">PROFIL KAMI</a><br>
 </div>

 <div class="span6">
<h5>Kontak Kami</h5>
Email : sinarabadibatikkp@yahoo.com <br>
Phone : 0813 9015 7959  <br>
Alamat :  Jl. Sutijab No.48, Wates, Kabupaten Kulon Progo, DIY 55651 <br>
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
	<p class="pull-right">
		<a href="#"><img src="assets/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="assets/img/mc.png" alt="payment"></a>
		<a href="#"><img src="assets/img/pp.png" alt="payment"></a>
		<a href="#"><img src="assets/img/visa.png" alt="payment"></a>
		<a href="#"><img src="assets/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2018<br> Toko Batik Sinar Abadi</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
	
	
	 <!-- Bootstrap core JavaScript -->
   <script src="js/seribu.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#loading").hide();
		$('#provinsi').change(function(){
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var prov = $('#provinsi').val();

      		$.ajax({
            	type : 'GET',
           		url : 'php/cek_kabupaten.php',
            	data :  'prov_id=' + prov,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});

		$("#cek").click(function(){
			$("#loading").show();
			$("#kurirname").hide();
			$("#details").hide();
			$("#ongkos").hide();
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();
			
      		$.ajax({
            	type : 'POST',
           		url : 'php/cek_ongkir.php',
            	data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
					success: function (data) {
						$("#kurirname").show();
						$("#details").show();
						$("#ongkos").show();
						
						var obj=$.parseJSON(data);
						var kurirname=obj['rajaongkir'].results[0].name;
						$("#kurirname").text(kurirname);
						
						var origin=obj['rajaongkir'].origin_details.city_name;
						var destination=obj['rajaongkir'].destination_details.city_name;
						var weight=obj['rajaongkir'].query.weight;
						weight=seribu(weight,",", ".",0);
						$("#details").html('<thead style="background-color:green;color:white;"><tr><th>Kota/Kabupaten Asal</th><th>Kota/Kabupaten Tujuan</th><th>Berat (Gram)</th></tr></thead><tbody><tr><td>'+origin+'</td><td>'+destination+'</td><td>'+weight+'</td></tr></tbody>');
						
						var service=[];
						var description=[];
						var ongkos=[];
						var sampai=[];
						var kurirkode=obj['rajaongkir'].results[0].code;
						
						var n=obj['rajaongkir'].results[0].costs;
						for(i=0;i<n.length;i++){
							service[i]=obj['rajaongkir'].results[0].costs[i].service;
							description[i]=obj['rajaongkir'].results[0].costs[i].description;
							ongkos[i]=obj['rajaongkir'].results[0].costs[i].cost[0].value;
							ongkos[i]=seribu(ongkos[i],",", ".",0);
							
							sampai[i]=obj['rajaongkir'].results[0].costs[i].cost[0].etd;
							if(kurirkode!='pos'){
								sampai[i]=sampai[i]+' HARI';
							}
						}

						if(n.length==1){
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;"><input type=radio name=radio value='+service[0]+'><input type=hidden value='+service[0]+'>'+service[0]+'</td><td>'+description[0]+'</td><td>'+sampai[0]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[0]+'>'+ongkos[0]+'</td></tr></tbody>');
						} else if(n.length==2){
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;"><input type=radio name=radio value='+service[0]+'><input type=hidden value='+service[0]+'>'+service[0]+'</td><td>'+description[0]+'</td><td>'+sampai[0]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[0]+'>'+ongkos[0]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[1]+'>'+service[1]+'</td><td>'+description[1]+'</td><td>'+sampai[1]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[1]+'>'+ongkos[1]+'</td></tr></tbody>');
						} else if(n.length==3){
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;"><input type=radio name=radio value='+service[0]+'><input type=hidden value='+service[0]+'>'+service[0]+'</td><td>'+description[0]+'</td><td>'+sampai[0]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[0]+'>'+ongkos[0]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[1]+'>'+service[1]+'</td><td>'+description[1]+'</td><td>'+sampai[1]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[1]+'>'+ongkos[1]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[2]+'>'+service[2]+'</td><td>'+description[2]+'</td><td>'+sampai[2]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[2]+'>'+ongkos[2]+'</td></tr></tbody>');
						} else if(n.length==4){
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;"><input type=radio name=radio value='+service[0]+'><input type=hidden value='+service[0]+'>'+service[0]+'</td><td>'+description[0]+'</td><td>'+sampai[0]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[0]+'>'+ongkos[0]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[1]+'>'+service[1]+'</td><td>'+description[1]+'</td><td>'+sampai[1]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[1]+'>'+ongkos[1]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[2]+'>'+service[2]+'</td><td>'+description[2]+'</td><td>'+sampai[2]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[2]+'>'+ongkos[2]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[3]+'>'+service[3]+'</td><td>'+description[3]+'</td><td>'+sampai[3]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[3]+'>'+ongkos[3]+'</td></tr></tbody>');
						} else if(n.length==5){
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;"><input type=radio name=radio value='+service[0]+'><input type=hidden value='+service[0]+'>'+service[0]+'</td><td>'+description[0]+'</td><td>'+sampai[0]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[0]+'>'+ongkos[0]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[1]+'>'+service[1]+'</td><td>'+description[1]+'</td><td>'+sampai[1]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[1]+'>'+ongkos[1]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[2]+'>'+service[2]+'</td><td>'+description[2]+'</td><td>'+sampai[2]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[2]+'>'+ongkos[2]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[3]+'>'+service[3]+'</td><td>'+description[3]+'</td><td>'+sampai[3]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[3]+'>'+ongkos[3]+'</td></tr><tr><td style="text-align:left;"><input type=radio name=radio value='+service[4]+'>'+service[4]+'</td><td>'+description[4]+'</td><td>'+sampai[4]+'</td><td style="text-align:right;"><input type=hidden name=ongkos value='+ongkos[4]+'>'+ongkos[4]+'</td></tr></tbody>');
						} else {
							$("#ongkos").html('<thead style="background-color:green;color:white;"><tr><th style="text-align:left">Paket</th><th>Deskripsi</th><th>Lama Pengiriman</th><th style="text-align:right;">Ongkir (Rp)</th></tr></thead><tbody><tr><td style="text-align:left;color:red;">KOSONG</td><td style="color:red;">KOSONG</td><td style="color:red;">KOSONG</td><td style="text-align:right;color:red;">KOSONG</td></tr></tbody>');
						}
						
						//$("#ongkir").text(data);
						$("#loading").hide();
				}
          	});
		});
	});
	</script>
  </body>
</html>