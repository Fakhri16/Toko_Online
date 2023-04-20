<?php

use Model\Admin;
use Model\Kategori;
use Repository\AdminRepositoryImpl;
use Repository\KategoriRepositoryImpl;
use function Helper\getConnection;

require_once(__DIR__."/Helper/getConnection.php");
require_once(__DIR__."/Model/Admin.php");
require_once(__DIR__."/Repository/AdminRepository.php");


$connection = getConnection();

$repository = new AdminRepositoryImpl($connection);

// login admin
// $admin = new Admin("admin","malas");

// $adminValid = $repository->find($admin);
// if($adminValid != null){
//   echo "Sukses Login";
// } else {
//   echo "Gagal Login";
// }





?>