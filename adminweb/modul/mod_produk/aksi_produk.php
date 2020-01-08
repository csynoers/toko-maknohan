<?php
// error_reporting(0);
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

    // Hapus produk
    if ($module=='produk' AND $act=='hapus'){
        $data= mysql_fetch_assoc(mysql_query("SELECT gambar FROM produk WHERE id_produk='$_GET[id]'"));

        if ( $data['gambar'] ){
            unlink("../../../foto_produk/{$data['gambar']}");   
            unlink("../../../foto_produk/big_{$data['gambar']}");   
            unlink("../../../foto_produk/medium_{$data['gambar']}");   
            unlink("../../../foto_produk/small_{$data['gambar']}");   
        }
        mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
        header('location:../../media.php?module='.$module);
    }

// Input produk
elseif ($module=='produk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);

    mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
                                    stok,
                                    deskripsi,
                                    tgl_masuk,
                                    gambar) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',
                                   '$_POST[harga]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik')");
								   $id=mysql_insert_id();
		$ukuran=$_POST['ukuran'];
		if(!empty($ukuran)){
			foreach($ukuran as $val){
				$qry_insert=mysql_query("insert into produk_ukuran (id_produk,id_ukuran) values('$id','$val')");
			}
		}
  }
  else{
    mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
                                    stok,
                                    deskripsi,
                                    tgl_masuk) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                    '$_POST[berat]',                               
                                   '$_POST[harga]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang')");
								   $id=mysql_insert_id();
		$ukuran=$_POST['ukuran'];
		if(!empty($ukuran)){
			foreach($ukuran as $val){
				$qry_insert=mysql_query("insert into produk_ukuran (id_produk,id_ukuran) values('$id','$val')");
			}
		}
  }
  header('location:../../media.php?module='.$module);
}

// Update produk
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $produk_seo      = seo_title($_POST[nama_produk]);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                  berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
                                   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]'
                             WHERE id_produk   = '$_POST[id]'");
		//hapus
		
		$qry_ukuran=mysql_query("delete from produk_ukuran where id_produk='$_POST[id]'");
		$ukuran=$_POST['ukuran'];
		if(!empty($ukuran)){
			foreach($ukuran as $val){
				$qry_insert=mysql_query("insert into produk_ukuran (id_produk,id_ukuran) values('$_POST[id]','$val')");
			}
		}					 
  }
  else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
                                   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]',
                                   gambar      = '$nama_file_unik'   
                             WHERE id_produk   = '$_POST[id]'");
		//hapus
		
		$qry_ukuran=mysql_query("delete from produk_ukuran where id_produk='$_POST[id]'");
		$ukuran=$_POST['ukuran'];
		if(!empty($ukuran)){
			foreach($ukuran as $val){
				$qry_insert=mysql_query("insert into produk_ukuran (id_produk,id_ukuran) values('$_POST[id]','$val')");
			}
		}					 
  }
  header('location:../../media.php?module='.$module);
}
?>
