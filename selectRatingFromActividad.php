<?php
include "Database.php";

$connection = Database::getInstance()->getConnection();
$actividadPost = $_POST['actividad'];

$sql = "SELECT calificacion FROM evento WHERE nombre LIKE '$actividadPost'";
$query = $connection->query($sql);
$json = array();

if($query->num_rows){
    while($row = $query->fetch_assoc()){
        $json['calificacion'][] = $row;
    }
}
$connection->close();
echo json_encode($json);

?>