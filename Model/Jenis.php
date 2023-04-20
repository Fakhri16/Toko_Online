<?php 

namespace Model{
  
  class Jenis {
    
    private ?string $id = null;
    private ?string $nama = null;

    public function __construct(?string $id = null, ?string $nama = null){
      
      $this->id = $id;
      $this->nama = $nama;
    }

    public function getId(): string {
      return $this->id;
    } 

    public function setId(string $id): void{
      $this->id = $id;
    }

    public function getNama(): string{
      return $this->nama;
    }

    public function setNama(string $nama): void{
      $this->nama = $nama;
    }
  }
}

?>