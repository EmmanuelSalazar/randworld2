<?php 
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json');
require 'conexion.php';
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchBy = mysqli_real_escape_string($mysqli, $_POST['searchBy']);
        if ($searchBy != '' OR NULL) {
            $searchBy = explode('-' ,$searchBy);
            $sql = $mysqli->prepare("SELECT * FROM productos WHERE fecha LIKE ? GROUP BY ID ORDER BY id DESC");
            $searchString = "%" . $searchBy[2] . "-" . $searchBy[1] . "-" . $searchBy[0] . "%";
            $sql->bind_param("s", $searchString);           
            $sql->execute();

            $query1 = $sql->get_result();
            $query = $query1->fetch_all(MYSQLI_ASSOC);
            $respuesta = [
                'ok' => true,
                'respuesta' => $query
            ];
            header('Content-Type: application/json');
            echo json_encode($respuesta,true);flags:
        } else {
            $sql = $mysqli->prepare("SELECT * FROM productos ORDER BY id DESC");
            $sql->execute();
            if (!$sql) {
                $respuesta = [
                    'ok' => false,
                    'respuesta' => 'Error al ejecutar la consulta'
                ];
                header('Content-Type: application/json');
                echo json_encode($respuesta,true);
                exit;
            } else {
                $resultado = $sql->get_result();
            $contador = $resultado->num_rows;
            $query = $resultado->fetch_all(MYSQLI_ASSOC);
            header('Content-Type: application/json'); 
            $respuesta = [
                'ok' => true,
                'respuesta' => $query
            ];
            echo json_encode($respuesta,true);
            }
            
        }
    }
   

?>  