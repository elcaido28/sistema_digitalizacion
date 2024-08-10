<?php

include('conexion.php');
session_start();
	
	$empleado=$_SESSION['ide'];
	$ide=$_SESSION['modid'];

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$feching=$_POST['feching'];
	$cedula=$_POST['cedula'];
	$cargo=$_POST['cargo'];
	$edad=$_POST['edad'];
	$email=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];

	$consulta="UPDATE empleados SET epl_nombres='$nombres', epl_apellidos='$apellidos', epl_cedula='$cedula', epl_edad='$edad', epl_correo='$email', epl_telefono='$telefono', epl_feching='$feching', epl_direccion='$direccion', crg_id='$cargo' WHERE epl_id='$ide'";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noeditado']=1;
		header('Location:editar_empleados.php?id='.$ide);
    }else{
		$_SESSION['editado']=1;
		header('Location:editar_empleados.php?id='.$ide);
	}
?>
