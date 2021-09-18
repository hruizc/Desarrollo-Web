<?php

include("conexion.php");

if(isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "DELETE FROM tbl_cmv_cliente WHERE id_cliente = $id_cliente";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
