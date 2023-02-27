<?php
include "Database.php";

$database = Database::getInstance();
$connection = $database->getConnection();
$nombre_post = $_POST['nombre'];
$comarca_post = $_POST['comarca'];

$sql = "INSERT INTO poblacion('nombre','comarca') VALUES ('$nombre_post', '$comarca_post')";
$query = $connection->query($sql) or die("Error al insertar valores");

?>