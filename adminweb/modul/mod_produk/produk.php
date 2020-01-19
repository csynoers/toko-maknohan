<?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch(empty($_GET['act']) ? NULL : $_GET['act']){
	default:
		$trBody = [];
		$tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC ");
		$no = 1;
		while($r=mysql_fetch_assoc($tampil)){
			$tanggal=tgl_indo($r['tgl_masuk']);
			$harga=format_rupiah($r['harga']);
			$trBody[] = "
				<tr>
					<td>{$no}</td>
					<td>{$r['nama_produk']}</td>
					<td>Rp. {$harga}</td>
					<td align=center>{$r['stok']}</td>
					<td><img src='../foto_produk/small_{$r['gambar']}'></td>
					<td>
						<a href='?module=produk&act=editproduk&id={$r['id_produk']}' class='btn btn-warning'>Edit</a> | 
						<a href='$aksi?module=produk&act=hapus&id={$r['id_produk']}&namafile={$r['gambar']}' class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>
					</td>
				</tr>
			"; 
			$no++;
		}
		$trBody = implode('',$trBody);

		echo "
			<div class='col-xs-12'>
				<div class='box'>
					<div class='box-header'>
						<h3 class='box-title'><b>Produk</b></h3>
					</div>
					<input type=button class='btn btn-primary' value='Tambah Produk' onclick=\"window.location.href='?module=produk&act=tambahproduk';\">
					<!-- /.box-header -->

					<div class='box-body'>
						<div class='panel-heading'>
							<table id='example1' class='table table-bordered table-striped'>  
								<thead>
									<tr>
										<th>no</th>
										<th>nama produk</th>
										<th>harga</th>
										<th>stok</th>
										<th>Gambar</th>
										<th>aksi</th>
									</tr>
								</thead>
								<tbody>
									{$trBody}
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		"; 
    break;
  
    case "tambahproduk":
        $kategoriProduk = [];
        $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
        while($r=mysql_fetch_assoc($tampil)){
            $kategoriProduk[]= "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
        }
        $kategoriProduk = implode('',$kategoriProduk);

        $ukuranProduk = [];
        $tampil=mysql_query("SELECT * FROM ukuran ORDER BY kode_ukuran");
        $no=1;
        while($r=mysql_fetch_assoc($tampil)){
            $ukuranProdukChecked = '';
            if ( $no==1 ) {
                $ukuranProdukChecked = 'checked';
            }
            $ukuranProduk[] = "<input type='checkbox' name='ukuran[]' checked value=$r[id_ukuran]>$r[kode_ukuran] &nbsp;";
            $no++;
        }
        $ukuranProduk = implode('',$ukuranProduk);

        echo "
            <div class='col-xs-12'>
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
									<label for='exampleInputPassword1'>Kategori <small><a href='media.php?module=kategori'>[+ Tambah kategori baru]</a></small></label>
									<select class='form-control' name='kategori' required>
										<option value='' selected>- Pilih Kategori -</option>
										{$kategoriProduk}
									</select>
								</div>
								<div class='form-group hidden'>
									<label for='exampleInputPassword1'>Ukuran <small><a href='media.php?module=ukuran'>[+ Tambah ukuran baru]</a></small></label><br>
									{$ukuranProduk}
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Berat(kg)</label>
									<input min='0.1' type='number' name='berat' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Berat Produk ex: 0.5' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Harga(hanya angka)</label>
									<input min='1' type='number' name='harga' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Harga Produk' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Stok(hanya angka)</label>
									<input min='1' type='number' name='stok' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Stok Produk' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Deskripsi</label>
									<textarea id='editor1' name='deskripsi' rows='20' colsx='80'>Isikan Deskripsi Produk Disini.</textarea>
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
            </div>
        ";
        break;
    
	case "editproduk":
		$edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
		$r    = mysql_fetch_assoc($edit);

		/* start kategori produk */
		$kategoriProduk = [];
		$tampil = mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
		if ($r['id_kategori']==0){
			$kategoriProduk[] = "<option value='0' selected>- Pilih Kategori -</option>";
		}   
		
		while($w=mysql_fetch_assoc($tampil)){
			if ($r['id_kategori']==$w['id_kategori']){
				$kategoriProduk[] = "<option value='{$w['id_kategori']}' selected>{$w['nama_kategori']}</option>";
			}
			else{
				$kategoriProduk[] = "<option value='{$w['id_kategori']}'>{$w['nama_kategori']}</option>";
			}
		}
		$kategoriProduk = implode('',$kategoriProduk);
		/* end kategori produk */

		/* start ukuran produk */
		$ukuranProduk = [];
		$arr_ukuran = [];
		$query = mysql_query("select * from produk_ukuran where id_produk='{$_GET['id']}'");
		while($hasil_ukuran = mysql_fetch_assoc($query)){
			$arr_ukuran[] = $hasil_ukuran['id_ukuran'];
		}

		$query = mysql_query("SELECT * FROM ukuran ORDER BY kode_ukuran");
		while($w=mysql_fetch_assoc($query)){
			if (in_array($w['id_ukuran'],$arr_ukuran)){
				$cek='checked';
			} else {
				$cek='';
			}
			$ukuranProduk[] = "
				<div class='checkbox'>
					<label>
						<input type='checkbox' {$cek} name='ukuran[]' value='{$w['id_ukuran']}'>  {$w['kode_ukuran']} &nbsp;
					</label>
				</div>
			";
		}
		$ukuranProduk = implode('',$ukuranProduk);
    
		echo "
			<div class='col-xs-12'>
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
									<label for='exampleInputPassword1'>Kategori <small><a href='media.php?module=kategori'>[+ Tambah kategori baru]</a></small></label>
									<select class='form-control' name='kategori' required>
										{$kategoriProduk}
									</select>
								</div>
								<div class='form-group hidden'>
									<label for='exampleInputPassword1'>Ukuran <small><a href='media.php?module=ukuran'>[+ Tambah ukuran baru]</a></small></label><br>
									{$ukuranProduk}
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Berat(kg)</label>
									<input min='0.1' type='number' name='berat' class='form-control' id='exampleInputPassword1' value=$r[berat] placeholder='Masukkan Berat Produk' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Harga(hanya angka)</label>
									<input min='1' type='number' name='harga' class='form-control' id='exampleInputPassword1' value=$r[harga] placeholder='Masukkan Harga Produk' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Stok(hanya angka)</label>
									<input min='1' type='number' name='stok' class='form-control' id='exampleInputPassword1' value=$r[stok] placeholder='Masukkan Stok Produk' required>
								</div>
								<div class='form-group'>
									<label for='exampleInputPassword1'>Deskripsi</label>
									<textarea id='editor1' name='deskripsi' rows='20' cols='80'>{$r['deskripsi']}</textarea>
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
				</div>
			</div>
		";
    
    break;  
}
}
?>
