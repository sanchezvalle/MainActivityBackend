<?php
include "Database.php";

$connection = Database::getInstance()->getConnection();
$actividad = $_POST['actividad'];

$sql = "SELECT calificacion FROM evento WHERE nombre LIKE $actividad";
$query = $connection->query($sql);
$json = array();

if($query->num_rows){
    while($row = $query->num_rows){
        $json['calificacion'][] = $row;
    }
}
$connection->close();
echo json_encode($json);

?>