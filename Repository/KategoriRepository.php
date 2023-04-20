<?php 

namespace Repository{

    use Model\Kategori;
    use PDO;

  interface KategoriRepository{

    function insert(Kategori $kategori): bool;

  }

  class KategoriRepositoryImpl implements KategoriRepository{

    private PDO $connection;

    public function __construct(PDO $connection){
      $this->connection = $connection;
    }
    
    public function insert(Kategori $kategori): bool{

      $sql = "INSERT INTO kategori(id,nama) VALUES (?,?)";

      $statement = $this->connection->prepare($sql);
      $sukses = $statement->execute([$kategori->getId(),$kategori->getNama()]);
      
      if($sukses){
        return true;
      } else {
        return false;
      }

    }


  }
}

?>