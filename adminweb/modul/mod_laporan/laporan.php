<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
		  
		  echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Laporan</b></h3>
            </div>
			
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'> 
			<form method=POST action='modul/mod_laporan/pdf_toko.php' target='_blank'>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Proses</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </form></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
		echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Laporan Persediaan Barang</b></h3>
            </div>
			
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'> 
			<form method=POST action='modul/mod_laporan/pdf_stok.php' target='_blank'>
          
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Proses</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </form></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
  



?>
