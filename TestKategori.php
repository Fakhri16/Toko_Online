<?php

use Model\Kategori;

use Repository\KategoriRepositoryImpl;
use function Helper\getConnection;

require_once(__DIR__."/Helper/getConnection.php");
require_once(__DIR__."/Model/Kategori.php");
require_once(__DIR__."/Repository/KategoriRepository.php");


$connection = getConnection();

$repository = new KategoriRepositoryImpl($connection);

$kategori = new Kategori("P001","Baju Pria");
$sukses = $repository->insert($kategori);

if($sukses){
  echo "Berhasil Menambah data";
} else {
  echo "Gagal";
}

$connection = null;


?>