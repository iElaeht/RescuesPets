<?php
require_once 'Connection.php';

class Rescues extends ConnectionDB {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    public function listar() {
        try {
            // Listamos solo los activos (estado = '1')
            $sql = "SELECT * FROM Rescues WHERE estado = '1' ORDER BY idRescate DESC";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en listar: " . $e->getMessage());
            return [];
        }
    }

    public function registrar($datos = []) {
        try {
            $sql = "INSERT INTO Rescues (
                        nombreRescatista, DNI, telefonoContacto, ocupacion, 
                        especie, genero, raza, colorCaracteristica, 
                        lugarRescate, fechaEncontrado, estadoSalud, condiciones
                    ) VALUES (
                        :nombreRescatista, :DNI, :telefonoContacto, :ocupacion, 
                        :especie, :genero, :raza, :colorCaracteristica, 
                        :lugarRescate, :fechaEncontrado, :estadoSalud, :condiciones
                    )";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en registrar: " . $e->getMessage());
            return false;
        }
    }

    public function actualizar($registro = []) {
        try {
            $sql = "UPDATE Rescues SET 
                        nombreRescatista = ?,
                        DNI = ?,
                        telefonoContacto = ?,
                        ocupacion = ?,
                        especie = ?,
                        genero = ?,
                        raza = ?,
                        colorCaracteristica = ?,
                        lugarRescate = ?,
                        fechaEncontrado = ?, 
                        estadoSalud = ?,
                        condiciones = ?
                    WHERE idRescate = ?"; 
            
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute([
                $registro['nombreRescatista'],
                $registro['DNI'],
                $registro['telefonoContacto'],
                $registro['ocupacion'],
                $registro['especie'],
                $registro['genero'],
                $registro['raza'],
                $registro['colorCaracteristica'],
                $registro['lugarRescate'],
                $registro['fechaEncontrado'],
                $registro['estadoSalud'],
                $registro['condiciones'],
                $registro['idRescate']
            ]);
        } catch (Exception $e) {
            error_log('Error en actualizar: ' . $e->getMessage());
            return false;
        }
    }

    public function eliminar($idRescate) {
        try {
            // Borrado lógico para no perder historial
            $sql = "UPDATE Rescues SET estado = '0' WHERE idRescate = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idRescate]);
            return $consulta->rowCount();
        } catch (Exception $e) {
            error_log('Error en eliminar: ' . $e->getMessage());
            return -1;
        }
    }

    public function buscarid($idRescate) {
        try {
            $sql = 'SELECT * FROM Rescues WHERE idRescate = ?';
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idRescate]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log('Error en buscarid: ' . $e->getMessage());
            return null;
        }
    }
}