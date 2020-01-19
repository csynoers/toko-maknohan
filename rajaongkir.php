<?php
    require_once("rajaongkir/rajaOngkir.php");
    $data = [];
    $data['get'] = ! empty($_GET['get']) ? $_GET['get'] : NULL ;
    switch ($data['get']) {
        case 'kota':
            $data = Rajaongkir::city($_GET['id']);
            break;
        
        default:
            # code...
            break;
    }

    echo json_encode($data);