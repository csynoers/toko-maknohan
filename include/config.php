<?php
/*//////////////////////////////////////////////////////////////////////

Description:	FasaPay Sample Store
Release Date:     Feb, 2011
File : Fasapay SCI Config File

Designed and Developed by FasaPay development team.
Copyright (c) 2011 FasaPay.
Website: http://www.fasapay.com
Contact email: support@fasapay.com

//////////////////////////////////////////////////////////////////////*/

//nomor akun FasaPay penjual
//ingat hanya Akun FasaPay berstatus STORE saja yang 
//di perbolehkan menggunakan SCI
$merchantAccountNumber = 'FP12345';

// variable-variable di bawah ini digunakan jika penjual sudah membuat
// toko di FasaPay (https://www.fasapay.com/store)

//nama toko 
// jika tidak ada Toko dengan nama ini atas nama merchant 
// maka variable ini akan di gunakan sebagai header pada halaman SCI
$merchantStoreName = 'FasaPayTestStore';

//kata kunci untuk validasi transaksi
$merchantSecurityWord = '';

