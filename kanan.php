<?php
if ($_GET['module']=='home'){
echo"
<div class='well well-small'>
	<h3>Produk Terbaru </h3>
	<hr class='soften'/>
		
		<div class='row-fluid'>
		  <ul class='thumbnails'>";
		  // Tampilkan 4 produk terbaru
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 3");  
  $kolom = 3;
  $i=0;
  while ($r=mysql_fetch_assoc($sql)){
    $harga1 = $r['harga'];
    $harga     = number_format($harga1,0,",",".");
	echo"
			<li class='span4'>
			  <div class='thumbnail'>
				<a class='zoomTool' href='produk-$r[id_produk]-$r[produk_seo].html' title='add to cart'><span class='icon-search'></span> DETAIL</a>
				<a href='produk-$r[id_produk]-$r[produk_seo].html'><img src='foto_produk/medium_$r[gambar]' alt=''></a>
				<div class='caption cntr'>
					<p>$r[nama_produk]</p>
					<p><strong> Rp. $harga</strong></p>
					<br class='clr'>
				</div>
			  </div>
			</li>";
			}
			echo"
		  </ul>
		</div>
	</div>";
	}
elseif ($_GET['module']=='semuaproduk'){
echo"

	<h3>Semua Produk </h3>
		
		  <ul class='thumbnails'>";
		  // Tampilkan semua produk
  $p      = new Paging2;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua produk
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");
  while($r=mysql_fetch_assoc($sql)){
    $harga1 = $r[harga];
    $harga     = number_format($harga1,0,",",".");
    if ($r[gambar]!=''){
		}
    // Tampilkan hanya sebagian isi berita
    $isi_produk = nl2br($r[deskripsi]); // membuat paragraf pada isi berita
    $isi = substr($isi_produk,0,300); // ambil sebanyak 300 karakter
    $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat
    
	echo"
			<li class='span3'>
			  <div class='thumbnail'>
				<a href='product_details.html' class='overlay'></a>
				<a class='zoomTool' href='produk-$r[id_produk]-$r[produk_seo].html' title='add to cart'><span class='icon-search'></span> DETAIL</a>
				<a href='produk-$r[id_produk]-$r[produk_seo].html'><img src='foto_produk/medium_$r[gambar]' alt=''></a>
				<div class='caption cntr'>
					<p>$r[nama_produk]</p>
					<p><strong> Rp. $harga</strong></p>
					
					<br class='clr'>
				</div>
			  </div>
			</li>";
			} echo"
		  </ul>";
		  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);
  echo "<br><div class='center_title_bar'>Hal: $linkHalaman</div>";
  echo"
		
