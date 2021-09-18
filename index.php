<?php include("conexion.php")?>

<!-- Hace referencia a las vistas llamando al archivo header -->
<?php include('includes/header.php'); ?>

<!-- contenedor de bootstrap -->
    <div class="container p-4">
    <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?>
                 alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" 
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
      <?php session_unset(); } ?>

            <div class="card card-body">
                 <form action="guardar.php" method="POST">
                      <div class="form-group">
                           <input type="text" name="nombre" class="form-control"
                            placeholder="Nombre" autofocus>
                       </div>

                       <div class="form-group">
                           <input type="text" name="apellido_paterno" class="form-control"
                            placeholder="Apellido paterno" autofocus>
                       </div>

                       <div class="form-group">
                           <input type="text" name="apellido_materno" class="form-control"
                            placeholder="Apellido materno" autofocus>
                       </div>

                                             
                       <input type="submit" class="btn btn-success btn-block" 
                       name="guardar" value="Guardar">
                 </form>
            </div>

        <div class="col-md-20">
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>A.Paterno</th>
                <th>A.Materno</th>
                <th>RFC</th>
                <th>CURP</th>
                <th>Fecha de Alta</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
          $query = "SELECT * FROM tbl_cmv_cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_paterno']; ?></td>
            <td><?php echo $row['apellido_materno']; ?></td>
            <td><?php echo $row['rfc']; ?></td>
            <td><?php echo $row['curp']; ?></td>
            <td><?php echo $row['fecha_alta']; ?></td>
            <td>
              <a href="edit.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              
              <a href="delete_task.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>

                <a href="consulta.php?id_cliente=<?php echo $row['id_cliente']?>" class="btn btn-info">
                <i class="far fa-eye"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Hace referencia a las vistas llamando al archivo footer -->
<!-- Hace referencia a las vistas llamando al archivo footer -->
<?php include('includes/footer.php'); ?>

    

    
