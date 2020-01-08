<?php
	include "../config/koneksi.php";
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";
   include "../config/fungsi_rupiah.php";
// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin' ){
 $cek=mysql_query("SELECT * FROM orders WHERE status_order='Belum Dibayar'");
$ketemu=mysql_num_rows($cek);
$cek2=mysql_query("SELECT * FROM produk WHERE stok='0'");
$ketemu2=mysql_num_rows($cek2);
  echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'>Selamat Datang</h3>
			  <br>
			  <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di Halaman Administrator.<br> 
          Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. </p>
		  
		  <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
            echo"</div>
            <!-- /.box-header -->
            <div class='box-body'>
            
<div class='col-lg-3 col-xs-6'>
          <!-- small box -->
          <div class='small-box bg-aqua'>
            <div class='inner'>
              <h3>$ketemu2</h3>

              <p>Data Stok Produk Habis</p>
            </div>
            <div class='icon'>
              <i class='ion ion-bag'></i>
            </div>
            <a href='media.php?module=produk' class='small-box-footer'>Detail <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>
        <!-- ./col -->
		
        <div class='col-lg-3 col-xs-6'>
          <!-- small box -->
          <div class='small-box bg-green'>
            <div class='inner'>
              <h3>$ketemu</h3>

              <p>Data Orders Baru</p>
            </div>
            <div class='icon'>
              <i class='ion ion-stats-bars'></i>
            </div>
            <a href='media.php?module=order' class='small-box-footer'>Detail <i class='fa fa-arrow-circle-right'></i></a>
          </div>
        </div>
        <!-- ./col -->

			<h3 class='box-title'>Grafik Penjualan</h3>
			  <br>
			  <div id='container'></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";


          
  }
  }

// Bagian User
elseif ($_GET['module']=='konfirmasi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_konfirmasi/konfirmasi.php";
  }
}
// Bagian User
elseif ($_GET['module']=='produk'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_produk/produk.php";
  }
}
// Bagian User
elseif ($_GET['module']=='slide'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_slide/slide.php";
  }
}
// Bagian Tahun
elseif ($_GET['module']=='norek'){
  if ($_SESSION['leveluser']=='admin' ){
    include "modul/mod_norek/norek.php";
  }
}
// Bagian User
elseif ($_GET['module']=='admin'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_admin/admin.php";
  }
}

// Bagian Modul
elseif ($_GET['module']=='kota'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kota/kota.php";
  }
}
// Bagian Modul
elseif ($_GET['module']=='kustomer'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kustomer/kustomer.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='laporan'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_laporan/laporan.php";
  }
}


// Bagian Tahun
elseif ($_GET['module']=='order'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_order/order.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}


// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}
// Bagian User
elseif ($_GET['module']=='ukuran'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_ukuran/ukuran.php";
  }
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
