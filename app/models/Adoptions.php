<?php
require_once 'Connection.php';

class Adoptions extends ConnectionDB {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    // 1. REGISTRAR UNA ADOPCIÓN
    public function registrar($datos = []) {
        try {
            $sql = "INSERT INTO Adoptions (
                        idRescate, 
                        nombreAdoptante, 
                        dniAdoptante, 
                        telefonoAdoptante, 
                        direccionAdoptante
                    ) VALUES (
                        :idRescate, 
                        :nombreAdoptante, 
                        :dniAdoptante, 
                        :telefonoAdoptante, 
                        :direccionAdoptante
                    )";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en Adoptions::registrar -> " . $e->getMessage());
            return false;
        }
    }

    // 2. LISTAR HISTORIAL DE ADOPCIONES (Con cruce de datos)
    public function listar() {
        try {
            // Hacemos un JOIN para saber qué mascota fue adoptada
            $sql = "SELECT 
                        A.idAdopcion,
                        A.nombreAdoptante,
                        A.dniAdoptante,
                        A.fechaAdopcion,
                        R.especie,
                        R.raza,
                        R.colorCaracteristica
                    FROM Adoptions A
                    INNER JOIN Rescues R ON A.idRescate = R.idRescate
                    WHERE A.estado = '1'
                    ORDER BY A.fechaAdopcion DESC";
            
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en Adoptions::listar -> " . $e->getMessage());
            return [];
        }
    }

    // 3. BUSCAR POR ID (Para ver detalles de un contrato de adopción)
    public function buscarId($idAdopcion) {
        try {
            $sql = "SELECT * FROM Adoptions WHERE idAdopcion = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idAdopcion]);
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en Adoptions::buscarId -> " . $e->getMessage());
            return null;
        }
    }

    // 4. ELIMINACIÓN LÓGICA (Anular adopción)
    public function anular($idAdopcion) {
        try {
            $sql = "UPDATE Adoptions SET estado = '0' WHERE idAdopcion = ?";
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute([$idAdopcion]);
            return $consulta->rowCount();
        } catch (Exception $e) {
            error_log("Error en Adoptions::anular -> " . $e->getMessage());
            return -1;
        }
    }
}