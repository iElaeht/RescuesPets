<?php
class ConnectionDB{
    private $server = "localhost";
    private $port = "3306"; //Aqui va el Port de DB (Por defecto casi siempre es 3306)
    private $database = "rescuespets";  //Aqui va el Nombre de DB
    private $username = "root";  //Aqui va el usuario Asignado en tu BD
    private $passwordDB = "root"; //Aqui va la contraseña Asignado en tu BD en mi caso use (root)
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