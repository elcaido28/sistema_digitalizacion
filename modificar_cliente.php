<?php

include('conexion.php');
session_start();
	
	$cliente=$_SESSION['modidcli'];

	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$cedula=$_POST['cedula'];
	$fechnac=$_POST['fechnac'];
	$edad=$_POST['edad'];
	$telefono=$_POST['telefono'];
	$email=$_POST['correo'];
	$direccion=$_POST['direccion'];

	$consulta="UPDATE clientes SET cl_nombres='$nombres', cl_apellidos='$apellidos', cl_cedula='$cedula', cl_fecha_nacimiento='$fechnac', cl_edad='$edad', cl_telefono='$telefono', cl_correo='$email', cl_direccion='$direccion' WHERE cl_id='$cliente'";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noeditado']=1;
		header('Location:editar_clientes.php?id='.$cliente);
    }else{
		$_SESSION['editado']=1;
		header('Location:editar_clientes.php?id='.$cliente);
	}

?>
