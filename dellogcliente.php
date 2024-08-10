<?php
include('conexion.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE clientes SET est_id = '2' WHERE cl_id = '$id'");
header('Location:registro_clientes.php');
?>