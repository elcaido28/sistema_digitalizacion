n<?php

include('conexion.php');
session_start();
	
	$idprov=$_SESSION['modprov'];

	$sociedad=$_POST['sociedad'];
	$ruc=$_POST['ruc'];
	$pais=$_POST['pais'];
	$ciudad=$_POST['ciudad'];
	$matriz=$_POST['matriz'];
	$sucursal=$_POST['sucursal'];
	$actividades=$_POST['actividades'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$fax=$_POST['fax'];
	$direccion=$_POST['direccion'];

	$consulta="UPDATE proveedores SET prov_nombre='$sociedad', prov_pais='$pais', prov_ciudad='$ciudad', prov_ruc='$ruc', prov_matriz='$matriz', prov_sucursal='$sucursal', prov_actividades='$actividades', prov_telefono='$telefono', prov_correo='$correo', prov_fax='$fax', prov_direccion='$direccion' WHERE prov_id='$idprov'";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noeditado']=1;
		header('Location:editar_proveedores.php?id='.$idprov);
    }else{
		$_SESSION['editado']=1;
		header('Location:editar_proveedores.php?id='.$idprov);
	}

?>
