<?php

require_once 'Connection.php';

class Rescues extends ConnectionDB {
  private $pdo;
  public function __construct() {
      $this->pdo = parent::getConnection();
  }
  //METODO DE CONSULTA , ACCESO , REGISTRO ETC.
  public function listar(){
    try{
      $sql = 'SELECT * FROM Rescues';
      $consulta = $this ->pdo->prepare($sql);
      $consulta -> execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){

    }
  }
  public function registrar($registro = []){
    try{
      $sql = "
      INSERT INTO Rescues 
      (nombreRescatista, telefonoContacto, ocupacion, especie, genero, raza, colorCaracteristica, lugarRescate, estadoSalud, condiciones, estadoActual) VALUES 
      (?,?,?,?,?,?,?,?,?,?,?)
      ";
      $consulta = $this ->pdo->prepare($sql);
      $consulta -> execute(array(
        $registro['nombreRescatista'],
        $registro['telefonoContacto'],
        $registro['ocupacion'],
        $registro['especie'],
        $registro['genero'],
        $registro['raza'],
        $registro['colorCaracteristica'],
        $registro['lugarRescate'],
        $registro['estadoSalud'],
        $registro['condiciones'],
        $registro['estadoActual']
      ));

      return $this->pdo->lastInsertId();
    }catch(Exception $e){
      error_log('Error en el Metodo Registrar: ' . $e->getMessage());
      return -1;
    }
  }
  public function eliminar($idRescate){
    try{
      $sql = 'DELETE FROM Rescues WHERE idRescate = ?';
      $consulta = $this ->pdo->prepare($sql);
      $consulta -> execute(array($idRescate));

      return $consulta->rowCount();
    }catch(Exception $e){
      error_log('Error en el Metodo Eliminar: ' . $e->getMessage());
      return -1;
    }
  }
  public function actualizar($registro = []){
    try{
      $sql = "
      UPDATE Rescues SET 
      nombreRescatista = ?,
      telefonoContacto = ?,
      ocupacion = ?,
      especie = ?,
      genero = ?,
      raza = ?,
      colorCaracteristica = ?,
      lugarRescate = ?,
      estadoSalud = ?,
      condiciones = ?,
      estadoActual = ?
      WHERE idRescate = ?
      "; 
      $consulta = $this ->pdo->prepare($sql);
      $consulta -> execute(array(
        $registro['nombreRescatista'],
        $registro['telefonoContacto'],
        $registro['ocupacion'],
        $registro['especie'],
        $registro['genero'],
        $registro['raza'],
        $registro['colorCaracteristica'],
        $registro['lugarRescate'],
        $registro['estadoSalud'],
        $registro['condiciones'],
        $registro['estadoActual'],
        $registro ['idRescate']
      ));
      return $consulta -> rowCount();
    }catch(Exception $e){
      error_log('Error en el Metodo Actualizar: ' . $e->getMessage());
      return -1;
    }
  }
  public function buscarid($idRescate){
    try{
      $sql = 'SELECT * FROM Rescues WHERE idRescate = ?';
      $consulta = $this ->pdo->prepare($sql);
      $consulta -> execute(array($idRescate));
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
      error_log('Error en el Metodo BuscarId: ' . $e->getMessage());
      return [];
    }
  }
}