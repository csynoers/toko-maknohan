<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_kustomer/aksi_kustomer.php";
switch($_GET[act]){
  // Tampil User
  default:
  echo"
  <div class='col-xs-12'>
        <div class='box'>
            <div class='box-header'>
              <h3 class='box-title'><b>kustomer</b></h3>
            </div>
			<input type=button class='btn btn-primary' value='Tambah kustomer' onclick=\"window.location.href='?module=kustomer&act=tambahkustomer';\">
							<p>
            <!-- /.box-header -->
            <div class='box-body'>
              <table id='example1' class='table table-bordered table-striped'>  
  <div class='panel-heading'>";  
    echo "
						
							
                                
								<thead>
          <tr><th>no</th><th>nama lengkap</th><th>email</th><th>No.Telp/HP</th><th>aksi</th></tr></thead>
	<thead>
	<tbody>"; 
	$tampil = mysql_query("SELECT * FROM kustomer ORDER BY id_kustomer");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[nama]</td>
		         <td><a href=mailto:$r[email]>$r[email]</a></td>
		         <td>$r[no_telp]</td>
             <td><a href=?module=kustomer&act=editkustomer&id=$r[id_kustomer] class='btn btn-warning'>Edit</a></td></tr>";
      $no++;
    }
    echo "</tbody></table></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>";
    break;
    
  case "editkustomer":
    $edit=mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo"
   	<div class='col-md-6'>  
		 <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Form Edit Kustomer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method=POST action=$aksi?module=kustomer&act=update>
            <input type=hidden name=id value='$r[id_kustomer]'>
              <div class='box-body'>
                <div class='form-group'>
                  <label for='exampleInputPassword1'>Password **)</label>
                  <input type='password' name='password' class='form-control' id='exampleInputPassword1' placeholder='Ganti Password'>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Nama</label>
                  <input type='text' name='nama_lengkap' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Nama Lengkap' value='$r[nama_lengkap]' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>Email</label>
                  <input type='email' name='email' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Email' value='$r[email]' required>
                </div>
				<div class='form-group'>
                  <label for='exampleInputPassword1'>No. Telp</label>
                  <input type='number' name='no_telp' class='form-control' id='exampleInputPassword1' placeholder='Masukkan Nomor Telepon' value='$r[no_telp]' required>
                </div>";
				if ($r[blokir]=='N'){
				echo"
                <div class='form-group'>
                  <label for='exampleInputPassword1'>Blokir</label><br>
                  <input type=radio name='blokir' value='Y'> Y  
                                            <input type=radio name='blokir' value='N' checked> N 
                </div>";
				}
				else {
				echo"
                <div class='form-group'>
                  <label for='exampleInputPassword1'>Blokir</label><br>
                  <input  type=radio name='blokir' value='Y' checked> Y 
                                         <input  type=radio name='blokir' value='N'> N
                </div>";
				}
				echo"
				
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
}
?>
