<?php
include "Database.php";

$database = Database::getInstance();
$connection = $database->getConnection();
$nombreEvento_post = $_POST['actividad'];
$nombrePoblacion_post = $_POST['ciudad'];
$descripcion_post = $_POST['descripcion'];
$tipo_post = $_POST['tipo'];
$rangoedad = $_POST['rangoedad'];

$sql = "INSERT INTO evento('id_poblacion','nombre','descripcion','id_tipo','calificacion') 
            VALUES ((SELECT id FROM poblacion WHERE nombre LIKE '$nombrePoblacion_post'), 
            '$nombreEvento_post', '$descripcion_post', (SELECT id FROM tipo_evento WHERE nombre LIKE '$tipo_post'), 0.0)";
$connection->query($sql) or die("Fallo en la ejecución de la sentencia");

$sqlre = "INSERT INTO evento_rangoedad('id_evento','id_rangoedad') 
            VALUES ((SELECT id FROM evento WHERE nombre LIKE '$nombreEvento_post'), 
                    (SELECT id FROM rango_edad WHERE rango LIKE '$rangoedad'))";
$connection->query($sqlre) or die("Fallo en la ejecución de la inserción del rango edad");

?>