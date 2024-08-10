<?php
include('conexion.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE empleados SET est_id = '2' WHERE epl_id = '$id'");
header('Location:registro_empleados.php');

?>