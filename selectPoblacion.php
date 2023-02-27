<?php
include("Database.php");

$connection = Database::getInstance()->getConnection();
$sql = "SELECT * FROM poblacion";
$query = $connection->query($sql) or die("Error en consulta");

$num_rows = $query->num_rows;
$json = array();
if($num_rows){
    while($row=mysqli_fetch_assoc($query)){
        $json['poblacion'][]=$row;
    }
}

$connection->close();
echo json_encode($json);

?>