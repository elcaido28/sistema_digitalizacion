n<?php

include('conexion.php');
session_start();
	
	$empleado=$_SESSION['ide'];
	$feching=$_POST['feching'];
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
	$estado=1;

	$consulta="INSERT INTO proveedores (prov_nombre, prov_pais, prov_ciudad, prov_ruc, prov_matriz, prov_sucursal, prov_actividades, prov_telefono, prov_correo, prov_fax, prov_direccion, prov_fechai, epl_id, est_id) VALUES ('$sociedad','$pais','$ciudad', '$ruc', '$matriz', '$sucursal', '$actividades', '$telefono', '$correo', '$fax', '$direccion', '$feching', '$empleado', '$estado')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:registro_proveedores.php');
    }else{
		$_SESSION['guardado']=1;
		header('Location:registro_proveedores.php');
	}
?>
