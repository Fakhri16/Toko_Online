<?php

use Model\Kategori;

use Repository\KategoriRepositoryImpl;
use function Helper\getConnection;

require_once(__DIR__."/Helper/getConnection.php");
require_once(__DIR__."/Model/Kategori.php");
require_once(__DIR__."/Repository/KategoriRepository.php");


$connection = getConnection();

$repository = new KategoriRepositoryImpl($connection);

// insert
// $kategori = new Kategori("P003","Hoodie Pria");
// $sukses = $repository->insert($kategori);

// if($sukses){
//   echo "Berhasil Menambah data";
// } else {
//   echo "Gagal";
// }

//findById
// $kategoriById = $repository->findById("P001");
// var_dump($kategoriById);

//findAll
// $data = $repository->findAll();
// var_dump($data);

// delete
// $kategori = $repository->delete("P001");
// if($kategori){
//   echo "Berhasil Menghapus Data";
// } else{
//   echo "Gagal Menghapus Data";
// }

// Update
// $kategori = new Kategori("P001","Baju Wanita");
// $sukses = $repository->update("P001",$kategori);
// if($sukses){
//   echo "Sukses mengupdate";
// } else {
//   echo "Gagal update";
// }

// findNotId 
// $data = $repository->findNotId("P003");
// var_dump($data);


$connection = null;


?>