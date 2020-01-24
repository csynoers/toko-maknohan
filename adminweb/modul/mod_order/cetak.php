<?php
  // error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Toko Mak Nohan | Invoice</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bootstrap.min.css">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="AdminLTE.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
<body onload="window.print();">
<!-- <body> -->
<!-- <body > -->
<?php
    include "../../../config/koneksi.php";
    include "../../../config/fungsi_rupiah.php";
    include "../../../config/fungsi_indotgl.php";

    $data       = [];
    $data['queryOrder']     = mysql_query("SELECT * FROM orders WHERE id_orders='{$_GET['id']}' ");
    $data['rowOrder']       = mysql_fetch_assoc($data['queryOrder']);
    $data['orderAlamat']    = $data['rowOrder']['alamat'];
    $data['orderID']        = $data['rowOrder']['id_orders'];
    $data['orderTanggal']   = tgl_indo($data['rowOrder']['tgl_order']);
    $data['orderKurir']     = $data['rowOrder']['kurir'];
    $data['external_id']    = $data['rowOrder']['external_id'];
    
    $data['paymentHtml'] = "";
    if ( $data['rowOrder']['status_order']== 'PAID' ) {
        include_once("../../../XenditPHPClient.php");
    
        $options['secret_api_key'] = 'xnd_development_jvolJ4f9VT9Y1KNheUMY1XZm8xQ5J7pki8VpllUEb0XXEiiRKxly09RoW4U6ILo';
        $xenditPHPClient = new XenditClient\XenditPHPClient($options);
        $invoice_id = $data['external_id'];
        $data['payment'] = $xenditPHPClient->getInvoice($invoice_id);
        $newDate = date("d F Y & H:i:s", strtotime($data['payment']['paid_at']));
        $data['paymentHtmls'] .= "
            <b>Metode Pembayaran : </b> {$data['payment']['payment_method']}<br>
            <b>Kode Bank : </b> {$data['payment']['bank_code']}<br>
            <b>Tanggal Pembayaran : </b> {$newDate}<br>
        ";
    }
    
    // tampilkan rincian produk yang di order
    $data['rows_order_detail_html'] = [];
    $data['totalHarga']             = 0;
    $data['totalBerat']             = 0;
    $data['ongkosKirim']            = $data['rowOrder']['ongkir'];

    $sql    = mysql_query("SELECT * FROM orders_detail,produk WHERE orders_detail.id_produk=produk.id_produk AND id_orders='$_GET[id]'");
    while( $value= mysql_fetch_array($sql) ){
        $value['hargaText'] = format_rupiah($value['harga']);
        $value['subTotal'] = ($value['jumlah']*$value['harga']);
        $value['subTotalText'] = format_rupiah($value['subTotal']);

        $data['totalHarga'] += $value['subTotal']; 
        $data['totalBerat'] += ($value['jumlah']*$value['berat']); 
        $data['rows_order_detail_html'][] = "
            <tr>
                <td>{$value['nama_produk']}</td>
                <td>{$value['berat']}</td>
                <td>{$value['jumlah']}</td>
                <td>Rp. {$value['hargaText']}</td>
                <td>Rp. {$value['subTotalText']}</td>
            </tr>
        ";
    }
    $data['totalHargaText']     = format_rupiah($data['totalHarga']);
    $data['grandTotal']         = ($data['totalHarga']+$data['ongkosKirim']);
    $data['grandTotalText']     = format_rupiah($data['grandTotal']);
    $data['ongkosKirimText']    = format_rupiah($data['ongkosKirim']);

    $data['rows_order_detail_html'][] = "
        <tr>
            <td colspan='3'></td>
            <td><b>Total Harga</b></td>
            <td>Rp. {$data['totalHargaText']}</td>
        </tr>
        <tr>
            <td colspan='3'></td>
            <td><b>Total Berat</b></td>
            <td>{$data['totalBerat']} (Kg)</td>
        </tr>
        <tr>
            <td colspan='3'></td>
            <td><b>Ongkos Kirim</b></td>
            <td>Rp. {$data['ongkosKirimText']}</td>
        </tr>
        <tr>
            <td colspan='3'></td>
            <td><b>Grand Total</b></td>
            <td>Rp. {$data['grandTotalText']}</td>
        </tr>
    ";
    $data['rows_order_detail_html'] = implode('',$data['rows_order_detail_html']);

    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';

    echo"
        <div class='wrapper'>
            <!-- Main content -->
            <section class='invoice'>
                <!-- title row -->
                <div class='row'>
                    <div class='col-xs-12'>
                        <h2 class='page-header'>
                            <i class='fa fa-globe'></i> Toko Mak Nohan.
                            <small class='pull-right'>Tanggal: {$data['orderTanggal']}</small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <div class='row'>
                    <div class='col-xs-12 table-responsive'>
                        <table class='table'>
                            <tr>
                                <td class='col-xs-4'>
                                    Dari :
                                    <address>
                                        <strong>Toko Mak Nohan.</strong><br>
                                        Jl. Raya Kertek km 05 Sayangan Wonosobo<br>
                                        Phone: 0813 9015 7959 <br>
                                        Email: tokomaknohan@gmail.com
                                    </address>
                                </td>
                                <td class='col-xs-4'>
                                    Kepada :
                                    <address>
                                        {$data['orderAlamat']}
                                    </address>
                                </td>
                                <td class='col-xs-4'>
                                    <b>Invoice</b><br>
                                    <br>
                                    <b>Order ID : </b> {$data['orderID']}<br>
                                    <b>Tgl. Transaksi : </b> {$data['orderTanggal']}<br>
                                    <b>Kurir : </b> {$data['orderKurir']}<br>
                                    {$data['paymentHtmls']}
                                </td>
                            </tr>
                        </table>
                    </div>
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
            </section>
            <!-- /.box -->
        </div>    
    ";
?>
</body>
</html>
