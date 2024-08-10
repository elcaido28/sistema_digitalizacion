<?php
include('conexion.php');
$id=$_REQUEST['idp'];

$result=mysqli_query($con, "UPDATE proveedores SET est_id = '1' WHERE prov_id = '$id'");
header('Location:restaurar_inactivos.php#proveedores');

?>