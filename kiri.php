<?php
echo"
<div class='well well-small'>
	<ul class='nav nav-list'>";
	$sql=mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
									while($r=mysql_fetch_array($sql)){
									echo"
		<li><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'><span class='icon-chevron-right'></span>$r[nama_kategori]</a></li>";
		}
		echo"
		
	</ul>
</div>

			  <div class='well well-small' >
			  	<h5>Metode Pembayaran</h5>
			  	<a href='#'><img src='img/fasapay.png' alt='payment method fasapay'></a>
			  <!--<center><h4>Mandiri</h4>
				  <p>An. Toko Maknohan</p>
				  <p>No. Rek : 0867564-9876-876</p>
			  </center>-->
			  </div>";
$promo=mysql_query("SELECT * FROM produk ORDER BY rand() LIMIT 1");
while($a=mysql_fetch_array($promo)){
$harga1 = $a[harga];
    $harga     = number_format($harga1,0,",",".");
			echo"
			<li>
			  <div class='thumbnail'>
				<a class='zoomTool' href='produk-$a[id_produk]-$a[produk_seo].html' title='add to cart'><span class='icon-search'></span> DETAIL</a>
				<img src='foto_produk/medium_$a[gambar]' alt='bootstrap ecommerce templates'>
				<div class='caption'>
				   <h4><a class='defaultBtn' href='produk-$a[id_produk]-$a[produk_seo].html'>Lihat</a> <span class='pull-right'>Rp. $harga</span></h4>
				</div>
			  </div>
			</li>
			<li style='border:0'> &nbsp;</li>			
			
			
			";
			}


?>