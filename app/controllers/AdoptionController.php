<?php
// Definimos el tipo de contenido como JSON y el juego de caracteres
header("Content-Type: application/json; charset=utf-8");

require_once "../models/Adoptions.php";
$adoption = new Adoptions();

if (isset($_POST['operation'])) {

    switch ($_POST['operation']) {
        
        case 'listar':
            // Retorna todas las adopciones activas (estado '1')
            // El modelo ya trae los datos del JOIN con Rescues
            echo json_encode($adoption->listar());
            break;

        case 'buscarId':
            // Se usa para cargar los datos en el formulario editAdopt.php
            $res = $adoption->buscarId($_POST['idAdopcion']);
            echo json_encode($res);
            break;

        case 'registrar':
            $datos = [
                'idRescate'         => $_POST['idRescate'],
                'nombreAdoptante'   => $_POST['nombreAdoptante'],
                'dniAdoptante'      => $_POST['dniAdoptante'],
                'telefonoAdoptante' => $_POST['telefonoAdoptante'],
                'direccionAdoptante'=> $_POST['direccionAdoptante']
            ];

            // Ahora $resultado puede ser true, false o "YA_ADOPTADA"
            $resultado = $adoption->registrar($datos);
            
            if ($resultado === "YA_ADOPTADA") {
                $status = false;
                $msg = "Esta mascota ya no está disponible.";
            } else {
                $status = $resultado;
                $msg = $resultado ? "¡Adopción exitosa! El catálogo se ha actualizado." : "Error en el registro.";
            }
            echo json_encode([
                "status" => $status,
                "message" => $msg
            ]);
            break;

        case 'actualizar':
            // Recolectamos los datos para la edición en editAdopt.php
            $datos = [
                'idAdopcion'        => $_POST['idAdopcion'],
                'nombreAdoptante'   => $_POST['nombreAdoptante'],
                'dniAdoptante'      => $_POST['dniAdoptante'],
                'telefonoAdoptante' => $_POST['telefonoAdoptante'],
                'direccionAdoptante'=> $_POST['direccionAdoptante']
            ];

            $resultado = $adoption->actualizar($datos);

            echo json_encode([
                "status" => $resultado,
                "message" => $resultado ? "Datos del adoptante actualizados correctamente" : "No se pudo actualizar el registro"
            ]);
            break;

        case 'eliminar':
            // Realiza la anulación lógica (estado = '0')
            $resultado = $adoption->anular($_POST['idAdopcion']);
            
            echo json_encode([
                "status" => $resultado,
                "message" => $resultado ? "Registro de adopción anulado" : "Error al intentar anular"
            ]);
            break;
    }
}