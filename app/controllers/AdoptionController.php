<?php

require_once "../models/Adoptions.php";
require_once "../models/Rescues.php";

$adoption = new Adoptions();
$rescue = new Rescues();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {

    switch ($_POST['operation']) {
        
        case 'registrar':
            // 1. Recolectamos datos del formulario de adopción
            $datosAdopcion = [
                'idRescate'          => $_POST['idRescate'],
                'nombreAdoptante'    => $_POST['nombreAdoptante'],
                'dniAdoptante'       => $_POST['dniAdoptante'],
                'telefonoAdoptante'  => $_POST['telefonoAdoptante'],
                'direccionAdoptante' => $_POST['direccionAdoptante']
            ];

            // 2. Intentamos registrar la adopción
            $idGenerado = $adoption->registrar($datosAdopcion);

            if ($idGenerado) {
                /* 3. ¡IMPORTANTE! 
                Si la adopción se guardó, actualizamos la mascota a estado '0'
                para que desaparezca del catálogo automáticamente.
                */
                $rescue->eliminar($_POST['idRescate']); 
                
                echo json_encode([
                    "status"  => true,
                    "message" => "¡Adopción exitosa! La mascota ahora tiene un hogar."
                ]);
            } else {
                echo json_encode([
                    "status"  => false,
                    "message" => "No se pudo procesar la adopción. Verifique los datos."
                ]);
            }
            break;
        case 'listar':
            // Retorna el historial de adopciones con los nombres de las mascotas (usando el JOIN del modelo)
            echo json_encode($adoption->listar());
            break;

        case 'anular':
            // En caso de que la adopción se cancele
            echo json_encode($adoption->anular($_POST['idAdopcion']));
            break;
    }
}