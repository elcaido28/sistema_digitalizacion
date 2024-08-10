<?php

include('conexion.php');
session_start();
	$nuevocargo=$_POST['nuevocargo'];

	$consulta="INSERT INTO cargo (crg_dscrp) VALUES ('$nuevocargo')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header("Location:agregar_cargos.php");
    }else{
		$_SESSION['guardado']=1;
		header("Location:agregar_cargos.php");
	}
?>
