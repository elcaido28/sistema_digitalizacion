n<?php

include('conexion.php');
session_start();

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$feching=$_POST['feching'];
	$cedula=$_POST['cedula'];
	$cargo=$_POST['cargo'];
	$edad=$_POST['edad'];
	$email=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$direccion=$_POST['direccion'];
	$estado=1;

	$consulta="INSERT INTO empleados (epl_nombres, epl_apellidos, epl_cedula, epl_edad, epl_correo, epl_telefono, epl_feching, epl_direccion, crg_id, est_id) VALUES ('$nombres','$apellidos','$cedula', '$edad', '$email', '$telefono', '$feching', '$direccion', '$cargo', '$estado')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:registro_empleados.php');
    }else{
		$_SESSION['guardado']=1;
		header('Location:registro_empleados.php');
	}
?>
