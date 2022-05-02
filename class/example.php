<?php

include 'config.php';
// include 'barang.php';
include 'pemesanan.php';

// $barang = new barang($database);
$pemesanan = new pemesanan($database);

// Select
// $list = $barang->BarangList();
// $list = $barang->FindBarangById(137);
// $list = $barang->StokBarang();
// $list = $barang->BE();
// print_r($list);

// Insert
// $barang->setId_Barang(137);
// $barang->setNama_Barang('Barang - Emma');
// $insert = $barang->AddBarang();
// print_r($insert);

// Update
// $barang->setId_Barang(137);
// $barang->setNama_Barang('Barang - Emma Dua');
// $update = $barang->BarangUpdate();
// print_r($update);

// Delete
// $delete = $barang->BarangDelete(137);
// print_r($delete);

// Select
// $list = $pemesanan->PesananList();
// print_r($list);

// Insert
// $pemesanan->setId_Pesanan(100);
// $pemesanan->setNama_Pemesan('Pesanan - Emma');
// $pemesanan->setId_Barang(10);
// $pemesanan->setJumlah_Pesanan('100');
// $insert = $pemesanan->PesananTambah();
// print_r($insert);

// Update
$pemesanan->setId_Pesanan(100);
$pemesanan->setNama_Pemesan('Pesanan - Emma Dua');
$pemesanan->setId_Barang(10);
$pemesanan->setJumlah_Pesanan('1001');
$update = $pemesanan->PesananEditList();
print_r($update);