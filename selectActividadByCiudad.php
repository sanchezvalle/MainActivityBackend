<?php
include("Database.php");

$database = Database::getInstance();
$connection = $database->getConnection();
$nombre_poblacion = $_POST["ciudad"];

$sql = "SELECT evento.nombre as eventonombre, descripcion, tipo_evento.nombre FROM evento, tipo_evento WHERE 
        id_poblacion=(SELECT id FROM poblacion WHERE nombre LIKE $nombre_poblacion) AND id_tipo=tipo_evento.id";
$query = $connection->query($sql);

$json = array();
$num_rows = $query->num_rows;
if($num_rows){
    while($row = mysqli_fetch_assoc($query)){
        $json['evento'][] = $row;
    }
}
$connection->close();
echo json_encode($json);

?>
