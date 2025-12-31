<?php
require_once 'Connection.php';

class Adoptions extends ConnectionDB {
    private $pdo;

    public function __construct() {
        $this->pdo = parent::getConnection();
    }

    // 1. CREATE (Registrar Adopción)
public function registrar($datos = []) {
    try {
        $this->pdo->beginTransaction(); // Iniciamos transacción

        // 1. Verificar si la mascota ya fue adoptada (Seguridad)
        $sqlCheck = "SELECT idRescate FROM Rescues WHERE idRescate = ? AND estado = '1'";
        $stmtCheck = $this->pdo->prepare($sqlCheck);
        $stmtCheck->execute([$datos['idRescate']]);
        
        if (!$stmtCheck->fetch()) {
            $this->pdo->rollBack();
            return "YA_ADOPTADA"; // Retornamos un código especial
        }

        // 2. Insertar la Adopción
        $sqlInsert = 
        "INSERT INTO Adoptions (idRescate, nombreAdoptante, dniAdoptante, telefonoAdoptante, direccionAdoptante) 
        VALUES (
        :idRescate, 
        :nombreAdoptante, 
        :dniAdoptante, 
        :telefonoAdoptante, 
        :direccionAdoptante
        )";
        $stmtInsert = $this->pdo->prepare($sqlInsert);
        $resInsert = $stmtInsert->execute($datos);

        // 3. Actualizar estado del Rescate a 0 (No disponible)
        $sqlUpdate = "UPDATE Rescues SET estado = '0' WHERE idRescate = ?";
        $stmtUpdate = $this->pdo->prepare($sqlUpdate);
        $resUpdate = $stmtUpdate->execute([$datos['idRescate']]);

        if ($resInsert && $resUpdate) {
            $this->pdo->commit();
            return true;
        } else {
            $this->pdo->rollBack();
            return false;
        }
    } catch (Exception $e) {
        $this->pdo->rollBack();
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

    // 2. READ (Listar todas las adopciones activas con JOIN)
    public function listar() {
        try {
            $sql = "SELECT 
                        A.idAdopcion,
                        A.idRescate,
                        A.nombreAdoptante,
                        A.dniAdoptante,
                        A.telefonoAdoptante,
                        A.direccionAdoptante,
                        A.fechaAdopcion,
                        R.especie,
                        R.raza
                    FROM Adoptions A
                    INNER JOIN Rescues R ON A.idRescate = R.idRescate
                    WHERE A.estado = '1'
                    ORDER BY A.idAdopcion DESC";
            
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error en Adoptions::listar -> " . $e->getMessage());
            return [];
        }
    }

    // 3. READ BY ID (Buscar para cargar en el formulario de edición)
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

    // 4. UPDATE (Actualizar datos del adoptante)
    public function actualizar($datos = []) {
        try {
            $sql = "UPDATE Adoptions SET 
                        nombreAdoptante    = :nombreAdoptante,
                        dniAdoptante       = :dniAdoptante,
                        telefonoAdoptante  = :telefonoAdoptante,
                        direccionAdoptante = :direccionAdoptante
                    WHERE idAdopcion = :idAdopcion";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute($datos);
        } catch (Exception $e) {
            error_log("Error en Adoptions::actualizar -> " . $e->getMessage());
            return false;
        }
    }

    // 5. DELETE (Eliminación lógica)
    public function anular($idAdopcion) {
        try {
            $sql = "UPDATE Adoptions SET estado = '0' WHERE idAdopcion = ?";
            $consulta = $this->pdo->prepare($sql);
            return $consulta->execute([$idAdopcion]);
        } catch (Exception $e) {
            error_log("Error en Adoptions::anular -> " . $e->getMessage());
            return false;
        }
    }
}