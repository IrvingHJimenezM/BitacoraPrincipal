<?php
include("db.php");
$User = '';
$Actv = '';
$Obs='';
$Depto='';
$Resp='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM Actividades WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Actv = $row['Actividad'];
    $Obs = $row['Observaciones'];
    $Depto = $row['Departamento'];
    $Resp = $row['Responsable'];
    $User = $row['Usuario'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $Actv = $_POST['Actividad'];
  $Obs = $_POST['Observaciones'];
  $Depto = $_POST['Departamento'];
  $Resp = $_POST['Responsable'];
  $User = $_POST['Usuario'];

  $query = "UPDATE Actividades set Usuario = '$User', Actividad = '$Actv', Observaciones='$Obs',Departamento='$Depto',Responsable='$Resp' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actividad Actualizada Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="Usuario" type="text" class="form-control" value="<?php echo $User; ?>" placeholder="Actualizar Usuario">
        </div>
        <div class="form-group">
          <input name="Actividad" type="text" class="form-control" value="<?php echo $Actv; ?>" placeholder="Actualizar Actividad">
        </div>
        <div class="form-group">
        <textarea name="Observaciones" class="form-control" cols="10" rows="5"><?php echo $Obs;?></textarea>
        </div>
        <div class="form-group">
          <input name="Departamento" type="text" class="form-control" value="<?php echo $Depto; ?>" placeholder="Actualizar Departamento">
        </div>
        <div class="form-group">
          <input name="Responsable" type="text" class="form-control" value="<?php echo $Resp; ?>" placeholder="Actualizar Responsable">
        </div>
        <button class="btn-success" name="update">
          Actualizacion
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
