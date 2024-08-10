<?php
include('conexion.php');
$id=$_REQUEST['idc'];

$result=mysqli_query($con, "UPDATE clientes SET est_id = '1' WHERE cl_id = '$id'");
header('Location:restaurar_inactivos.php');

?>