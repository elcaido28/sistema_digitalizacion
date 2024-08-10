<?php
include('conexion.php');
$id=$_REQUEST['ide'];

$result=mysqli_query($con, "UPDATE empleados SET est_id = '1' WHERE epl_id = '$id'");
header('Location:restaurar_inactivos.php');

?>