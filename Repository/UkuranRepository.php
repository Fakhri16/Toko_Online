<?php 

namespace Repository{

    use Model\Ukuran;
    use PDO;

  interface UkuranRepository{

    function insert(Ukuran $ukuran): bool;

    function findById(string $id): ?Ukuran;

    function findNotId(string $id): array;
    
    function findAll(): array;
    
    function delete(string $id): bool;

    function update(string $id,Ukuran $ukuran): bool;


  }

  class UkuranRepositoryImpl implements UkuranRepository{

    private PDO $connection;

    public function __construct(PDO $connection){
      $this->connection = $connection;
    }
    
    public function insert(Ukuran $ukuran): bool{

      $sql = "INSERT INTO ukuran(id,nama) VALUES (?,?)";

      $statement = $this->connection->prepare($sql);
      
      return $statement->execute([$ukuran->getId(),$ukuran->getNama()]);

    }

    public function findById(string $id): ?Ukuran{

      $sql = "SELECT * FROM ukuran WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if($row = $statement->fetch()){
        return new Ukuran(id:$row['id'],nama:$row['nama']);
      }
    }

    public function findNotId(string $id): array{

      $data = [];
      $sql = "SELECT * FROM ukuran WHERE id != ?";
      
      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      while($row = $statement->fetch()){
        $data [] = $row;
      }

      return  $data;
    }

    public function findAll(): array{

      $data = [];
      
      $sql = "SELECT * FROM ukuran";

      $statement = $this->connection->query($sql);
      
      while($row = $statement->fetch()){
        $data[] = $row;
      }
      return $data;
    }

    public function delete(string $id): bool{

      $sql = "DELETE FROM ukuran WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      
      return $statement->execute([$id]);
    }

    public function update(string $id,Ukuran $ukuran): bool{

      $sql = "UPDATE ukuran SET id = ?, nama= ? WHERE id = ?";
      
      $statement = $this->connection->prepare($sql);

      return $statement->execute([$ukuran->getId(),$ukuran->getNama(),$id]);
    }

  }
}

?>