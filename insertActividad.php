<?php
include "Database.php";

$database = Database::getInstance();
$connection = $database->getConnection();
$nombreEvento_post = $_POST['actividad'];
$nombrePoblacion_post = $_POST['ciudad'];
$descripcion_post = $_POST['descripcion'];
$tipo_post = $_POST['tipo'];

$sql = "INSERT INTO evento('id_poblacion','nombre','descripcion','id_tipo','calificacion') 
            VALUES ((SELECT id FROM poblacion WHERE nombre LIKE '$nombrePoblacion_post'), '$nombreEvento_post', '$descripcion_post', (SELECT id FROM tipo_evento WHERE nombre LIKE '$tipo_post'), 0.0)";
$query = $connection->query($sql);


?>