<?php

require_once "../models/Adopts.php";

$adopts = new Adopts();

header("Content-Type: application/json; charset=utf-8");

if(isset($_POST['operation'])){

    switch($_POST['operation']){
        
        case 'listar':
            echo json_encode($adopts->listar());
            break;

        case 'registrar':
            // Preparamos el array que el modelo espera
            $datos = [
                "idRescate"         => $_POST['idRescate'],
                "nombreAdoptante"   => $_POST['nombreAdoptante'],
                "telefonoAdoptante" => $_POST['telefonoAdoptante'],
                "direccionAdoptante" => $_POST['direccionAdoptante'],
                "observaciones"     => $_POST['observaciones']
            ];
            $idGenerada = $adopts->registrar($datos);
            echo json_encode(["id" => $idGenerada]);
            break;

        case 'eliminar':
            $afectados = $adopts->eliminar($_POST['idAdopt']);
            echo json_encode(["afectados" => $afectados]);
            break;

        case 'actualizar':
            // Para actualizar necesitamos incluir el ID
            $datosActualizar = [
                "idRescate"         => $_POST['idRescate'],
                "nombreAdoptante"   => $_POST['nombreAdoptante'],
                "telefonoAdoptante" => $_POST['telefonoAdoptante'],
                "direccionAdoptante" => $_POST['direccionAdoptante'],
                "observaciones"     => $_POST['observaciones'],
                "idAdopt"           => $_POST['idAdopt']
            ];
            $afectados = $adopts->actualizar($datosActualizar);
            echo json_encode(["afectados" => $afectados]);
            break;

        case 'buscarid':
            echo json_encode($adopts->buscarid($_POST['idAdopt']));
            break;
            
        default:
            echo json_encode(["error" => "Operación no válida"]);
            break;
    }
}