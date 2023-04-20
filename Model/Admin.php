<?php

namespace Model{
  
  class Admin{

    private ?string $username = null;
    private ?string $password = null;

    public function __construct(?string $username = null, ?string $password = null){
      
      $this->username = $username;
      $this->password = $password;
    }

    public function getUsername(): string{
      
      return $this->username;
    }

    public function setUsername(string $username): void{
      
      $this->username = $username;
    }

    public function getPassword(): string{

      return $this->password;
    }

    public function setPassword(string $password): void{
      $this->password = $password;
    }
  }
}
?>