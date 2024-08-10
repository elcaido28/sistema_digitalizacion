<?php

include('conexion.php');
session_start();
	$ide=$_SESSION['eusu'];
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$perfil=$_POST['perfil'];

	echo $ide, $usuario, $clave, $perfil;

	$consulta="INSERT INTO usuarios (usu_usuario, usu_clave, epl_id, tp_id) VALUES ('$usuario','$clave','$ide','$perfil')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header("Location:asignar_usuario.php?=$ide");
    }else{
		$_SESSION['guardado']=1;
		header("Location:registro_empleados.php");
	}
?>