";
}
elseif ($_GET['module']=='detailkategori'){
$sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_assoc($sq);
echo"

	<h3>Kategori $n[nama_kategori] </h3>
		
		  <ul class='thumbnails'>";
		  $p      = new Paging3;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas);  
  // Tampilkan daftar produk yang sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM produk WHERE id_kategori='$_GET[id]' 
            ORDER BY id_produk DESC LIMIT $posisi,$batas";		 
	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	// Apabila ditemukan produk dalam kategori
	if ($jumlah > 0){
    $kolom = 2;
    $i=0;
   while($r=mysql_fetch_assoc($hasil)){
    $harga1 = $r[harga];
    $harga     = number_format($harga1,0,",",".");
    // Tampilkan hanya sebagian isi berita
    $isi_produk = nl2br($r[deskripsi]); // membuat paragraf pada isi berita
    $isi = substr($isi_produk,0,120); // ambil sebanyak 120 karakter
    $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat
    if ($i >= $kolom){
      $i=0;
    }
    $i++;
    
	echo"
			<li class='span3'>
			  <div class='thumbnail'>
				<a href='product_details.html' class='overlay'></a>
				<a class='zoomTool' href='produk-$r[id_produk]-$r[produk_seo].html' title='add to cart'><span class='icon-search'></span> DETAIL</a>
				<a href='produk-$r[id_produk]-$r[produk_seo].html'><img src='foto_produk/medium_$r[gambar]' alt=''></a>
				<div class='caption cntr'>
					<p>$r[nama_produk]</p>
					<p><strong> Rp. $harga</strong></p>
					
					<br class='clr'>
				</div>
			  </div>
			</li>";
			} echo"
		  </ul>";
		  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);
  echo "<div class='center_title_bar'>Hal: $linkHalaman</div>";
   }
  else{
    echo "<p align=center>Belum ada produk pada kategori ini.</p>";
  }
 
}
elseif ($_GET['module']=='carabeli'){
$detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='1'");
	$d   = mysql_fetch_assoc($detail);
echo"							
<div class='span9'>
<h2>$d[judul]</h2>
<p>$d[isi_halaman]</p>
							</div>";

}
elseif ($_GET['module']=='profilkami'){
$detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='2'");
	$d   = mysql_fetch_assoc($detail);
echo"							
<div class='span9'>
<h2>$d[judul]</h2>
<p>$d[isi_halaman]</p>
							</div>";

}
elseif ($_GET['module']=='detailproduk'){
$detail=mysql_query("SELECT * FROM produk,kategori    
                      WHERE produk.id_kategori=kategori.id_kategori AND id_produk='$_GET[id]'");
	$d   = mysql_fetch_assoc($detail);
  $harga     = number_format($d['harga'],0,",",".");
  $kategori=$d['id_kategori'];
echo"
<div class='span9'>
    <ul class='breadcrumb'>
    <li><a href='index.php'>Home</a> <span class='divider'>/</span></li>
    <li><a href='kategori-$d[id_kategori]-$d[kategori_seo].html'>$d[nama_kategori]</a> <span class='divider'>/</span></li>
    <li class='active'>Preview</li>
    </ul>	
	<div class='well well-small'>
	<div class='row-fluid'>
			<div class='span5'>
			<div id='myCarousel' class='carousel slide cntr'>
                <div class='carousel-inner'>
                  <div class='item active'>
                   <a href='#'> <img src='foto_produk/medium_$d[gambar]' alt='' style='width:100%'></a>
                  </div>
                  
                </div>
                
            </div>
			</div>
			<div class='span7'>
				<h3>$d[nama_produk]</h3>
				<hr class='soft'/>
				
				<form class='form-horizontal qtyFrm' action='aksi.php?module=keranjang&act=tambah' method='post'>
				  <div class='control-group'>
					<label class='control-label'><span>Rp. $harga</span></label>
				  </div>
				  <h4>$d[stok] items in stock</h4>
				  ";
			echo "<input type='hidden' name='id' value='$d[id_produk]' /> 
			<select name='id_ukuran' style='display:none'>";
			$sql_ukuran="select a.*,b.kode_ukuran from produk_ukuran a left join ukuran b on a.id_ukuran=b.id_ukuran
						where a.id_produk='$_GET[id]'";
			$qry_ukuran=mysql_query($sql_ukuran);
			while($hasil_ukuran=mysql_fetch_assoc($qry_ukuran)){
				echo "<option value='$hasil_ukuran[id_ukuran]'>$hasil_ukuran[kode_ukuran]</option>";
			}
			echo "</select>	
				  
				  <button class='shopBtn' type='submit'>Beli</button>
				</form>
			</div>
			</div>
				<hr class='softn clr'/>


            <ul id='productDetail' class='nav nav-tabs'>
              <li class='active'><a href='#home' data-toggle='tab'>Keterangan Produk</a></li>
              <li class=''><a href='#profile' data-toggle='tab'>Produk Lainnya</a></li>
              
            </ul>
            <div id='myTabContent' class='tab-content tabWrapper'>
            <div class='tab-pane fade active in' id='home'>
			  <h4>Informasi Produk</h4>
                
				<p>$d[deskripsi]</p>
			</div>
			<div class='tab-pane fade' id='profile'>";
			// Tampilkan semua produk
  $sql=mysql_query("SELECT * FROM produk,kategori    
					WHERE produk.id_kategori=kategori.id_kategori AND produk.id_kategori='$kategori' ORDER BY rand() LIMIT 3");
  while($r=mysql_fetch_assoc($sql)){
     $harga2     = number_format($r['harga'],0,",",".");
											
											echo"
			<div class='row-fluid'>	  
			<div class='span2'>
				<img src='foto_produk/medium_$r[gambar]' alt=''>
			</div>
			<div class='span6'>
				<h5>$r[nama_produk] </h5>
				
			</div>
			<div class='span4 alignR'>
			<form class='form-horizontal qtyFrm'>
			<h3> Rp. $harga2</h3>
			<br>
			<div class='btn-group'>
			  <a href='aksi.php?module=keranjang&act=tambah&id=$d[id_produk]' class='defaultBtn'><span class=' icon-shopping-cart'></span> Pesan</a>
			  <a href='produk-$r[id_produk]-$r[produk_seo].html' class='shopBtn'>DETAL</a>
			 </div>
				</form>
			</div>
		</div>
			<hr class='soft'>";
			}
			echo"
				</div>
            </div>

</div>
</div>
";
}
elseif ($_GET['module']=='daftarmember'){
/* load api raja ongkir */
require_once 'rajaongkir/rajaOngkir.php';
	
$htmls= [];
$htmls['option_provinsi'][] = "<option value='' selected disabled> -- Pilih Provinsi -- </option>";
foreach (Rajaongkir::province() as $key => $value) {
	$htmls['option_provinsi'][] = "<option value='{$value->province_id}'>{$value->province}</option>";
}
$htmls['option_provinsi'] 	= implode('',$htmls['option_provinsi']);
$htmls['option_kota'] 	= "<option value='' selected disabled> -- Pilih Provinsi Terlebih Dahulu -- </option>";

echo"							
<div class='span9'>
<h3> Form Daftar Member</h3>	
	<hr class='soft'/>
	<div class='well'>
	<form action=daftar-aksi.html method=POST class='form-horizontal'>
		<h3>Detail Data Pribadi Anda</h3>
		
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Nama Lengkap <sup>*</sup></label>
			<div class='controls'>
			  <input type='text' name='nama'  placeholder='Masukkan Nama Lengkap Anda' required>
			</div>
		 </div>
		 
		<div class='control-group'>
		<label class='control-label' for='inputEmail'>Email <sup>*</sup></label>
		<div class='controls'>
		  <input type='email' name='email' placeholder='Masukkan Email Anda' required>
		</div>
	  </div>	  
		<div class='control-group'>
			<label class='control-label'>Password <sup>*</sup></label>
			<div class='controls'>
				<input type='password' name='password' placeholder='Password' required>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Nomot Telepon <sup>*</sup></label>
			<div class='controls'>
				<input type='text' name='no_telp'  placeholder='Masukkan Nomor Telepon Anda' required>
			</div>
		</div>
		<div class='control-group'>
			<label class='control-label'>Provinsi <sup>*</sup></label>
			<div class='controls'>
				<select class='input-block-level mod-width-fit-content' name='provinsi' required>
					{$htmls['option_provinsi']}
				</select>
			</div>
		</div>

		<div class='control-group'>
			<label class='control-label'>Kota/Kabupaten <sup>*</sup></label>
			<div class='controls'>
				<select class='input-block-level mod-width-fit-content' name='kota' required>
					{$htmls['option_kota']}
				</select>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Kode Pos <sup>*</sup></label>
			<div class='controls'>
				<input type='text' class='input-block-level mod-width-fit-content input-number-only'  name='kode_pos'  placeholder='Kode Pos' required>
			</div>
		</div>		 
		 <div class='control-group'>
			<label class='control-label' for='inputFname'>Alamat <sup>*</sup></label>
			<div class='controls'>
				<input type='text' name='address'  placeholder='Masukkan Alamat Anda' required>
			</div>
		 </div>
	<div class='control-group'>
		<div class='controls'>
		 <input type='submit' name='submitAccount' value='Register' class='exclusive shopBtn'>
		</div>
	</div>
	</form>
</div>
							</div>";

}
elseif ($_GET['module']=='daftaraksi'){
// Logika utk jika dipinjam, yg masih susah di cari
$sql = mysql_query("SELECT * FROM kustomer WHERE email='$_POST[email]'
								OR no_telp ='$_POST[no_telp]'");

$ketemu=mysql_num_rows($sql);
	if ($ketemu > 0){
	echo"							
<div class='span9'>
<h3> Form Daftar Member</h3>	
	<hr class='soft'/>
<p align=center>Maaf! Email atau nomor telepon yang Anda masukkan sudah terdaftar, Silahkan ganti yang lain<br />
  	    <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>
							</div>";
	}
	else {
$pass=md5($_POST['password']);
  mysql_query("INSERT INTO kustomer(nama,
                                   email,
                                   password,
                                   no_telp,
                                   address,
                                   tgl_daftar,
                                   provinsi,
                                   kota,
                                   kode_pos
								   ) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
							   '$pass',
                               '$_POST[no_telp]',
							  '$_POST[address]',
                               '$tgl_sekarang',
							   '{$_POST['provinsi']}',
							   '{$_POST['kota']}',
							   '{$_POST['kode_pos']}'
							   )");
echo"							
<div class='span9'>
<h3> Form Daftar Member</h3>	
	<hr class='soft'/>
<p align=center><b>Terimakasih telah mendaftar Sebagai Member. <br /> Silahkan Login Terlebih Dahulu. Klik <a href='media2.php?module=loginmember'> Disini </a>
							</div>";
		}

}
elseif ($_GET['module']=='loginmember'){
echo"							
<div class='span9'>
<h3> Form Daftar Member</h3>	
	<hr class='soft'/>
	<div class='well'>
	<form action='cek_login.php' method=POST class='form-horizontal'>
		<h3>Form Login Member</h3>
	
		<div class='control-group'>
		<label class='control-label' for='inputEmail'>Email <sup>*</sup></label>
		<div class='controls'>
		  <input type='email' name='email' placeholder='Masukkan Email Anda' required>
		</div>
	  </div>	  
		<div class='control-group'>
		<label class='control-label'>Password <sup>*</sup></label>
		<div class='controls'>
		  <input type='password' name='password' placeholder='Password' required>
		</div>
	  </div>
		
	<div class='control-group'>
		<div class='controls'>
		 <input type='submit' name='submitAccount' value='Login' class='exclusive shopBtn'>
		 <p>*Jika Anda belum punya akun member silahkan daftar <a href='daftar-member.html'> Disini </a> </p>
		</div>
	</div>
	</form>
</div>
							</div>";

}
elseif ($_GET['module']=='editmember'){
	$edit=mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_SESSION[kustomer_id]'");
	$r=mysql_fetch_assoc($edit);

	/* load api raja ongkir */
	require_once 'rajaongkir/rajaOngkir.php';
	
	$htmls= [];
	foreach (Rajaongkir::province() as $key => $value) {
		$selected = ($value->province_id==$r['provinsi']) ? 'selected' : NULL ;
		$htmls['option_provinsi'][] = "<option {$selected} value='{$value->province_id}'>{$value->province}</option>";
	}
	$htmls['option_provinsi'] 	= implode('',$htmls['option_provinsi']);

	foreach (Rajaongkir::city($r['provinsi']) as $key => $value) {
		$selected = ($value->city_id==$r['kota']) ? 'selected' : NULL ;
		$htmls['option_kota'][] = "<option {$selected} value='{$value->city_id}'>{$value->city_name}</option>";
	}
	$htmls['option_kota'] 	= implode('',$htmls['option_kota']);

echo"							
<div class='span9'>
<h3> Edit Profil Member</h3>	
	<hr class='soft'/>
	<div class='well'>
	<form action=edit_profil.php method=POST class='form-horizontal'>
	<input type=hidden name=id value='$r[id_kustomer]'>
		<h3>Detail Data Pribadi Anda</h3>
		
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Nama Lengkap <sup>*</sup></label>
			<div class='controls'>
			  <input type='text' name='nama' value='$r[nama]' id='inputFname' placeholder='Masukkan Nama Lengkap Anda' required>
			</div>
		 </div>
		<div class='control-group'>
		<label class='control-label' for='inputEmail'>Email <sup>*</sup></label>
		<div class='controls'>
		  <input type='email' name='email' value='$r[email]' placeholder='Masukkan Email Anda' required>
		</div>
	  </div>	  
		<div class='control-group'>
		<label class='control-label'>Password <sup>*</sup></label>
		<div class='controls'>
		  <input type='password' name='password' placeholder='Password'>
		</div>
	  </div>
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Nomor Telepon <sup>*</sup></label>
			<div class='controls'>
			  <input type='text' name='no_telp' value='$r[no_telp]' id='inputFname' placeholder='Masukkan Nomor Telepon Anda' required>
			</div>
		 </div>
		<div class='control-group'>
			<label class='control-label'>Provinsi <sup>*</sup></label>
			<div class='controls'>
				<select class='input-block-level mod-width-fit-content' name='provinsi' required>
					{$htmls['option_provinsi']}
				</select>
			</div>
		</div>

		<div class='control-group'>
			<label class='control-label'>Kota/Kabupaten <sup>*</sup></label>
			<div class='controls'>
				<select class='input-block-level mod-width-fit-content' name='kota' required>
					{$htmls['option_kota']}
				</select>
			</div>
		</div>
		
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Kode Pos <sup>*</sup></label>
			<div class='controls'>
				<input type='text' class='input-block-level mod-width-fit-content input-number-only'  name='kode_pos' value='{$r['kode_pos']}'  placeholder='Kode Pos' required>
			</div>
		</div>
		 <div class='control-group'>
			<label class='control-label' for='inputFname'>Alamat <sup>*</sup></label>
			<div class='controls'>
			  <input type='text' class='input-block-level' name='address' value='$r[address]' id='inputFname' placeholder='Masukkan Nomor Telepon Anda' required>
			</div>
		 </div>
	<div class='control-group'>
		<div class='controls'>
		 <input type='submit' name='submitAccount' value='Register' class='exclusive shopBtn'>
		</div>
	</div>
	</form>
</div>
							</div>";
}

elseif ($_GET['module']=='keranjangbelanja'){
$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp a left join produk b on a.id_produk=b.id_produk
		left join ukuran c on a.id_ukuran=c.id_ukuran 
			                WHERE id_session='$sid'");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
    echo "<script>window.alert('Keranjang Belanjan Anda Masih Kosong');
        window.location=('index.php')</script>";
    }
  else{
echo"							
<div class='span9'>
<div class='well well-small'>
		<h1>Keranjang Belanja <small class='pull-right'>  </small></h1>
	<hr class='soften'/>
	<form method=post action=aksi.php?module=keranjang&act=update>
	<table class='table table-bordered table-condensed'>
              <thead>
                <tr>
                  <th>Gambar</th>
									<th>Nama Produk</th>
									<!--<th>Ukuran</th>-->
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Sub Total</th>
									<th>Hapus</th>
				</tr>
              </thead>";
			  $no=1;
			  $totalberat=0;
			  $total=0;
  while($r=mysql_fetch_assoc($sql)){
      $produk=$r['id_produk'];
   $subtotalberat = $r['berat'] * $r['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli
  $harga1 = $r['harga'];
    $subtotal    = $harga1 * $r['jumlah'];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($harga1);
	echo"
              <tbody>
                <tr>
                  <td><input type=hidden name=id[$no] value=$r[id_orders_temp]><img src='foto_produk/small_$r[gambar]' alt='Image 01' /></td>
									<td>$r[nama_produk]</td>";
									$sql_ukuran="select a.*,b.kode_ukuran from produk_ukuran a left join ukuran b on a.id_ukuran=b.id_ukuran
						where a.id_produk='$produk'";
			$qry_ukuran=mysql_query($sql_ukuran);
			$i=0;
			echo"
									<td class='hide'><select name='ukuran[$no]'>";
			
			while($hasil_ukuran=mysql_fetch_assoc($qry_ukuran)){
			   if ($r[id_ukuran]==$hasil_ukuran[id_ukuran]){
				echo "<option value='$hasil_ukuran[id_ukuran]' selected>$hasil_ukuran[kode_ukuran]</option>";
			}
			else {
			echo "<option value='$hasil_ukuran[id_ukuran]'>$hasil_ukuran[kode_ukuran]</option>";
			}
			}
			echo "</select></td>
									<td><select name='jml[$no]' value=$r[jumlah] onChange='this.form.submit()'>";
              for ($j=1;$j <= $r[stok];$j++){
                  if($j == $r[jumlah]){
                   echo "<option selected>$j</option>";
                  }else{
                   echo "<option>$j</option>";
                  }
              }

        echo "</select></td>
									<td>Rp. $harga</td>
									<td>Rp. $subtotal_rp</td>
									<td><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>Hapus</a> </td>
                </tr>";
				$no++; 
						}
						$berat_gram=$totalberat*1000;
						echo"
				
				 <tr>
                  <td colspan='5' class='alignR'>Total products:	</td>
                  <td class='label label-primary'> Rp. $total_rp</td>
                </tr>
				</tbody>
            </table>
			<p>Apabila anda mengubah jumlah, silahkan tekan ENTER atau tombol <a href=''><strong><button type='submit' class='btn btn-green' value=''>Update</button></strong></a></p>
			<br/>
		
	<a href='semua-produk.html' class='shopBtn btn-large'><span class='icon-arrow-left'></span> Lanjutkan Belanja </a>
	<a href='selesai-belanja.html' class='shopBtn btn-large pull-right'>Checkout <span class='icon-arrow-right'></span></a>
</form>



	</div>
							</div>";
	}

}
elseif ($_GET['module']=='selesaibelanja'){
	if (empty($_SESSION['namalengkap']) AND empty($_SESSION['passuser'])){
		echo "<script>window.alert('Anda belum Login, Silahkan Login Terlebih dahulu');
        window.location=('media2.php?module=loginmember')</script>";
	} else {
		/* start halaman selesai belanja (checkout) */
		if ( $_GET['id'] ) {
			$sid 		= session_id();
			$member 	= mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_SESSION[kustomer_id]'");
			$m			= mysql_fetch_assoc($member);
			$address	= $m['address'];
			$edit 		= mysql_query("SELECT SUM(berat) AS weight FROM orders_temp a left join produk b on a.id_produk=b.id_produk
			left join ukuran c on a.id_ukuran=c.id_ukuran 
			WHERE id_session='$sid'");
			$w    		= mysql_fetch_assoc($edit);
			$totalberat	= $w['weight'];
			$berat_gram	= $totalberat*1000;
		
			# load rajaongkir api
			require_once('rajaongkir/rajaOngkir.php');
		
			$jasaPengiriman = [];
			foreach (Rajaongkir::cost_all(['destination'=> $m['kota'],'weight'=> $berat_gram]) as $key => $value) {
				$value['valueText'] = format_rupiah($value['value']);
				$value['kurir'] = json_encode([
					'value' => $value['value'],
					'valueText' => "{$value['code']} {$value['service']} Rp. {$value['valueText']} {$value['etd']}"
				]);
				$jasaPengiriman[] = "
					<tr>
						<td style='text-align:left;'>
							<input required type='radio' name='kurir' value='{$value['kurir']}'> {$value['code']} {$value['service']} Rp. {$value['valueText']} {$value['etd']}
						</td>
					</tr>
				";
			}
			$jasaPengiriman = implode('',$jasaPengiriman);
			$jasaPengiriman = "
				<thead style='background-color:green;color:white;'>
					<tr>
						<th style='text-align:left'>Pilih Jasa Pengiriman</th>
					</tr>
				</thead>
				<tbody>
					{$jasaPengiriman}
				</tbody>
			";
		
			$kota = RajaOngkir::city($m['provinsi'],$m['kota']);
			echo "
				<h3> Form Checkout</h3>	
				<hr class='soft'/>
				<div class='well'>
					<form action=simpan-transaksi.html method=POST class='form-horizontal'>
						<h3>Alamat Pengiriman <a href='ganti-alamat-pengiriman-1.html' class='btn btn-inverse btn-mini pull-right'>Kirim ke alamat lain</a></h3>
						<div id='alamatPengiriman' style='padding: 1rem;border: 1px solid #ddd;'>
							<b>{$m['nama']}</b><br>
							{$m['no_telp']} ({$m['email']})<br>
							{$m['address']}, {$kota->type} {$kota->city_name}, {$kota->province} {$m['kode_pos']}
						</div>
							
						<div class='col-md-8'>
							<div class='card my-4'>
								<div class='card-body'>
									<div id='loading'><img src='img/ajax-loader.gif'></div>
									<p id='kurirname' style='font-weight:700;text-transform:uppercase;color:green;'></p>
									<table id='details' class='table table-bordered table-responsive'></table>
									<table id='ongkos' class='table table-bordered table-responsive'>
										{$jasaPengiriman}
									</table>
									<div id='ongkir'></div>
								</div>
							</div>
						</div>
						
						<div class='control-group'>
							<div class='controlsXXX'>
								<input type='hidden' name='alamat' value='<b>{$m['nama']}</b><br>
								{$m['no_telp']} ({$m['email']})<br>
								{$m['address']}, {$kota->type} {$kota->city_name}, {$kota->province} {$m['kode_pos']}'>
								<input type='hidden' name='payer_email' value='{$m['email']}'>
								<input type='hidden' name='id_orders' value='".('MA'.date('Ymdhis'))."'>
								<input type='submit' name='submitAccount' value='Proses' class='exclusive shopBtn'>
							</div>
						</div>
					</form>
				</div>
			";
		}
		/* end halaman selesai belanja (checkout) */

		/* start halaman ganti alamat */
		if ( $_GET['ganti-alamat'] ) {
			/* load api raja ongkir */
			require_once 'rajaongkir/rajaOngkir.php';
				
			$htmls= [];
			$htmls['option_provinsi'][] = "<option value='' selected disabled> -- Pilih Provinsi -- </option>";
			foreach (Rajaongkir::province() as $key => $value) {
				$htmls['option_provinsi'][] = "<option value='{$value->province_id}'>{$value->province}</option>";
			}
			$htmls['option_provinsi'] 	= implode('',$htmls['option_provinsi']);
			$htmls['option_kota'] 	= "<option value='' selected disabled> -- Pilih Provinsi Terlebih Dahulu -- </option>";

			echo"			
				<div class='well'>
					<form action='checkout-new-alamat-1.html' method='POST' class='form-horizontal'>
						<h3>Masukan Data Alamat Pengiriman Baru</h3>
						
						<div class='control-group'>
							<label class='control-label' for='inputFname'>Nama Lengkap <sup>*</sup></label>
							<div class='controls'>
								<input type='text' name='nama'  placeholder='Masukkan Nama Lengkap Anda' required>
							</div>
						</div>
						
						<div class='control-group'>
							<label class='control-label' for='inputEmail'>Email <sup>*</sup></label>
							<div class='controls'>
								<input type='email' name='email' placeholder='Masukkan Email Anda' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label' for='inputFname'>Nomot Telepon <sup>*</sup></label>
							<div class='controls'>
								<input type='text' name='no_telp'  placeholder='Masukkan Nomor Telepon Anda' required>
							</div>
						</div>
						<div class='control-group'>
							<label class='control-label'>Provinsi <sup>*</sup></label>
							<div class='controls'>
								<select class='input-block-level mod-width-fit-content' name='provinsi' required>
									{$htmls['option_provinsi']}
								</select>
							</div>
						</div>

						<div class='control-group'>
							<label class='control-label'>Kota/Kabupaten <sup>*</sup></label>
							<div class='controls'>
								<select class='input-block-level mod-width-fit-content' name='kota' required>
									{$htmls['option_kota']}
								</select>
							</div>
						</div>
						
						<div class='control-group'>
							<label class='control-label' for='inputFname'>Kode Pos <sup>*</sup></label>
							<div class='controls'>
								<input type='text' class='input-block-level mod-width-fit-content input-number-only'  name='kode_pos'  placeholder='Kode Pos' required>
							</div>
						</div>		 
						<div class='control-group'>
							<label class='control-label' for='inputFname'>Alamat <sup>*</sup></label>
							<div class='controls'>
								<textarea class='input-block-level' name='address'   required placeholder='Masukkan Alamat Anda'></textarea>
							</div>
						</div>
						<div class='control-group'>
							<div class='controls'>
								<input type='submit' name='submitAccount' value='Checkout dengan Alamat Baru' class='exclusive shopBtn'>
							</div>
						</div>
					</form>
				</div>
			";
		}
		/* end halaman ganti alamat */

		/* start halaman ganti alamat */
		if ( $_GET['checkout-new-alamat'] ) {
			$sid = session_id();
			$member=mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_SESSION[kustomer_id]'");
			$m=mysql_fetch_assoc($member);
			$address=$m['address'];
			$edit = mysql_query("SELECT SUM(berat) AS weight FROM orders_temp a left join produk b on a.id_produk=b.id_produk
			left join ukuran c on a.id_ukuran=c.id_ukuran 
			WHERE id_session='$sid'");
			$w    = mysql_fetch_assoc($edit);
			$totalberat=$w['weight'];
			$berat_gram=$totalberat*1000;
		
			# load rajaongkir api
			require_once('rajaongkir/rajaOngkir.php');
		
			$jasaPengiriman = [];
			foreach (Rajaongkir::cost_all(['destination'=> $_POST['kota'],'weight'=> $berat_gram]) as $key => $value) {
				$value['valueText'] = format_rupiah($value['value']);
				$jasaPengiriman[] = "
					<tr>
						<td style='text-align:left;'>
							<input required type='radio' name='radio' value='{$value['value']}'> {$value['code']} {$value['service']} Rp. {$value['valueText']} {$value['etd']}
						</td>
					</tr>
				";
			}
			$jasaPengiriman = implode('',$jasaPengiriman);
			$jasaPengiriman = "
				<thead style='background-color:green;color:white;'>
					<tr>
						<th style='text-align:left'>Pilih Jasa Pengiriman</th>
					</tr>
				</thead>
				<tbody>
					{$jasaPengiriman}
				</tbody>
			";
		
			$kota = RajaOngkir::city($_POST['provinsi'],$_POST['kota']);
			echo "
				<h3> Form Checkout</h3>	
				<hr class='soft'/>
				<div class='well'>
					<form action=simpan-transaksi.html method=POST class='form-horizontal'>
						<h3>Alamat Pengiriman <a href='ganti-alamat-pengiriman-1.html' class='btn btn-inverse btn-mini pull-right'>Kirim ke alamat lain</a></h3>
						<div id='alamatPengiriman' style='padding: 1rem;border: 1px solid #ddd;'>
							<b>{$_POST['nama']}</b><br>
							{$_POST['no_telp']} ({$_POST['email']})<br>
							{$_POST['address']}, {$kota->type} {$kota->city_name}, {$kota->province} {$m['kode_pos']}
						</div>
							
						<div class='col-md-8'>
							<div class='card my-4'>
								<div class='card-body'>
									<div id='loading'><img src='img/ajax-loader.gif'></div>
									<p id='kurirname' style='font-weight:700;text-transform:uppercase;color:green;'></p>
									<table id='details' class='table table-bordered table-responsive'></table>
									<table id='ongkos' class='table table-bordered table-responsive'>
										{$jasaPengiriman}
									</table>
									<div id='ongkir'></div>
								</div>
							</div>
						</div>
						
						<div class='control-group'>
							<div class='controlsXXX'>
								<input type='submit' name='submitAccount' value='Proses' class='exclusive shopBtn'>
							</div>
						</div>
					</form>
				</div>
			";
		}
		/* end halaman ganti alamat */
	}
	// echo '<pre>';
	// print_r($_REQUEST);
	// echo '</pre>';
}
elseif ($_GET['module']=='simpantransaksi'){
	if (empty($_SESSION['namalengkap']) AND empty($_SESSION['passuser'])){
		echo "<script>window.alert('Anda belum Login, Silahkan Login Terlebih dahulu');
			window.location=('index.php')</script>";
	}
	else {
		$data = [];
		$data['sessionID'] 		= session_id();
		$data['post'] 			= $_POST;
		$data['post']['kurir'] 	= json_decode($data['post']['kurir']); 
		$data['sqlKustomer'] 	= "SELECT * FROM kustomer WHERE id_kustomer='{$_SESSION['kustomer_id']}'";
		$data['queryKustomer'] 	= mysql_query($data['sqlKustomer']);
		$data['rowKustomer']	= mysql_fetch_assoc($data['queryKustomer']);

		$data['sqlCekOrders']   = "SELECT * FROM orders WHERE id_orders='{$data['post']['id_orders']}' ";
		$data['queryCekorders']	= mysql_query($data['sqlCekOrders']);
		$data['numCekorders']	= mysql_num_rows($data['queryCekorders']);
		
		if ( $data['numCekorders'] < 1 ) { # jika orders temp sudah disimpan pada table order dan orders detail
			$data['sqlOrdersTemp']	= "SELECT * FROM orders_temp LEFT JOIN produk ON orders_temp.id_produk=produk.id_produk WHERE 1 AND orders_temp.id_session='{$data['sessionID']}'";
			$data['queryOrdersTemp']= mysql_query($data['sqlOrdersTemp']);
			while ( $value = mysql_fetch_assoc($data['queryOrdersTemp']) ) {
				$data['insertOrdersDetail'][] 	= ("INSERT INTO `orders_detail`(`id_orders`, `id_produk`, `jumlah`) VALUES ('{$data['post']['id_orders']}','{$value['id_produk']}','{$value['jumlah']}')");
				$data['updateProduk'][] 		= ("UPDATE `produk` SET `stok`=(produk.stok-{$value['jumlah']}),dibeli=(produk.dibeli+{$value['jumlah']}) WHERE 1 AND produk.id_produk={$value['id_produk']} ");
			}
			$data['tanggalOrders'] 		= date('Y-m-d');
			$data['jamOrders']	 		= date('h:i:s');
			$data['insertOrders']		= ("INSERT INTO `orders`(`id_orders`, `id_kustomer`, `alamat`, `status_order`, `tgl_order`, `jam_order`,  `kurir`, `ongkir`) VALUES ('{$data['post']['id_orders']}','{$data['rowKustomer']['id_kustomer']}','{$data['post']['alamat']}','UNPAID','{$data['tanggalOrders']}','{$data['jamOrders']}','{$data['post']['kurir']->valueText}','{$data['post']['kurir']->value}')");
			$data['deleteOrdersTemp'] 	= ("DELETE FROM `orders_temp` WHERE `id_session`='{$data['sessionID']}' ");
			
		}

		// $data['sqlOrdersDetail'] 	= "SELECT * FROM `orders_detail` LEFT JOIN produk ON produk.id_produk=orders_detail.id_produk WHERE 1 AND orders_detail.id_orders='{$data['sessionID']}' ";
		// $data['queryOrdersDetail']	= mysql_query($data['sqlOrdersDetail']);
		// $no = 1;
		// $data['totalberat']	= 0;
		// $data['totalharga']	= 0;
		// $data['grandtotal']	= 0;
		// while ($value = mysql_fetch_assoc($data['queryOrdersDetail'])) {
		// 	$data['totalberat'] += ($value['jumlah']*$value['berat']);
		// 	$data['totalharga'] += ($value['jumlah']*$value['harga']);
		// 	$value['subtotal'] = ($value['jumlah']*$value['harga']);
		// 	$value['hargaText'] = format_rupiah($value['harga']);
		// 	$value['subtotalText'] = format_rupiah($value['subtotal']);
		// 	$data['trBodyOrdersDetail'][] = "
		// 		<tr>
		// 			<td>{$no}</td>
		// 			<td>{$value['nama_produk']}</td>
		// 			<td>{$value['jumlah']}</td>
		// 			<td>{$value['berat']}</td>
		// 			<td>Rp. {$value['hargaText']}</td>
		// 			<td>Rp. {$value['subtotalText']}</td>
		// 		</tr>
		// 	";
		// 	$no++;
		// }
		// $data['grandtotal'] += ($data['totalharga']+$data['post']['kurir']->value);
		// $data['totalhargaText'] = format_rupiah($data['totalharga']);
		// $data['grandtotalText'] = format_rupiah($data['grandtotal']);
		// $data['trBodyOrdersDetail'] = implode('',$data['trBodyOrdersDetail']);

		// $data['sqlOrders'] = "SELECT * FROM orders WHERE id_orders='{$data['sessionID']}' ";
		// $data['queryOrders'] = mysql_query($data['sqlOrders']);
		// $data['rowOrders']  = mysql_fetch_assoc($data['queryOrders']);
		// if ( empty($data['rowOrders']['invoice_url']) ) {
		// 	include_once("XenditPHPClient.php");
		// 	define('SECRET_API_KEY', 'xnd_development_jvolJ4f9VT9Y1KNheUMY1XZm8xQ5J7pki8VpllUEb0XXEiiRKxly09RoW4U6ILo');
		
		// 	$options['secret_api_key'] = constant('SECRET_API_KEY');
		// 	$xenditPHPClient = new XenditClient\XenditPHPClient($options);
			
		// 	$data['external_id'] = $data['sessionID'];
		// 	$data['amount'] 	 = $data['grandtotal'];
		// 	$data['payer_email'] = $data['post']['payer_email'];
		// 	$data['description'] = "Pembayaran dengan No Order {$data['sessionID']}";
		// 	$response = $xenditPHPClient->createInvoice($data['external_id'], $data['amount'], $data['payer_email'], $data['description']);
		// 	$data['updateOrders'] = ("UPDATE `orders` SET `external_id`='{$response['id']}',`invoice_url`='{$response['invoice_url']}' WHERE 1 AND id_orders='{$data['sessionID']}' ");
		// 	$data['rowOrders']['external_id'] = $response['id'];
		// 	$data['rowOrders']['invoice_url'] = $response['invoice_url'];
		// }
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		die();

		$htmls = "
			<div class='well well-small'>
				<h1>Data Order Anda <small class='pull-right'> </small></h1>
				<hr class='soften'/>
				<table style='border:1px solid #ddd;width:100%'>
					<thead>
						<tr>
							<td style='padding:0px 15px'><b>Alamat Pengiriman :</b><br></td>
							<td style='padding:0px 15px'><b>Kurir :</b><br></td>
						</tr>
					</thead
					<tbody>
						<tr>
							<td style='padding:0px 15px'>{$data['post']['alamat']}</td>
							<td style='padding:0px 15px'>
								{$data['post']['kurir']->valueText}<br>
							</td>
						</tr>
					</tbody>
				</table>
				<hr class='soften'/>
				<table class='table table-bordered table-condensed'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
							<th>Berat</th>
							<th>Harga</th>
							<th>Sub Total</th>
						</tr>
						<tbody>
							{$data['trBodyOrdersDetail']}
							<tr>
								<td colspan='5' align='right'>Total Harga </td>
								<td align='right'><b>Rp. {$data['totalhargaText']}</b></td></tr>      
							<tr>
							<tr>
								<td colspan='5' align='right'>Total Berat </td>
								<td align='right'><b>{$data['totalberat']}</b> Kg</td></tr>      
							<tr>
								<td colspan='5' align='right'>Ongkos Kirim</td>
								<td align=right><b>Rp. ".format_rupiah($data['post']['kurir']->value)."</b></td></tr>
							<tr>
								<td colspan='5' align='right'>Grand Total</td>
								<td align=right><b>Rp. {$data['grandtotalText']}</b></td></tr>
						</tbody>
					</thead>
				</table>
				<a target='_blank' class='btn btn-block btn-inverse' href='{$data['rowOrders']['invoice_url']}'>Proses Bayar</a>
			</div>
		";
		echo $htmls;
	}
		/* 
		die();
// $hasil = mysql_query($sql);
// $r = mysql_fetch_assoc($hasil);

// fungsi untuk mendapatkan isi keranjang belanja
function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_assoc($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}
$sesid = session_id();
$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");
 $jumlah_order = mysql_fetch_assoc(mysql_query("select count(*) as total from orders WHERE tgl_order='" . date("Y-m-d") . "'"));
 $allitem = mysql_fetch_assoc(mysql_query("SELECT * FROM orders_temp,produk "
            . "WHERE orders_temp.id_produk=produk.id_produk "
            . "AND id_session='$sesid'"));
            $rekap = "Pembelian di Toko Mak Nohan ";
$rekaps = array();
            $totalquantity = 0;
            foreach ($allitem as $_it) {
                $rekaps[] = $_it["nama_produk"] . " (" . $_it[jumlah] . ")";
                $totalquantity = $totalquantity + $_it[jumlah];
            }
            $rekap .= implode(", ", $rekaps);
// simpan data pemesanan
$ongkos= $_POST['ongkos'] ; 
$ongkir= str_replace(".", "", $ongkos);
mysql_query("INSERT INTO orders(id_kustomer,alamat, tgl_order, jam_order,jenis_pembayaran,kurir,paket,ongkir) 
             VALUES('$_SESSION[kustomer_id]','$_POST[alamat]','$tgl_skrg','$jam_skrg','$_POST[jenis_pembayaran]','$_POST[kurir]','$_POST[radio]','$ongkir')");
  
// mendapatkan nomor orders
$id_orders=mysql_insert_id();

// panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);

// simpan data detail pemesanan  
for ($i = 0; $i < $jml; $i++){
mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah,id_ukuran) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']},{$isikeranjang[$i]['id_ukuran']})");

	mysql_query("UPDATE produk 
		        SET stok = stok - {$isikeranjang[$i]['jumlah']}
				WHERE id_produk={$isikeranjang[$i]['id_produk']}");		   
	}
  

// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}


echo"							
<div class='span9'>
<div class='well well-small'>
		<h1>Data Order Anda <small class='pull-right'>  </small></h1>
	<hr class='soften'/>
	<table>
     <tr><td>Nama Lengkap   </td><td> : <b>$r[nama]</b> </td></tr>
      <tr><td>Alamat Pengiriman </td><td> : $_POST[alamat] </td></tr>
      <tr><td>Telpon         </td><td> : $r[no_telp] </td></tr>
      <tr><td>E-mail         </td><td> : $r[email] </td></tr>
	  <tr><td>Jenis Pembayaran         </td><td> : $_POST[jenis_pembayaran] </td></tr>
	  <tr><td>Kurir      </td><td>: $_POST[kurir]</td></tr>
		 <tr><td>Paket Kurir</td>        <td> : $_POST[radio]</td></tr>
		 </table><hr /><br />
      
      Nomor Order: <b>$id_orders</b><br /><br />";
	  $daftarproduk=mysql_query("SELECT * FROM orders_detail a left join produk b on a.id_produk=b.id_produk
		left join ukuran c on a.id_ukuran=c.id_ukuran WHERE id_orders='$id_orders'");	
	  
	echo"  
	
	<table class='table table-bordered table-condensed'>
              <thead>
                <tr>
									<th>No</th>
									<th>Nama Produk</th>
									<!--<th>Ukuran</th>-->
									<th>Jumlah</th>
									<th>Berat</th>
									<th>Harga</th>
									<th>Sub Total</th>
				</tr>
              </thead>";
	$pesan="Terimakasih telah melakukan pemesanan online di sinarabadibatik.online <br /><br />  
        Nama: $r[nama] <br />
        Alamat: $r[alamat] <br/>
        Telpon: $r[no_telp] <br /><hr />
        
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
			  $no=1;
while ($d=mysql_fetch_assoc($daftarproduk)){
   $subtotalberat = $d['berat'] * $d['jumlah']; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

   $harga1 = $d['harga'];
   $subtotal    = $harga1 * $d['jumlah'];
   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($harga1);
	echo"
              <tbody>
                <tr>
                  <td>$no</td>
									<td>$d[nama_produk]</td>
									<!--td>$d[kode_ukuran]</td>-->
									<td>$d[jumlah]</td>
									<td>$d[berat] Kg</td>
									<td>Rp. $harga</td>
									<td>Rp. $subtotal_rp</td>
                </tr>";
				
				$pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
				$no++; 
						}
						
$norek = mysql_query("SELECT * FROM norek LIMIT 1");
    $z    = mysql_fetch_assoc($norek);
	
$edit=mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_SESSION[kustomer_id]'");
$x=mysql_fetch_assoc($edit);
$email=$x['email'];
$kota=$x['id_kota'];

$ongkos=mysql_fetch_assoc(mysql_query("SELECT ongkir FROM orders WHERE id_orders='$id_orders'"));
$ongkoskirim1=$ongkos[ongkir];
$ongkoskirim = $ongkoskirim1 * $totalberat;

$grandtotal    = $total + $ongkoskirim; 

$ongkoskirim_rp = format_rupiah($ongkoskirim);
$ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
$grandtotal_rp  = format_rupiah($grandtotal);
$pesan.="<br /><br />Total : Rp. $total_rp 
         <br />Ongkos Kirim untuk Tujuan Kota Anda : Rp. $ongkoskirim1_rp/Kg 
         <br />Total Berat : $totalberat Kg
         <br />Total Ongkos Kirim  : Rp. $ongkoskirim_rp		 
         <br />Grand Total : Rp. $grandtotal_rp 
         <br /><br />Silahkan lakukan pembayaran ke $z[bank] sebanyak Grand Total yang tercantum, 
         nomor rekeningnya <b>$z[nomor]</b> a.n. $z[atas_nama]";
$subjek="Pemesanan Online Toko Mak Nohan";
// Kirim email dalam format HTML
$dari = "From: redaksi@tokomaknohan.online \n";
$dari .= "Content-type: text/html \r\n";

// Kirim email ke kustomer
mail($x['email'],$subjek,$pesan,$dari);

// Kirim email ke pengelola toko online
mail("tokomaknohan@gmail.com",$subjek,$pesan,$dari);
echo"				
				 <tr>
                  <td colspan='5' class='alignR'>Total:	</td>
                  <td> Rp. $total_rp</td>
                </tr>
				<tr>
                  <td colspan='5' class='alignR'>Ongkos Kirim untuk Tujuan Kota Anda:	</td>
                  <td > Rp. $ongkoskirim1_rp/Kg</td>
                </tr>
				<tr>
                  <td colspan='5' class='alignR'>Total Berat:	</td>
                  <td > $totalberat Kg</td>
                </tr>
				<tr>
                  <td colspan='5' class='alignR'>Total Ongkos Kirim:	</td>
                  <td > Rp. $ongkoskirim_rp</td>
                </tr>
				<tr>
                  <td colspan='5' class='alignR'>Grand Total:	</td>
                  <td class='label label-primary'> Rp. $grandtotal_rp</td>
                </tr>
				</tbody>
            </table><br/>";
			 if ($_POST["jenis_pembayaran"] == "FASAPAY") {
			 echo"<p>Silahkan lanjutkan proses pembayaran melalui Akun Fasapay Anda dengan mengklik tombol di bawah ini, untuk melihat setatus pengiriman silakan pilih halaman <a href='data-transaksi.html'><b>riwayat order</b></a></p><br />
			 <form id='form1' name='form1' target='_blank' method='post' action='https://sci.fasapay.co.id/'>
	<input type='hidden' name='fp_acc' value='FP618486'>
    <input type='hidden' name='fp_acc_from' value='' />
    <input type='hidden' name='fp_store' value='Toko Maknohan | Pusat Oleh-Oleh Khas Dieng'>
    <input type='hidden' name='fp_item' value='Pembelian Produk Di Toko Oleh-Oleh Maknohan'>
    <input type='hidden' name='fp_amnt' value='$grandtotal'>
    <input type='hidden' name='fp_currency' value='IDR'>
    <input type='hidden' name='fp_comments' value='Pembayaran No Order $id_orders menggunakan store variable'>
    <input type='hidden' name='fp_merchant_ref' value='BL000001' />
    <input type='hidden' name='fp_success_url' value='http://www.tokomaknohan.online/gentur/index.php' />
	<input type='hidden' name='fp_success_method' value='POST' />
	<input type='hidden' name='fp_fail_url' value='http://www.tokomaknohan.online/gentur/index.php' />
	<input type='hidden' name='fp_fail_method' value='GET' />
    <!-- baggage fields -->
    <input type='hidden' name='track_id' value='558421222'>
    <input type='hidden' name='order_id' value='BJ2993800'>
  <input name='' type='submit' value='Bayar Dengan Fasapay' />
</form>";
			 }
			 else {
			 echo"
	<p>Silahkan lakukan pembayaran ke BRI sebanyak Grand Total yang tercantum, 
         nomor rekeningnya <b>0867564-9876-876</b> a.n. Gentur Aji <br />
               Apabila Anda tidak melakukan pembayaran dalam 1 hari, maka data order Anda akan terhapus (transaksi batal), untuk melihat status pengiriman silakan pilih <a href='data-transaksi.html'><b>riwayat order</b></a></p><br />";
			   }
			   echo"

	</div>
							</div>";
	} */

}
elseif ($_GET['module']=='datatransaksi'){
	session_start();

	echo"
	<h3> Riwayat Data Order Anda</h3>	
	<hr class='soft'/>
	<div class='well'>
	<form action=edit_profil.php method=POST class='form-horizontal'>
	<input type=hidden name=id value='$r[id_kustomer]'>

	<table class='table table-bordered table-condensed'>

	<thead>
	<tr bgcolor=#D3DCE3><th>No.order</th><th>Tgl. order</th><th>Jam</th><th>Status</th><th>Aksi</th></tr>
	<tbody>";
	$tampil = mysql_query("SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer AND orders.id_kustomer='$_SESSION[kustomer_id]' ORDER BY id_orders DESC ");

	while($r=mysql_fetch_assoc($tampil)){
	$tanggal=tgl_indo($r['tgl_order']);

	echo "<tr><td align=center>$r[id_orders]</td>
	<td>$tanggal</td>
	<td>$r[jam_order]</td>
	<td>$r[status_order]</td>
	<td><a href=media2.php?module=detailtransaksi&id=$r[id_orders]>Detail</a></td></tr>";
	$no++;
	}
	echo "</tbody></table>

	</div>";

}
elseif ($_GET['module']=='detailtransaksi'){
session_start();
$edit = mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id]'");
    $r    = mysql_fetch_assoc($edit);
    $status=$r['status_order'];
    $metode=$r['jenis_pembayaran'];
    $id_orders=$r['id_orders'];
    $tanggal=tgl_indo($r['tgl_order']);
	$customer=mysql_query("select * from kustomer where id_kustomer='$r[id_kustomer]'");
  $c=mysql_fetch_assoc($customer);
	$data = [];
	if ( $r['status_order']=='UNPAID' ) {
		$data['statusOrderDinamis'][] = "
			<tr>
				<td>Status Pembayaran</td>
				<td>{$r['status_order']} <a class='badge btn btn-inverse btn-mini' href='{$r['invoice_url']}' target='_blank'>Bayar Sekarang</a></td>
			</tr>
		";
	} elseif ( $r['status_order']=='PAID' ) {
		include_once("XenditPHPClient.php");

		$options['secret_api_key'] = 'xnd_development_jvolJ4f9VT9Y1KNheUMY1XZm8xQ5J7pki8VpllUEb0XXEiiRKxly09RoW4U6ILo';
	  
		$xenditPHPClient = new XenditClient\XenditPHPClient($options);
	  
		$invoice_id = $r['external_id'];
	  
		// $response = $xenditPHPClient->getInvoice($invoice_id);
		echo '<pre>';
		print_r($xenditPHPClient);
		// print_r($response['payment_channel']);
		echo '</pre>';
		// die();
		// $newDate = date("d F Y & H:i:s", strtotime($response['paid_at']));

		// $data['statusOrderDinamis'][] = "
		// 	<tr>
		// 		<td>Status Pembayaran</td>
		// 		<td>{$r['status_order']}</td>
		// 	</tr>
		// 	<tr>
		// 		<td>Metode Pembayaran</td>
		// 		<td>: {$response['payment_method']}</td>
		// 	</tr>
		// 	<tr>
		// 		<td>Kode Bank</td>
		// 		<td>: {$response['bank_code']}</td>
		// 	</tr>
		// 	<tr>
		// 		<td>Tanggal Pembayaran</td>
		// 		<td>: {$newDate}</td>
		// 	</tr>
		// ";
		$data['statusOrderDinamis'][] = "
			<tr>
				<td>Status Order</td>
				<td>: {$r['status_order']}</td>
			</tr>
		";
	} else {
		$data['statusOrderDinamis'][] = "
			<tr>
				<td>Status Order</td>
				<td>: {$r['status_order']}</td>
			</tr>
		";
	}
	$data['statusOrderDinamis'] = implode('',$data['statusOrderDinamis']);

echo"				
	<h3> Riwayat Data Order Anda</h3>	
	<hr class='soft'/>
	<div class='well'>
		<table id='example1' class='table table-bordered table-striped'>
			<tr>
				<td>No. Order</td>
				<td> : $r[id_orders]</td></tr>
			<tr>
				<td>Tgl. & Jam Order</td>
				<td> : $tanggal & $r[jam_order]</td>
			</tr>
			{$data['statusOrderDinamis']}
			<tr class='hidden'>
				<td>Metode Pembayaran      </td>
				<td>: $r[jenis_pembayaran]</td>
			</tr>
			<tr>
				<td>Alamat Pengiriman</td>        
				<td> : $r[alamat]</td>
			</tr>
			<tr>
				<td>Kurir      </td>
				<td>: $r[kurir]</td>
			</tr>
		</table>";
		
		// tampilkan rincian produk yang di order
		$sql2=mysql_query("SELECT * FROM orders_detail a left join produk b on a.id_produk=b.id_produk
		left join ukuran c on a.id_ukuran=c.id_ukuran WHERE id_orders='$_GET[id]'");

		echo "<table class='table table-bordered table-condensed'>

		<tr><td>Nama Produk</td><!--<td>Ukuran</td>--><td>Berat(kg)</td><td>Jumlah</td><td>Harga Satuan</td><td>Sub Total</td></tr>";
  
  while($s=mysql_fetch_assoc($sql2)){
  $subtotalberat = $s[berat] * $s[jumlah]; // total berat per item produk 
   $totalberat  = $totalberat + $subtotalberat; // grand total berat all produk yang dibeli

    $harga1 = $s[harga];
	
   
   $subtotal    = $harga1 * $s[jumlah];
   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($harga1);

    echo "<tr><td>$s[nama_produk]</td><!--<td>$s[kode_ukuran]</td>--><td align=center>$s[berat]</td><td align=center>$s[jumlah]</td><td>Rp. $harga</td><td>Rp. $subtotal_rp</td></tr>";
  }


  $ongkoskirim1=$r[ongkir];
  $ongkoskirim=$ongkoskirim1 * $totalberat;

  $grandtotal    = $total + $ongkoskirim; 

  $ongkoskirim_rp = format_rupiah($ongkoskirim);
  $ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
  $grandtotal_rp  = format_rupiah($grandtotal); 
    

echo "<tr><td colspan=4 align=right>Total              Rp. : </td><td align=right><b>$total_rp</b></td></tr>
      <tr><td colspan=4 align=right>Ongkos Kirim       Rp. : </td><td align=right><b>$ongkoskirim1_rp</b>/Kg</td></tr>      
      <tr><td colspan=4 align=right>Total Berat            : </td><td align=right><b>$totalberat</b> Kg</td></tr>      
      <tr><td colspan=4 align=right>Total Ongkos Kirim Rp. : </td><td align=right><b>$ongkoskirim_rp</b></td></tr>      
      <tr><td colspan=4 align=right>Grand Total        Rp. : </td><td align=right><b>$grandtotal_rp</b></td></tr>
      </table>";
      if ($metode == "FASAPAY" AND $status=='Belum-Dibayar') {
			 echo"<p>Silahkan lanjutkan proses pembayaran melalui Akun Fasapay Anda dengan mengklik tombol di bawah ini.<br />
			 <form id='form1' name='form1' target='_blank' method='post' action='https://sci.fasapay.co.id/'>
				<input type='hidden' name='fp_acc' value='FP669896'>
				<input type='hidden' name='fp_acc_from' value='' />
				<input type='hidden' name='fp_store' value='Toko Mak Nohan | Pusat Oleh-Oleh Khas Dieng'>
				<input type='hidden' name='fp_item' value='Pembelian Produk Toko Mak Nohan'>
				<input type='hidden' name='fp_amnt' value='$grandtotal'>
				<input type='hidden' name='fp_currency' value='IDR'>
				<input type='hidden' name='fp_comments' value='Pembayaran No Order $id_orders menggunakan store variable'>
				<input type='hidden' name='fp_merchant_ref' value='BL000001' />
				<input type='hidden' name='fp_success_url' value='index.php' />
				<input type='hidden' name='fp_success_method' value='POST' />
				<input type='hidden' name='fp_fail_url' value='index.php' />
				<input type='hidden' name='fp_fail_method' value='GET' />
				<!-- baggage fields -->
				<input type='hidden' name='track_id' value='558421222'>
				<input type='hidden' name='order_id' value='BJ2993800'>
				<input name='' type='button' value='Bayar Dengan Fasapay' />
			</form>";
			 }
      
      if ($status=='Belum-Dibayar'){
          echo"
		<center><img src='belum-dibayar.jpg'></center>";
      }
      elseif ($status=='Sudah-Dibayar'){
          echo"
		<center><img src='sudah-dibayar.jpg'></center>";
      }
      elseif ($status=='Sudah-Dikirim'){
          echo"
		<center><img src='sudah-dikirim.jpg'></center>";
      }
      echo"
</div>
";

}
elseif ($_GET['module']=='hasilcari'){
echo"

	<h3>Hasil Pencarian </h3>
		
		  <ul class='thumbnails'>";
		  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM produk WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "deskripsi LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%' OR harga LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_produk DESC LIMIT 4";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
    echo "<p align=center>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </p>"; 
    while($r=mysql_fetch_assoc($hasil)){
	$harga1 = $r[harga];
    $harga     = number_format($harga1,0,",",".");
//		echo "<table><tr><td><span class=judul><a href=produk-$t[id_produk]-$t[produk_seo].html>$t[nama_produk]</a></span><br />";
      // Tampilkan hanya sebagian isi produk
      $isi_produk = htmlentities(strip_tags($r['deskripsi'])); // mengabaikan tag html
      $isi = substr($isi_produk,0,235); // ambil sebanyak 250 karakter
      $isi = substr($isi_produk,0,strrpos($isi," ")); // potong per spasi kalimat
    
	echo"
			<li class='span3'>
			  <div class='thumbnail'>
				<a href='product_details.html' class='overlay'></a>
				<a class='zoomTool' href='produk-$r[id_produk]-$r[produk_seo].html' title='add to cart'><span class='icon-search'></span> DETAIL</a>
				<a href='produk-$r[id_produk]-$r[produk_seo].html'><img src='foto_produk/medium_$r[gambar]' alt=''></a>
				<div class='caption cntr'>
					<p>$r[nama_produk]</p>
					<p><strong> Rp. $harga</strong></p>
					<h4><a class='shopBtn' href='aksi.php?module=keranjang&act=tambah&id=$r[id_produk]' title='add to cart'> Pesan </a></h4>
					
					<br class='clr'>
				</div>
			  </div>
			</li>";
			} echo"
		  </ul>";
		  }
		  else{
    echo "<p align=center>Tidak ditemukan produk dengan kata <b>$kata</b></p>";
  }
  
}
elseif ($_GET['module']=='hubungikami'){
$detail=mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='3'");
	$d   = mysql_fetch_assoc($detail);
echo"							
<div class='span9'>
<h2>$d[judul]</h2>
<p>$d[isi_halaman]</p>
<br>
<p>Silahkan Isi Form Dibawah ini untuk menghubungi kami secara online</p>
<h4>Email Us</h4>
		<form action=hubungi-aksi.html method=POST class='form-horizontal'>
        <fieldset>
          <div class='control-group'>
           
              <input type='text' name='nama' placeholder='nama' class='input-xlarge'/ required>
           
          </div>
		   <div class='control-group'>
           
              <input type='email' name='email' placeholder='email' class='input-xlarge'/ required>
           
          </div>
		   <div class='control-group'>
           
              <input type='text' name='subjek' placeholder='subjek' class='input-xlarge'/ required>
          
          </div>
          <div class='control-group'>
              <textarea rows='3' name='pesan' id='textarea' class='input-xlarge'></textarea>
           
          </div>

            <button class='shopBtn' type='submit'>Kirim</button>

        </fieldset>
      </form>
							</div>";

}
elseif ($_GET['module']=='hubungiaksi'){
mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
echo"							
<div class='span9'>
<h2>Hubungi Kami</h2>

<p><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>

							</div>";

}
elseif ($_GET['module']=='konfirmasipembayaran'){
echo"							
<div class='span9'>
<h3>Konfirmasi Pembayaran</h3>	
	<hr class='soft'/>
	<div class='well'>
	<form action=konfirmasi-aksi.html method=POST enctype='multipart/form-data' class='form-horizontal'>
		<h3>Form Konfirmasi Pembayaran</h3>
		
		<div class='control-group'>
			<label class='control-label' for='inputFname'>Id Orders <sup>*</sup></label>
			<div class='controls'>
			  <select name='id_orders'  required>
      <option value='' selected>- -Pilih ID Orders- -</option>";
      $tampil=mysql_query("SELECT * FROM orders WHERE status_order='Belum-Dibayar' AND id_kustomer='$_SESSION[kustomer_id]' ORDER BY id_orders");
      while($r=mysql_fetch_assoc($tampil)){
         echo "<option value=$r[id_orders]>$r[id_orders]</option>";
      }
  echo "</select>
			</div>
		 </div>
		 
		<div class='control-group'>
		<label class='control-label' for='inputEmail'>Nama Pemilik Rekening <sup>*</sup></label>
		<div class='controls'>
		  <input type='text' name='pemilik_rekening' placeholder='Masukkan Nama Pemilik Rekening' required>
		</div>
	  </div>	  
		<div class='control-group'>
		<label class='control-label'>Gambar <sup>*</sup></label>
		<div class='controls'>
		  <input type='file' name='fupload' id='exampleInputFile' required>
		</div>
	  </div>
	  	  
		<div class='control-group'>
		<label class='control-label'></label>
		<div class='controls'>
		  <p>* Pastikan File yang diupload berekstensi *JPG atau *JPEG.
		</div>
	  </div>
		
	<div class='control-group'>
		<div class='controls'>
		 <input type='submit' name='submitAccount' value='Proses' class='exclusive shopBtn'>
		</div>
	</div>
	</form>
</div>
							</div>";

}
elseif ($_GET['module']=='konfirmasiaksi'){
$tgl_skrg = date("Y-m-d");
$jam_skrg = date("H:i:s");
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];
UploadBayar($nama_file);
mysql_query("INSERT INTO konfirmasi(id_orders,
                                   pemilik_rekening,
                                   tanggal,
                                   jam,
                                   gambar) 
                        VALUES('$_POST[id_orders]',
                               '$_POST[pemilik_rekening]',
                               '$tgl_skrg',
                               '$jam_skrg',
                               '$nama_file')");
echo"							
<div class='span9'>
<h2>Konfirmasi Pembayaran</h2>

<p><b>Terimakasih telah melakukan Konfirmasi Pembayaran. <br /> Kami akan segera meresponnya.</b></p>

							</div>";

}
?>