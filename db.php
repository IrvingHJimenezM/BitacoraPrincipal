<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'Bitacora'
) or die(mysqli_erro($mysqli));

?>
