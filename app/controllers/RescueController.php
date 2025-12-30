<?php
require_once "../models/Rescues.php";
$rescue = new Rescues();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {

    switch ($_POST['operation']) {
        
        case 'listar':
            echo json_encode($rescue->listar());
            break;

        case 'buscarId':
            // Solo necesitamos el ID para buscar
            echo json_encode($rescue->buscarId($_POST['idRescate']));
            break;

        case 'actualizar':
            // Recogemos los datos actualizados
            $datos = [
                'idRescate'     => $_POST['idRescate'],
                'nombreMascota' => $_POST['nombreMascota'],
                'raza'          => $_POST['raza'],
                'color'         => $_POST['color'],
                'ubicacion'     => $_POST['ubicacion'],
                'estado'        => $_POST['estado']
            ];
            echo json_encode($rescue->actualizar($datos));
            break;

        case 'registrar':
            $datos = [
                'nombreMascota' => $_POST['nombreMascota'],
                'raza'          => $_POST['raza'],
                'color'         => $_POST['color'],
                'ubicacion'     => $_POST['ubicacion'],
                'estado'        => $_POST['estado']
            ];
            echo json_encode($rescue->registrar($datos));
            break;
    }
}