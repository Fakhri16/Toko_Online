<?php 

namespace Repository{

    use Model\Jenis;
    use PDO;

  interface JenisRepository{

    function insert(Jenis $jenis): bool;

    function findById(string $id): ?Jenis;

    function findNotId(string $id): array;
    
    function findAll(): array;
    
    function delete(string $id): bool;

    function update(string $id,Jenis $jenis): bool;

  }

  class JenisRepositoryImpl implements JenisRepository{

    private PDO $connection;

    public function __construct(PDO $connection){
      $this->connection = $connection;
    }
    
    public function insert(Jenis $jenis): bool{

      $sql = "INSERT INTO jenis(id,nama) VALUES (?,?)";
      $statement = $this->connection->prepare($sql);
      
      return $statement->execute([$jenis->getId(),$jenis->getNama()]);

    }

    public function findById(string $id): ?Jenis{

      $sql = "SELECT * FROM jenis WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if($row = $statement->fetch()){
        return new Jenis(id:$row['id'],nama:$row['nama']);
      }
    }

    public function findNotId(string $id): array{

      $data = [];
      $sql = "SELECT * FROM jenis WHERE id != ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      while($row = $statement->fetch()){
        $data[] = $row;
      }

      return $data;
    }

    public function findAll(): array{

      $data = [];
      $sql = "SELECT * FROM jenis";

      $statement = $this->connection->query($sql);

      while($row = $statement->fetch()){
        $data[] = $row;
      }

      return $data;
    }

    public function delete(string $id): bool{
      
      $sql = "DELETE FROM jenis WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      return $statement->execute([$id]);

    }

    public function update(string $id, Jenis $jenis): bool {

      $sql = "UPDATE jenis SET id = ?, nama = ? WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      
      return $statement->execute([$jenis->getId(),$jenis->getNama(),$id]);

    }
  
  }
}

?>