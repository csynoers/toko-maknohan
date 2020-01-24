<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
    $aksi="modul/mod_order/aksi_order.php";
    switch($_GET['act']){
            // Tampil Order
        default:
            // $kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
            // // Update untuk menambah stok 
            // mysql_query("UPDATE produk,orders_detail,orders SET produk.stok=produk.stok+orders_detail.jumlah 
            // WHERE produk.id_produk=orders_detail.id_produk 
            // AND orders.id_orders=orders_detail.id_orders
            // AND orders.tgl_order < '$kemarin' 
            // AND orders.status_order='Belum Dibayar'
            // ");
            // mysql_query("DELETE FROM orders 
            // WHERE status_order='Baru'
            // AND tgl_order < '$kemarin'");

            // $tampil = mysql_query("SELECT * FROM orders,kustomer WHERE orders.id_kustomer=kustomer.id_kustomer ORDER BY status_order ASC ");					
            // while($r=mysql_fetch_array($tampil)){
            //     $tanggal=tgl_indo($r[tgl_order]);

            //     echo "<tr><td align=center>$r[id_orders]</td>
            //     <td>$r[nama]</td>
            //     <td>$tanggal</td>
            //     <td>$r[jam_order]</td>
            //     <td>$r[status_order]</td>
            //     <td><a href=?module=order&act=detailorder&id=$r[id_orders] class='btn btn-warning'>Detail</a></td></tr>";
            //     $no++;
            // }

            $data = [];
            $data['info'] = "";
            if ( $_GET['status_pesanan'] ) {
                if ( $_GET['status_pesanan']=='SEMUA PESANAN' ) {
                    echo 'rows pesanan SEMUA PESANAN';
                }
                if ( $_GET['status_pesanan']=='BELUM BAYAR' ) {
                    $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 AND orders.status_transaksi='BELUM BAYAR' ORDER BY orders.tgl_order DESC";
                    $data['query'] = mysql_query($data['sql']);
                    while ($value=mysql_fetch_assoc($data['query'])) {
                        $value['tgl_order'] = tgl_indo($value['tgl_order']);
                        $data['rows'][] = "
                            <tr>
                                <td>{$value['id_orders']}</td>
                                <td>{$value['nama']}</td>
                                <td>{$value['tgl_order']}</td>
                                <td>{$value['status_order']}</td>
                                <td>{$value['status_transaksi']}</td>
                                <td>
                                    <a href='?module=order&act=detailorder&id={$value['id_orders']}' class='btn btn-warning'>Detail</a>
                                </td>
                            </tr>
                        ";
                    }
                    $data['rows'] = implode('',$data['rows']);
                }
                if ( $_GET['status_pesanan']=='SEDANG DIPROSES' ) {
                    $data['info'] = "
                        <div class='panel-body' style='border:1px solid #ddd'>
                            # Jika status pembayaran <b>PAID</b>, harap melakukan pengemasan dan pengiriman paket kepada jasa pengiriman yang sudah dipilih pembeli untuk mendapatkan <b>NO RESI</b>.<br>
                            # setelah mendapatkan <b>No RESI</b> harap melakukan <b>INPUT RESI</b> di FORM berikut ini: <br>
                            <form action='?module=order&act=inputresi' method='post'>
                                <div class='input-group' style='margin-bottom:4px'>
                                    <span class='input-group-addon'>No order</span>
                                    <input type='text' class='form-control' name='id_orders' placeholder='Masukan no order disini...' required>
                                </div>
                                <div class='input-group'>
                                    <span class='input-group-addon'>No Resi</span>
                                    <input type='text' class='form-control' name='no_resi' placeholder='Masukan no resi disini...' required>
                                </div>
                                <button type='submit' class='btn btn-default' style='margin-top:4px'>Simpan</button>
                            </form>
                        </div>
                        <hr>
                    ";
                    $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 AND orders.status_transaksi='SEDANG DIPROSES' ORDER BY orders.tgl_order DESC";
                    $data['query'] = mysql_query($data['sql']);
                    while ($value=mysql_fetch_assoc($data['query'])) {
                        $value['tgl_order'] = tgl_indo($value['tgl_order']);
                        $data['rows'][] = "
                            <tr>
                                <td>{$value['id_orders']}</td>
                                <td>{$value['nama']}</td>
                                <td>{$value['tgl_order']}</td>
                                <td>{$value['status_order']}</td>
                                <td>{$value['status_transaksi']}</td>
                                <td>
                                    <a href='?module=order&act=detailorder&id={$value['id_orders']}' class='btn btn-warning'>Detail</a>
                                </td>
                            </tr>
                        ";
                    }
                    $data['rows'] = implode('',$data['rows']);
                }
                if ( $_GET['status_pesanan']=='SEDANG DIKIRIM' ) {
                    $data['info'] = "
                        <div class='panel panel-default' style='margin-top:20px'>
                            <div class='panel-body'>
                                Untuk melacak pesanan silahkan lakukan seperti langkah berikut ini:<br>
                                1. copy nomor resi pada kolom Status Pesanan No Resi dibawah ini.<br>
                                2. klik jasa pengiriman sesuai dengan kolom Kurir.<br>
                                <a href='https://www.posindonesia.co.id/id/tracking' class='badge btn btn-sm' target='_blank'>Lacak POS</a>
                                <a href='https://www.tiki.id/id/tracking' class='badge btn btn-sm' target='_blank'>Lacak TIKI</a>
                                <a href='https://cekresi.com/' class='badge btn btn-sm' target='_blank'>Lacak JNE</a><br>
                                3. jika pesanan sudah sampai mohon untuk konfirmasi dengan cara memilih menu Pesanan Diterima pada kolom aksi di bawah ini.
                            </div>
                        </div>
                        <hr>
                    ";
                    $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 AND orders.status_transaksi='SEDANG DIKIRIM' ORDER BY orders.tgl_order DESC";
                    $data['query'] = mysql_query($data['sql']);
                    while ($value=mysql_fetch_assoc($data['query'])) {
                        $value['tgl_order'] = tgl_indo($value['tgl_order']);
                        $data['rows'][] = "
                            <tr>
                                <td>{$value['id_orders']}</td>
                                <td>{$value['nama']}</td>
                                <td>{$value['tgl_order']}</td>
                                <td>{$value['status_order']}</td>
                                <td>{$value['status_transaksi']} dengan No Resi : {$value['no_resi']}</td>
                                <td>
                                    <a href='?module=order&act=konfirmasi&id={$value['id_orders']}' class='btn btn-warning'>Pesanan Diterima</a>
                                </td>
                            </tr>
                        ";
                    }
                    $data['rows'] = implode('',$data['rows']);
                }
                if ( $_GET['status_pesanan']=='PESANAN SELESAI' ) {
                    $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 AND orders.status_transaksi='PESANAN SELESAI' ORDER BY orders.tgl_order DESC";
                    $data['query'] = mysql_query($data['sql']);
                    while ($value=mysql_fetch_assoc($data['query'])) {
                        $value['tgl_order'] = tgl_indo($value['tgl_order']);
                        $data['rows'][] = "
                            <tr>
                                <td>{$value['id_orders']}</td>
                                <td>{$value['nama']}</td>
                                <td>{$value['tgl_order']}</td>
                                <td>{$value['status_order']}</td>
                                <td>{$value['status_transaksi']} dengan No Resi : {$value['no_resi']}</td>
                                <td>
                                    <a href='?module=order&act=detailorder&id={$value['id_orders']}' class='btn btn-warning'>Detail</a>
                                </td>
                            </tr>
                        ";
                    }
                    $data['rows'] = implode('',$data['rows']);
                }
                if ( $_GET['status_pesanan']=='PESANAN DIBATALKAN' ) {
                    $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 AND orders.status_transaksi='PESANAN DIBATALKAN' ORDER BY orders.tgl_order DESC";
                    $data['query'] = mysql_query($data['sql']);
                    while ($value=mysql_fetch_assoc($data['query'])) {
                        $value['tgl_order'] = tgl_indo($value['tgl_order']);
                        $data['rows'][] = "
                            <tr>
                                <td>{$value['id_orders']}</td>
                                <td>{$value['nama']}</td>
                                <td>{$value['tgl_order']}</td>
                                <td>{$value['status_order']}</td>
                                <td>{$value['status_transaksi']}</td>
                                <td>
                                    <a href='?module=order&act=detailorder&id={$value['id_orders']}' class='btn btn-warning'>Detail</a>
                                </td>
                            </tr>
                        ";
                    }
                    $data['rows'] = implode('',$data['rows']);
                }
            } else {
                $data['sql'] = "SELECT * FROM orders LEFT JOIN kustomer ON orders.id_kustomer=kustomer.id_kustomer WHERE 1 ORDER BY orders.tgl_order DESC";
                $data['query'] = mysql_query($data['sql']);
                while ($value=mysql_fetch_assoc($data['query'])) {
                    $value['tgl_order'] = tgl_indo($value['tgl_order']);
                    $data['rows'][] = "
                        <tr>
                            <td>{$value['id_orders']}</td>
                            <td>{$value['nama']}</td>
                            <td>{$value['tgl_order']}</td>
                            <td>{$value['status_order']}</td>
                            <td>{$value['status_transaksi']}</td>
                            <td>
                                <a href='?module=order&act=detailorder&id={$value['id_orders']}' class='btn btn-warning'>Detail</a>
                            </td>
                        </tr>
                    ";
                }
                $data['rows'] = implode('',$data['rows']); 
            }

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';

            echo "
                <div class='col-xs-12'>
                    <div class='box'>
                        <div class='box-header'>
                            <h3 class='box-title'><b>Order</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class='box-body'>
                            <hr>
                            <form action='' method='GET'>
                                <input type='hidden' name='module' value='order'>
                                <div class='input-group'>
                                    <span class='input-group-addon' id='basic-addon3'>Filter Status Pesanan</span>
                                    <select name='status_pesanan' class='form-control' onchange='this.form.submit()'>
                                        <option value='SEMUA PESANAN'> SEMUA PESANAN </option>
                                        <option value='BELUM BAYAR'>BELUM BAYAR</option>
                                        <option value='SEDANG DIPROSES'>SEDANG DIPROSES</option>
                                        <option value='SEDANG DIKIRIM'>SEDANG DIKIRIM</option>
                                        <option value='PESANAN SELESAI'>PESANAN SELESAI</option>
                                        <option value='PESANAN DIBATALKAN'>PESANAN DIBATALKAN</option>
                                    </select>
                                </div>
                            </form>
                            <hr>
                            {$data['info']}
                            <table id='example1' class='table table-bordered table-striped'> 
                                <thead>
                                    <tr>
                                        <th>no.order</th>
                                        <th>nama konsumen</th>
                                        <th>tgl. order</th>
                                        <th>status pembayaran</th>
                                        <th>status pesanan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {$data['rows']}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            ";

        
        break;
        
        
    case "inputresi":
            $update = mysql_query("UPDATE orders SET status_transaksi='SEDANG DIKIRIM',no_resi='{$_POST['no_resi']}' where id_orders='{$_POST['id_orders']}'");
            if ( $update ) {
                $alert = "<script>window.alert('No Resi berhasil disimpan');window.location=('media.php?module=order&status_pesanan=SEDANG_DIKIRIM')</script>";
            } else {
                $alert = "<script>window.alert('No Resi gagal disimpan, pastikan id order sudah benar');window.history.go(-1)</script>";
            }
            echo $alert;
        break;

    case "konfirmasi":
            $data 								= [];
            $data['id_orders'] 					= $_GET['id'];
            $data['query_update_tabel_orders'] 	= "UPDATE `orders` SET `status_transaksi`='PESANAN SELESAI' WHERE id_orders='{$data['id_orders']}' ";
            $data['exec_update_tabel_orders'] 	= mysql_query($data['query_update_tabel_orders']);
    
            if ( $data['exec_update_tabel_orders'] ) { # update berhasil
                $alert = "<script>window.alert('pesanan berhasil diselesaikan');window.location=('media.php?module=order&status_pesanan=PESANAN+SELESAI')</script>";
            } else { # update gagal
                $alert = "<script>window.alert('pesanan gagal diselesaikan ');window.history.go(-1)</script>";
            }
            echo $alert;
        break;

    case "detailorder":
        $data       = [];
        $data['queryOrder'] = mysql_query("SELECT * FROM orders WHERE id_orders='{$_GET['id']}' ");
        $data['rowOrder']   = mysql_fetch_assoc($data['queryOrder']);
        print_r($data);
        die();
        $tanggal    = tgl_indo($r['tgl_order']);
        
        $trMod= "";
        if ( $r['status']== 'PAID' ) {
            include_once("../XenditPHPClient.php");
        
            $options['secret_api_key'] = 'xnd_development_jvolJ4f9VT9Y1KNheUMY1XZm8xQ5J7pki8VpllUEb0XXEiiRKxly09RoW4U6ILo';
            
            $xenditPHPClient = new XenditClient\XenditPHPClient($options);
            
            $invoice_id = $r['external_id'];
            
            $response = $xenditPHPClient->getInvoice($invoice_id);
            //   echo '<pre>';
            //   print_r($response);
            //   echo '</pre>';
            $newDate = date("d F Y & H:i:s", strtotime($response['paid_at']));
            $trMod .= "
                <b>Metode Pembayaran : </b> {$response['payment_method']}<br>
                <b>Kode Bank : </b> {$response['bank_code']}<br>
                <b>Tanggal Pembayaran : </b> {$newDate}<br>
            ";
        }
        
        // tampilkan rincian produk yang di order
        $data['rows_order_detail_html'] = [];
        $sql    = mysql_query("SELECT * FROM orders_detail,produk WHERE orders_detail.id_produk=produk.id_produk AND id_orders='$_GET[id]'");
        while( $s= mysql_fetch_array($sql) ){

            $data['rows_order_detail_html'][] = "
                <tr>
                    <td>{$s['nama_produk']}</td>
                    <td>{$s['berat']}</td>
                    <td>{$s['jumlah']}</td>
                    <td>Rp. ".format_rupiah($s['harga'])."</td>
                    <td>Rp. ".format_rupiah($s['harga']*$s['jumlah'])."</td>
                </tr>
            ";
        }

        $data['rows_order_detail_html'] = implode('',$data['rows_order_detail_html']);

    echo"
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>DETAIL ORDERS</h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>
                <!-- info row -->
                <div class='row invoice-info'>
                    <div class='col-sm-4 invoice-col'>
                        Kepada :
                        <address>
                            {$r['alamat']}
                        </address>
                    </div>
                    <!-- /.col -->

                    <form method=POST action=$aksi?module=order&act=update>
                        <input type=hidden name=id value=$r[id_orders]>
                        <div class='col-sm-4 invoice-col'>
                            <b>Invoice</b><br><br>
                            <b>Order ID : </b> {$r['id_orders']}<br>
                            <b>Tgl. orders : </b> {$tanggal}<br>
                            <b>Kurir : </b> {$r['kurir']}<br>
                            {$trMod}
                        </div>
                        <!-- /.col -->
                    </form>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class='row'>
                    <div class='col-xs-12 table-responsive'>
                        <table class='table table-striped'>
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Berat(Kg)</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>{$data['rows_order_detail_html']}</tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class='row no-print'>
                    <div class='col-xs-12'>
                        <a href=modul/mod_order/cetak.php?id={$r['id_orders']} target='_blank' class='btn btn-primary pull-right'><i class='fa fa-print'></i> Print</a><br>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>    
    ";
    break;  
}
}
?>
