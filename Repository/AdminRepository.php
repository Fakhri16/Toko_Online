<?php 

namespace Repository{

    use Model\Admin;
    use PDO;

  interface AdminRepository{

    function find(Admin $admin): ?Admin;

  }

  class AdminRepositoryImpl implements AdminRepository{

    private PDO $connection;

    public function __construct(PDO $connection){
      
      $this->connection = $connection;
    }

    public function find(Admin $admin): ?Admin{

      $sql = "SELECT * FROM admin WHERE username = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$admin->getUsername()]);
      
      $rowcount = $statement->rowCount();

      if($rowcount > 0){
        if($row = $statement->fetch()){
          if(password_verify($admin->getPassword(),$row['password'])){
            return new Admin(username: $row['username'],password:$row['password']);
         }  else {
          return null;
         }
        }
      } else {
        return null;
      }
    }
  }
}

?>