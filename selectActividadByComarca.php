<?php
include "Database.php";

$connection = Database::getInstance()->getConnection();
$nombre_comarca = $_POST['comarca'];
$rango_edad = $_POST['rangoedad'];

$sql = "SELECT evento.nombre as eventonombre, descripcion, tipo_evento.nombre FROM evento, evento_rangoedad, tipo_evento
        WHERE id_poblacion=(SELECT id FROM poblacion WHERE comarca LIKE '$nombre_comarca') AND id_rangoedad=(
            SELECT id FROM rango_edad WHERE rango LIKE '$rango_edad'
        ) AND id_evento=evento.id AND id_tipo=tipo_evento.id";

$query = $connection->query($sql);
$num_rows = $query->num_rows;
$json = array();

if($num_rows){
    while($row = mysqli_fetch_assoc($query)){
        $json['evento'][] = $row;
    }
}
$connection->close();
echo json_encode($json);

?>