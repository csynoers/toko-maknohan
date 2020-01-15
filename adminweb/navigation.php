<?php

    echo "
        <li class='".($_GET['module']=='home'? 'bg-blue-active' : NULL)."'>
        <a href='media.php?module=home'>
        <i class='fa fa-th'></i> <span>Home</span>
        </a>
        </li>

        <li class='".($_GET['module']=='admin'? 'bg-blue-active' : NULL)."'>
        <a href='media.php?module=admin'>
        <i class='fa fa-users'></i> <span>Admin</span>
        </a>
        </li>

        <li class='treeview ".($_GET['module']=='kategori'||$_GET['module']=='produk'||$_GET['module']=='ukuran'||$_GET['module']=='slide'||$_GET['module']=='halamanstatis'? 'active' : NULL)."'>
        <a href='#'>
        <i class='fa fa-dashboard'></i> <span>Master Data</span> <i class='fa fa-angle-left pull-right'></i>
        </a>
        <ul class='treeview-menu'>
        <li><a class='".($_GET['module']=='kategori'? 'bg-blue-active' : NULL)."' href='media.php?module=kategori'><i class='fa fa-circle-o'></i> Kategori</a></li>
        <li><a class='".($_GET['module']=='produk'? 'bg-blue-active' : NULL)."' href='media.php?module=produk'><i class='fa fa-circle-o'></i> Produk</a></li>
        <li class='hidden'><a class='".($_GET['module']=='ukuran'? 'bg-blue-active' : NULL)."' href='media.php?module=ukuran'><i class='fa fa-circle-o'></i> Ukuran</a></li>
        <li><a class='".($_GET['module']=='slide'? 'bg-blue-active' : NULL)."' href='media.php?module=slide'><i class='fa fa-circle-o'></i> Slide</a></li>
        <li><a href='media.php?module=halamanstatis' class='".($_GET['module']=='halamanstatis'? 'bg-blue-active' : NULL)."'><i class='fa fa-circle-o'></i> Halaman Statis</a></li>

        </ul>
        </li> 
        <li class='treeview ".($_GET['module']=='kustomer'||$_GET['module']=='order'||$_GET['module']=='konfirmasi'? 'active' : NULL)."'>
        <a href='#'>
        <i class='fa fa-laptop'></i> <span>Manajemen Transaksi</span> <i class='fa fa-angle-left pull-right'></i>
        </a>
        <ul class='treeview-menu'>
        <li><a href='media.php?module=kustomer' class='".($_GET['module']=='kustomer'? 'bg-blue-active' : NULL)."'><i class='fa fa-circle-o'></i> Kustomer</a></li>
        <li><a href='media.php?module=order' class='".($_GET['module']=='order'? 'bg-blue-active' : NULL)."'><i class='fa fa-circle-o'></i> Data Orders</a></li>
        <!--<li><a href='media.php?module=konfirmasi' class='".($_GET['module']=='konfirmasi'? 'bg-blue-active' : NULL)."'><i class='fa fa-circle-o'></i> Konfirmasi Pembayaran</a></li>-->
        </ul>
        </li>
        <li class='".($_GET['module']=='laporan'? 'bg-blue-active' : NULL)."'>
        <a href='media.php?module=laporan'>
        <i class='fa fa-book'></i> <span>Laporan</span>

        </a>
        </li>
    ";

?>