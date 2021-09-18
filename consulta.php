<?php include("conexion.php")?>

<!-- Hace referencia a las vistas llamando al archivo header -->
<?php include('includes/header.php'); ?>

<!-- contenedor de bootstrap -->
    <div class="container p-4">
    <div class="row">
    <div class="col-md-4">
           
        <div class="col-md-8">
            <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>A.Paterno</th>
                <th>A.Materno</th>
                <th>id_cliente_cuenta</th>
                <th>id_cuenta</th>
                <th>fecha_contratacion</th>
                <th>saldo_actual</th>
               
            </tr>
            </thead>
            <tbody>
            <?php

            
          /*$query = "SELECT * FROM tbl_cmv_cliente";*/
          $query = "SELECT nombre,tbl_cmv_cliente.apellido_paterno,tbl_cmv_cliente.apellido_materno,
          tbl_cmv_cliente_cuenta.id_cliente_cuenta,tbl_cmv_cliente_cuenta.id_cliente,tbl_cmv_cliente_cuenta.id_cuenta,
          tbl_cmv_cliente_cuenta.saldo_actual,tbl_cmv_cliente_cuenta.fecha_contratacion,tbl_cmv_cliente_cuenta.fecha_ultimo_movimiento 
          FROM tbl_cmv_cliente_cuenta INNER JOIN tbl_cmv_cliente ON tbl_cmv_cliente_cuenta.id_cliente = tbl_cmv_cliente.id_cliente ORDER BY id_cliente";

          $result_tasks = mysqli_query($conn, $query);
      
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          
            <td><?php echo $row['id_cliente']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_paterno']; ?></td>
            <td><?php echo $row['apellido_materno']; ?></td>
            <td><?php echo $row['id_cliente_cuenta']; ?></td>
            <td><?php echo $row['id_cuenta']; ?></td>
            <td><?php echo $row['fecha_contratacion']; ?></td>
            <td><?php echo $row['saldo_actual']; ?></td>
            <td>
              
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>


<!-- Hace referencia a las vistas llamando al archivo footer -->
<?php include('includes/footer.php'); ?>