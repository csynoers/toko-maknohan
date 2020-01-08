<?php
$aksi="modul/mod_kota/aksi_kota.php";
switch($_GET[act]){
  // Tampil kota
  default:
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Data Ongkir</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah' onclick=\"window.location.href='?module=kota&act=tambahkota';\">
							<p>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>
	<thead>
          <tr><th>no</th><th>nama kota</th><th>ongkos kirim</th><th>aksi</th></tr>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM kota ORDER BY id_kota DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama_kota]</td>
			 <td>$r[ongkos_kirim]</td>
             <td><a href=?module=kota&act=editkota&id=$r[id_kota] class='btn btn-warning'>Edit</a> | 
	               <a href=$aksi?module=kota&act=hapus&id=$r[id_kota] class='btn btn-danger' onClick=\"return confirm('Apakah Anda Yakin Untuk Menghapus Data Ini ?')\">Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
  
  // Form Tambah kota
  case "tambahkota":
    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Tambah Ongkir</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
          <form method=POST action='$aksi?module=kota&act=input'>
          <table id='example1' class='table table-bordered table-striped'>
          <tr><td>Nama kota</td><td>  <input class='form-control' type=text name='nama_kota'></td></tr>
		  <tr><td>Ongkos Kirim</td><td>  <input class='form-control' type=number name='ongkos_kirim'></td></tr>
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Simpan</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
     break;
  
  // Form Edit kota  
  case "editkota":
    $edit=mysql_query("SELECT * FROM kota WHERE id_kota='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>Edit Ongkir</b></h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
          <form method=POST action=$aksi?module=kota&act=update>
          <input type=hidden name=id value='$r[id_kota]'>
          <table id='example1' class='table table-bordered table-striped'>
          <tr><td>Nama kota</td><td> <input class='form-control' type=text name='nama_kota' value='$r[nama_kota]'></td></tr>
		  <tr><td>Ongkos Kirim</td><td>  <input class='form-control' type=number name='ongkos_kirim' value='$r[ongkos_kirim]'></td></tr>
          <tr><td colspan=2><button type='submit' class='btn btn-primary'>Update</button>
											<button onclick=self.history.back() class='btn btn-danger'>Batal</button></td></tr>
          </table></form></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;  
}
?>
