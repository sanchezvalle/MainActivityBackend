<?php
include "Database.php";

$connection = Database::getInstance()->getConnection();
$nombre_poblacion = $_POST['ciudad'];
$rango_edad = $_POST['rangoedad'];

$sql = "SELECT evento.nombre as eventonombre, descripcion, tipo_evento.nombre FROM evento, evento_rangoedad, tipo_evento 
        WHERE id_poblacion=(SELECT id FROM poblacion WHERE nombre LIKE '$nombre_poblacion') AND id_rangoedad=(
            SELECT id FROM rango_edad WHERE rango LIKE '$rango_edad'
        ) AND id_evento=evento.id AND id_tipo=tipo_evento.id";

$query = $connection->query($sql) or die("Error en ejecución de query");
$json = array();

if($query->num_rows){
    while($row = mysqli_fetch_assoc($query)){
        $json['evento'][] = $row;
    }
}
$connection->close();
echo json_encode($json);

?>