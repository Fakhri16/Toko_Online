<?php 

namespace Repository{

    use Model\Kategori;
    use PDO;

  interface KategoriRepository{

    function insert(Kategori $kategori): bool;

    function findById(string $id): ?Kategori;

    function findNotId(string $id): array;
    
    function findAll(): array;
    
    function delete(string $id): bool;

    function update(string $id,Kategori $kategori): bool;


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

    public function findById(string $id): ?Kategori{

      $sql = "SELECT * FROM kategori WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if($row = $statement->fetch()){
        return new Kategori(id:$row['id'],nama:$row['nama']);
      }
    }

    public function findNotId(string $id): array{

      $data = [];
      $sql = "SELECT * FROM kategori WHERE id != ?";
      
      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      while($row = $statement->fetch()){
        $data [] = $row;
      }

      return  $data;
    }

    public function findAll(): array{

      $data = [];
      
      $sql = "SELECT * FROM kategori";

      $statement = $this->connection->query($sql);
      
      while($row = $statement->fetch()){
        $data[] = $row;
      }
      return $data;
    }

    public function delete(string $id): bool{

      $sql = "DELETE FROM kategori WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $sukses = $statement->execute([$id]);

      if($sukses){
        return true;
      } else {
        return false;
      }
    }

    public function update(string $id,Kategori $kategori): bool{

      $sql = "UPDATE kategori SET id = ?, nama= ? WHERE id = ?";
      
      $statement = $this->connection->prepare($sql);

      $sukses = $statement->execute([$kategori->getId(),$kategori->getNama(),$id]);

      if($sukses){
        return true;
      } else {
        return false;
      }
    }

  }
}

?>