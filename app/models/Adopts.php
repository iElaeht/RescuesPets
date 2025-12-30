<?php

require_once 'Connection.php';

class Adopts extends ConnectionDB {
  private $pdo;

  public function __construct() {
      $this->pdo = parent::getConnection();
  }

  // MÉTODO: Listar todas las adopciones
  public function listar(){
    try {
      $sql = 'SELECT * FROM Adopts';
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      error_log('Error en listar Adopts: ' . $e->getMessage());
      return [];
    }
  }

  // MÉTODO: Registrar nueva adopción
  public function registrar($registro = []){
    try {
      $sql = "
      INSERT INTO Adopts 
      (idRescate, nombreAdoptante, telefonoAdoptante, direccionAdoptante, observaciones) 
      VALUES (?,?,?,?,?)
      ";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([
        $registro['idRescate'],
        $registro['nombreAdoptante'],
        $registro['telefonoAdoptante'],
        $registro['direccionAdoptante'],
        $registro['observaciones']
      ]);

      return $this->pdo->lastInsertId();
    } catch(Exception $e) {
      error_log('Error en registrar Adopts: ' . $e->getMessage());
      return -1;
    }
  }

  // MÉTODO: Eliminar adopción
  public function eliminar($idAdopt){
    try {
      $sql = 'DELETE FROM Adopts WHERE idAdopt = ?';
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$idAdopt]);
      return $consulta->rowCount();
    } catch(Exception $e) {
      error_log('Error en eliminar Adopts: ' . $e->getMessage());
      return -1;
    }
  }

  // MÉTODO: Actualizar adopción
  public function actualizar($registro = []){
    try {
      $sql = "
      UPDATE Adopts SET 
      idRescate = ?,
      nombreAdoptante = ?,
      telefonoAdoptante = ?,
      direccionAdoptante = ?,
      observaciones = ?
      WHERE idAdopt = ?
      ";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([
        $registro['idRescate'],
        $registro['nombreAdoptante'],
        $registro['telefonoAdoptante'],
        $registro['direccionAdoptante'],
        $registro['observaciones'],
        $registro['idAdopt']
      ]);
      return $consulta->rowCount();
    } catch(Exception $e) {
      error_log('Error en actualizar Adopts: ' . $e->getMessage());
      return -1;
    }
  }
  
  // MÉTODO: Buscar adopción por ID
  public function buscarid($idAdopt){
    try {
      $sql = 'SELECT * FROM Adopts WHERE idAdopt = ?';
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$idAdopt]);
      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      error_log('Error en buscarid Adopts: ' . $e->getMessage());
      return [];
    }
  }
}
