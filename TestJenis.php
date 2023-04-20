<?php 



use Model\Jenis;
use Repository\JenisRepositoryImpl;
use function Helper\getConnection;

require_once(__DIR__."/Helper/getConnection.php");
require_once(__DIR__."/Model/Jenis.php");
require_once(__DIR__."/Repository/JenisRepository.php");


$connection = getConnection();

$repository = new JenisRepositoryImpl($connection);

$jenis = new Jenis("J003","Salah");

//insert
// $sukses = $repository->insert($jenis);
// if($sukses){
//   echo "Sukses manambah data";
// } else {
//   echo "Gagal menamabah data";
// }

// findById()
// $jenisById = $repository->findById($jenis->getId());
// var_dump($jenisById);


// findNotId
// $jenisNotId = $repository->findNotId($jenis->getId());
// var_dump($jenis)

// findAll
// $data = $repository->findAll();
// var_dump($data);

// upadate
// $jenisUpdate = new Jenis("J003","Remaja");
// $update = $repository->update($jenisUpdate->getId(),$jenisUpdate);
// if($update){
//   echo "Berhasil update data";
// } else {
//   echo "Gagal update data";
// }

// delete
// $sukses = $repository->delete($jenis->getId());
// if($sukses){
//   echo "Data berhasil di hapus";
// } else {
//   echo "Data gagal di hapus";
// }

?>