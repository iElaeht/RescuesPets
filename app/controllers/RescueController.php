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
            // Ejecutamos el registro
            $resultado = $rescue->registrar($datos);
            // Armamos una respuesta que el JS pueda entender
            if ($resultado) {
                echo json_encode([
                    "status" => true,
                    "message" => "Registro guardado correctamente"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "No se pudo guardar el registro en la base de datos"
                ]);
            }
            break;
case 'actualizar':
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
            // IMPORTANTE: Envolver el resultado en un array con status y message
            $resultado = $rescue->actualizar($datos);
            echo json_encode([
                "status" => $resultado,
                "message" => $resultado ? "Registro actualizado con éxito" : "Error al actualizar en la base de datos"
            ]);
            break;
        case 'eliminar':
            $resultado = $rescue->eliminar($_POST['idRescate']);
            echo json_encode([
                "status" => $resultado,
                "message" => $resultado ? "Registro desactivado" : "Error al eliminar"
            ]);
            break;
    }
}