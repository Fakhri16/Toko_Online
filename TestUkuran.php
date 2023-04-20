<?php

use Model\Ukuran;

use Repository\UkuranRepositoryImpl;
use function Helper\getConnection;

require_once(__DIR__."/Helper/getConnection.php");
require_once(__DIR__."/Model/Ukuran.php");
require_once(__DIR__."/Repository/UkuranRepository.php");


$connection = getConnection();

$repository = new UkuranRepositoryImpl($connection);

// insert
// $ukuran = new Ukuran("U005","XXLL");
// $sukses = $repository->insert($ukuran);

// if($sukses){
//   echo "Berhasil Menambah data";
// } else {
//   echo "Gagal";
// }

//findById
// $kategoriById = $repository->findById("U001");
// var_dump($kategoriById);

// //findAll
// $data = $repository->findAll();
// var_dump($data);

// delete
// $ukuran = $repository->delete("U005");
// if($ukuran){
//   echo "Berhasil Menghapus Data";
// } else{
//   echo "Gagal Menghapus Data";
// }

// Update
// $ukuran = new Ukuran("U005","XXL");
// $sukses = $repository->update("U005",$ukuran);
// if($sukses){
//   echo "Sukses mengupdate";
// } else {
//   echo "Gagal update";
// }

// findNotId 
// $data = $repository->findNotId("U001");
// var_dump($data);


$connection = null;


?>