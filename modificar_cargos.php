<?php

include('conexion.php');
session_start();
	
	$idcargo=$_SESSION['modcrg'];
	$nuevocargo=$_POST['nuevocargo'];

	$consulta="UPDATE cargo SET crg_dscrp='$nuevocargo' WHERE crg_id='$idcargo'";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:editar_cargo.php?id='.$idcargo);
    }else{
		$_SESSION['guardado']=1;
		header('Location:editar_cargo.php?id='.$idcargo);
	}
?>
