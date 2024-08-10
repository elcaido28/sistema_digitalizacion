<?php
include('conexion.php');
$id=$_REQUEST['id'];

$result=mysqli_query($con, "UPDATE proveedores SET est_id = '2' WHERE prov_id = '$id'");
if(!$result){
    echo "hay un error en".$result;
}else{
    $_SESSION['delprov']=1;
	header('Location:registro_proveedores.php');
}
?>