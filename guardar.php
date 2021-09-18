<?php

include('conexion.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];

$query = "INSERT INTO tbl_cmv_cliente(nombre, apellido_paterno) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno')";
$result = mysqli_query($conn, $query);
if(!$result) {
  die("Query Failed.");
}

$_SESSION['message'] = 'Guardado Exitosamente';
$_SESSION['message_type'] = 'success';

header('Location: index.php');

}

?>
