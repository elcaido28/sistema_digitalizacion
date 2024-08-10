<?php

include('conexion.php');
session_start();
	
	$id=$_SESSION['modid'];
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$perfil=$_POST['perfil'];

	echo $id;
	echo "<br>";
	echo $usuario;
	echo "<br>";
	echo $clave;
	echo "<br>";
	echo $perfil;
	echo "<br>";

	$consulta="UPDATE usuarios SET usu_usuario='$usuario', usu_clave='$clave', tp_id='$perfil' WHERE epl_id='$id'";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['usunoedit']=1;
		header('Location:editar_empleados.php?id='.$id);
    }else{
		$_SESSION['usueditado']=1;
		header('Location:editar_empleados.php?id='.$id);
	}
?>
