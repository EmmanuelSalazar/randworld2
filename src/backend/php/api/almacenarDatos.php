<?php 
header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json');
require 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');
    $request = json_decode($postData, true);
    http_response_code(200);
    $nombre = mysqli_real_escape_string($mysqli, $request['nombre']);
    $precio = (int)mysqli_real_escape_string($mysqli, $request['precio']);
    $cantidad = (int)mysqli_real_escape_string($mysqli, $request['cantidad']);
    $montoEntregado = mysqli_real_escape_string($mysqli, $request['montoRecibido']);
    $fecha = date('d-m-Y H:i:s');
    $productos['fecha'] = $fecha;
    $precioFinal = $precio * $cantidad;
        if (!empty($nombre)) {
            if($precio >= 0 && $cantidad >= 0 && $montoEntregado >= 0) {
                if (is_int($cantidad)) {
                    if ($montoEntregado >= $precioFinal) {
                        $sql = "INSERT INTO productos (nombre, precio, cantidad, montoRecibido, fecha) VALUES ('$nombre', '$precio', '$cantidad', '$montoEntregado', '$fecha')";
                        if ($mysqli->query($sql) === TRUE) {
                            $respuesta = array('respuesta' => 'Venta realizada con exito', 'ok' => true);
                            header('Content-Type: application/json'); 
                            echo json_encode($respuesta, true);
                        } else {
                            $respuesta = array('respuesta' => 'Error al realizar la venta', 'ok' => false);
                            header('Content-Type: application/json'); 
                            echo json_encode($respuesta, true);                        }
                    } else {
                        $respuesta = array('respuesta' => 'El monto entregado no es suficiente', 'ok' => false);
                        header('Content-Type: application/json'); 
                        echo json_encode($respuesta, true);                    }
                } else {
                    $respuesta = array('respuesta' => 'La cantidad debe ser un numero entero', 'ok' => false);
                    header('Content-Type: application/json'); 
                    echo json_encode($respuesta, true);                
                }
            } else{
                $respuesta = array('respuesta' => 'El precio o monto no pueden ser negativos', 'ok' => false);
                header('Content-Type: application/json'); 
                echo json_encode($respuesta, true);
            }
        } else {
            $respuesta = array('respuesta' => 'El nombre no puede estar vacio', 'ok' => false);
            header('Content-Type: application/json'); 
            echo json_encode($respuesta, true);
        }
}
?>