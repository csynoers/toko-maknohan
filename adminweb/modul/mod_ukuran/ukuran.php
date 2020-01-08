<?php
$aksi="modul/mod_ukuran/aksi_ukuran.php";
switch($_GET[act]){
  // Tampil ukuran
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Ukuran</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah ukuran' onclick=\"window.location.href='?module=ukuran&act=tambahukuran';\">
							<p>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>
	<thead>
          <tr><th>no</th><th>Kode ukuran</th><th>aksi</th></tr>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM ukuran ORDER BY id_ukuran DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[kode_ukuran]</td>
             <td><a href=?module=ukuran&act=editukuran&id=$r[id_ukuran] class='btn btn-warning'>Edit</a> | 
	               <a href=$aksi?module=ukuran&act=hapus&id=$r[id_ukuran] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
  
  // Form Tambah ukuran
  case "tambahukuran":
  echo"
   	<div class='col-md-6'>  
		 <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Tambah Ukuran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method=POST action='$aksi?module=ukuran&act=input'>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputEmail1'>Kode Ukuran</label>
                  <input type='text' class='form-control' name='kode_ukuran' id='exampleInputEmail1' placeholder='Masukkan Kode Ukuran' required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Simpan</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
            </form>
         </div>
	 </div>";
    
     break;
  
  // Form Edit ukuran  
  case "editukuran":
    $edit=mysql_query("SELECT * FROM ukuran WHERE id_ukuran='$_GET[id]'");
    $r=mysql_fetch_array($edit);

	echo"
   	<div class='col-md-6'>  
		 <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Edit Ukuran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method=POST action=$aksi?module=ukuran&act=update>
            <input type=hidden name=id value='$r[id_ukuran]'>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputEmail1'>Kode Ukuran</label>
                  <input type='text' class='form-control' name='kode_ukuran' id='exampleInputEmail1' placeholder='Masukkan Kode Ukuran' value='$r[kode_ukuran]' required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Update</button>
				<button onclick=self.history.back() class='btn btn-danger'>Batal</button>
              </div>
            </form>
         </div>
	 </div>";
    break;  
}
?>
