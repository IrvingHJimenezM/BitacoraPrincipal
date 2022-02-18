<?php

include('db.php');

if (isset($_POST['GuardarActividad'])) {
  $Actv = $_POST['Actividad'];
  $Obs = $_POST['Observaciones'];
  $Depto = $_POST['Departamento'];
  $Resp = $_POST['Responsable'];
  $User = $_POST['Usuario'];
  $query = "INSERT INTO Actividades(Usuario, Actividad, Observaciones, Departamento, Responsable) VALUES ('$User','$Actv', '$Obs', '$Depto', '$Resp')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Actividad Agregada Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
