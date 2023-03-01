<?php
include "Database.php";

$connection = Database::getInstance()->getConnection();
$actividad = $_POST['actividad'];
$rating = $_POST['rating'];

$sqlUpdate = "UPDATE evento SET calificacion=((calificacion+$rating)/2) WHERE nombre LIKE '$actividad'";
$sqlNew = "UPDATE evento SET calificacion=$rating WHERE nombre LIKE '$actividad'";
$sqlCheck = "SELECT calificacion FROM evento WHERE nombre LIKE '$actividad'";

$selectQuery = $connection->query($sqlCheck);
if($selectQuery->num_rows){
    $row = $selectQuery->fetch_assoc();
    if($row['calificacion']==0){
        $connection->query($sqlNew);
    } else {
        $connection->query($sqlUpdate);
    }
} else {
    die("Sin resultados");
}

?>