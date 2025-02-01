<?php
include 'conexion.php';
    $searchBy = mysqli_real_escape_string($mysqli, $_GET['searchBy']);

$searchBy = explode('-' ,$searchBy);
            $sql = $mysqli->prepare("SELECT * FROM productos WHERE fecha LIKE ?");
            $searchString = "%" . $searchBy[2] . "-" . $searchBy[1] . "-" . $searchBy[0] . "%";
            $sql->bind_param("s", $searchString);           
            $sql->execute();
            $query1 = $sql->get_result();
            $query = $query1->fetch_all(MYSQLI_ASSOC);
            $contar = $query1->num_rows;
            echo $contar;

?>