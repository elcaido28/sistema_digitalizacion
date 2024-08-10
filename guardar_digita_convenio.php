<?php

include('conexion.php');
session_start();
	
	$empleado=$_SESSION['ide'];
	$feching=$_POST['feching'];

	$entidad=$_POST['entidad'];
	$categoria=$_POST['categorias'];
	$sector='7';
	$tipo_digitalizacion='3';

	$nombre=$_FILES["archivo"]["name"];
  	$ruta=$_FILES["archivo"]["tmp_name"]; 
  	$destino="img_capacitacion/".$nombre;
  	copy($ruta,$destino);

	$numero_convenio=$_POST['numero_convenio'];
	$motivo=$_POST['motivo'];
	$capacitador="";
	$fechai=$_POST['fechai'];
	$fechaf=$_POST['fechaf'];
	$descripcion=$_POST['descripcion'];

	$consulta="INSERT INTO digitalizacion (digi_fecha_ingreso, td_id, cat_id, sector_id, digi_archivo,digi_numero_codigo, digi_nombre_motivo, digi_capacitador, digi_fecha_inicio, digi_fecha_fin, digi_descripcion, epl_id, enti_id) VALUES ('$feching','$tipo_digitalizacion','$categoria','$sector', '$destino', '$numero_convenio', '$motivo', '$capacitador', '$fechai', '$fechaf', '$descripcion', '$empleado', '$entidad')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:digitalizar_convenios.php');
    }else{
		$_SESSION['guardado']=1;
		header('Location:digitalizar_convenios.php');
	}
?>
