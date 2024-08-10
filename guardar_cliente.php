<?php

include('conexion.php');
session_start();
	
	$empleado=$_SESSION['ide'];
	$feching=$_POST['feching'];

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$cedula=$_POST['cedula'];
	$fechnac=$_POST['fechnac'];
	$edad=$_POST['edad'];
	$telefono=$_POST['telefono'];
	$email=$_POST['correo'];
	$direccion=$_POST['direccion'];
	$estado=1;

	$consulta="INSERT INTO clientes (cl_feching, cl_nombres, cl_apellidos, cl_cedula, cl_fecha_nacimiento, cl_edad, cl_telefono, cl_correo, cl_direccion, epl_id, est_id) VALUES ('$feching', '$nombres', '$apellidos', '$cedula', '$fechnac', '$edad', '$telefono', '$email', '$direccion', '$empleado', '$estado')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:registro_clientes.php');
    }else{
		$_SESSION['guardado']=1;
		header('Location:registro_clientes.php');
	}
?>
