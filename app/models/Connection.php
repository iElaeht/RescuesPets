<?php
class ConnectionDB{
    private $server = "localhost";
    private $port = "3306";
    private $database = "rescuespets";
    private $username = "root";
    private $passwordDB = "root";
    public function getConnection(){
      try{
        $pdo = new PDO(
          "mysql:host = {$this->server}; port={$this->port}; dbname={$this->database}; charset=UTF8",
          username: $this->username,
          password: $this->passwordDB
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      }catch(Exception $e){
        die("Error de Conexión: " . $e->getMessage());
    }
  }
}