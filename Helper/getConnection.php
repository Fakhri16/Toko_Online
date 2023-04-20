<?php 

namespace Helper{

    use PDO;

  function getConnection(): PDO{

    $host = "localhost";
    $port = 3306;
    $dbname = "design_toko_online";
    $username = "root";
    $password = "";
    
    return new PDO("mysql:host=$host:$port;dbname=$dbname",$username,$password);
  }
}

?>