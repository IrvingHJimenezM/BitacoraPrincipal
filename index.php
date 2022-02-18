<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="Usuario" class="form-control" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Actividad" class="form-control" placeholder="Actividad" autofocus>
          </div>
          <div class="form-group">
            <textarea name="Observaciones" rows="2" class="form-control" placeholder="Observaciones"></textarea>
          </div>
          <div class="form-group">
            <input type="text" name="Departamento" class="form-control" placeholder="Departamento" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Responsable" class="form-control" placeholder="Responsable" autofocus>
          </div>
          <input type="submit" name="GuardarActividad" class="btn btn-success btn-block" value="Guardar Actividad">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Actividad</th>
            <th>Observaciones</th>
            <th>Departamento</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Actividades";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Usuario']; ?></td>
            <td><?php echo $row['Actividad']; ?></td>
            <td><?php echo $row['Observaciones']; ?></td>
            <td><?php echo $row['Departamento']; ?></td>
            <td><?php echo $row['Responsable']; ?></td>
            <td><?php echo $row['Fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
