<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  // Tampil Produk
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Produk</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah Produk' onclick=\"window.location.href='?module=produk&act=tambahproduk';\">
							<p>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>
	<thead>
          <tr><th>no</th><th>nama produk</th><th>harga</th><th>stok</th><th>Gambar</th><th>aksi</th></tr>
		  <tbody>";

    $tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC ");
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                
                <td>Rp. $harga</td>
                <td align=center>$r[stok]</td>
                <td><img src='../foto_produk/small_$r[gambar]'></td>
		            <td><a href=?module=produk&act=editproduk&id=$r[id_produk] class='btn btn-warning'>Edit</a> | 
		                <a href=$aksi?module=produk&act=hapus&id=$r[id_produk]&namafile=$r[gambar] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";

    
 
    break;
  
  case "tambahproduk":
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Form Tambah Produk</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
			
			<form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
			<div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputPassword1'>Nama Produk</label>
                  <input type='text' name='nama_produk' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Nama Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Kategori</label>
                  <select class='form-control' name='kategori' required>
            <option value='' selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Ukuran</label><br>
                  ";
		  $tampil=mysql_query("SELECT * FROM ukuran ORDER BY kode_ukuran");
            while($r=mysql_fetch_array($tampil)){
			echo"<input type='checkbox' name='ukuran[]' value=$r[id_ukuran]>$r[kode_ukuran] &nbsp;";
			}
		  echo"
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Berat</label>
                  <input type='text' name='berat' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Berat Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Harga</label>
                  <input type='number' name='harga' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Harga Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Stok</label>
                  <input type='number' name='stok' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Stok Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Deskripsi</label>
                  <textarea id='editor1' name='deskripsi' rows='20' cols='80'>
                                            Isikan Deskripsi Produk Disini.
                    </textarea>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Gambar</label>
                  <input type='file' name='fupload' id='exampleInputFile'>
                  <p class='help-block'>Pastikan File yang diupload berekstensi *JPG atau *JPEG.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Simpan</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
			</form>
			
			
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
     break;
    
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

	echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Form Edit Produk</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
			
			<form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
            <input type=hidden name=id value=$r[id_produk]>
			<div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputPassword1'>Nama Produk</label>
                  <input type='text' name='nama_produk' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Nama Produk' value='$r[nama_produk]' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Kategori</label>
                  <select class='form-control' name='kategori' required>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Ukuran</label><br>
                  ";
		 $sql_ukuran="select * from produk_ukuran where id_produk='$_GET[id]'";
			$qry_ukuran=mysql_query($sql_ukuran);
			while($hasil_ukuran=mysql_fetch_array($qry_ukuran)){
				$arr_ukuran[]=$hasil_ukuran['id_ukuran'];
			}
            $tampil=mysql_query("SELECT * FROM ukuran ORDER BY kode_ukuran");
            while($w=mysql_fetch_array($tampil)){
				if (in_array($w['id_ukuran'],$arr_ukuran)){
              $cek='checked';
            }
            else{
              $cek='';
            }
			echo"<div class='checkbox'>
                    <label>
                      <input type='checkbox' $cek name='ukuran[]' value='$w[id_ukuran]'>  $w[kode_ukuran] &nbsp;
                    </label>
                  </div>";
			
              
            } echo"
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Berat</label>
                  <input type='text' name='berat' class='form-control' id='exampleInputPassword1' value=$r[berat] placeholder='Masukkan Berat Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Harga</label>
                  <input type='number' name='harga' class='form-control' id='exampleInputPassword1' value=$r[harga] placeholder='Masukkan Harga Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Stok</label>
                  <input type='number' name='stok' class='form-control' id='exampleInputPassword1' value=$r[stok] placeholder='Masukkan Stok Produk' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Deskripsi</label>
                  <textarea id='editor1' name='deskripsi' rows='20' cols='80'>
                                            $r[deskripsi]
                    </textarea>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Gambar</label>
                  <p class='help-block'><img src='../foto_produk/small_$r[gambar]'></p>
                </div>
				<div class='form-group'>
                  <label for='exampleInputFile'>Ganti Gambar</label>
                  <input type='file' name='fupload' id='exampleInputFile'>
                  <p class='help-block'>Pastikan File yang diupload berekstensi *JPG atau *JPEG.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Update</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
			</form>
			
			
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    
    break;  
}
}
?>
