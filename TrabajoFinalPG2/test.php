<?php
$Server = "192.168.1.158";
$Username = "tfinal";
$PW = "tfinal";
$DB = "dbtf";
$connection = mysqli_connect($Server, $Username, $PW, $DB);

if($connection == false) {
    die("Error: " . mysqli_error_connect());
}

$sql = "INSERT INTO usuario (usuario, nombre, estado)  VALUES ('user2', 'nombre', 1);";

mysqli_query($connection, $sql) or die(mysqli_error($connection));

mysqli_close($connection);
?>