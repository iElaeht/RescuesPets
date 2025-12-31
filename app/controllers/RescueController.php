<?php

require_once "../models/Rescues.php";
$rescue = new Rescues();

header("Content-Type: application/json; charset=utf-8");

if (isset($_POST['operation'])) {

    switch ($_POST['operation']) {
        
        case 'listar':
            // Retorna todos los registros con estado '1'
            echo json_encode($rescue->listar());
            break;

        case 'buscarId':
            // Busca una mascota específica por su ID
            echo json_encode($rescue->buscarid($_POST['idRescate']));
            break;

        case 'registrar':
            // Sincronizado con la nueva tabla: Incluye DNI y quita estadoActual
            $datos = [
                'nombreRescatista'    => $_POST['nombreRescatista'],
                'DNI'                 => $_POST['DNI'],
                'telefonoContacto'    => $_POST['telefonoContacto'],
                'ocupacion'           => $_POST['ocupacion'],
                'especie'             => $_POST['especie'],
                'genero'              => $_POST['genero'],
                'raza'                => !empty($_POST['raza']) ? $_POST['raza'] : 'Mestizo',
                'colorCaracteristica' => $_POST['colorCaracteristica'],
                'lugarRescate'        => $_POST['lugarRescate'],
                'fechaEncontrado'     => $_POST['fechaEncontrado'],
                'estadoSalud'         => $_POST['estadoSalud'],
                'condiciones'         => $_POST['condiciones']
            ];
            echo json_encode($rescue->registrar($datos));
            break;

        case 'actualizar':
            // Sincronizado para permitir la edición de todos los campos nuevos
            $datos = [
                'idRescate'           => $_POST['idRescate'],
                'nombreRescatista'    => $_POST['nombreRescatista'],
                'DNI'                 => $_POST['DNI'],
                'telefonoContacto'    => $_POST['telefonoContacto'],
                'ocupacion'           => $_POST['ocupacion'],
                'especie'             => $_POST['especie'],
                'genero'              => $_POST['genero'],
                'raza'                => $_POST['raza'],
                'colorCaracteristica' => $_POST['colorCaracteristica'],
                'lugarRescate'        => $_POST['lugarRescate'],
                'fechaEncontrado'     => $_POST['fechaEncontrado'],
                'estadoSalud'         => $_POST['estadoSalud'],
                'condiciones'         => $_POST['condiciones']
            ];
            echo json_encode($rescue->actualizar($datos));
            break;

        case 'eliminar':
            // Realiza el borrado lógico (estado = '0') definido en el modelo
            echo json_encode($rescue->eliminar($_POST['idRescate']));
            break;
    }
}