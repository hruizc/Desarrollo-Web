<?php
include("conexion.php");
$nombre = '';
$apellido_paterno= '';

if  (isset($_GET['id_cliente'])) {
  $id_cliente = $_GET['id_cliente'];
  $query = "SELECT * FROM tbl_cmv_cliente WHERE id_cliente=$id_cliente";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $rfc = $row['rfc'];
    $curp = $row['curp'];
  }
}

if (isset($_POST['update'])) {
  $id_cliente = $_GET['id_cliente'];
  $nombre= $_POST['nombre'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  $rfc = $_POST['rfc'];
  $curp = $_POST['curp'];

  $query = "UPDATE tbl_cmv_cliente SET nombre='$nombre', apellido_paterno ='$apellido_paterno',apellido_materno ='$apellido_materno',rfc ='$rfc',
  curp ='$curp'  WHERE id_cliente=$id_cliente";
  echo $nombre;
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');

}

?>
<?php include('includes/header.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id_cliente=<?php echo $_GET['id_cliente']; ?>" method="POST">

        <div class="form-group">
          <input type="text" name="nombre" value="<?php echo $nombre; ?>" 
          class="form-control" placeholder="Update nombre">
        </div> 

        <div class="form-group">
          <input type="text" name="apellido_paterno" value="<?php echo $apellido_paterno; ?>" 
          class="form-control" placeholder="Update apellido_paterno">
        </div> 

        <div class="form-group">
          <input type="text" name="apellido_materno" value="<?php echo $apellido_materno; ?>" 
          class="form-control" placeholder="Update apellido_materno">
        </div> 

        <div class="form-group">
          <input type="text" name="rfc" value="<?php echo $rfc; ?>" 
          class="form-control" placeholder="Update RFC">
        </div> 

        <div class="form-group">
          <input type="text" name="curp" value="<?php echo $curp; ?>" 
          class="form-control" placeholder="Update curp">
        </div>

        
        <button class="btn btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
