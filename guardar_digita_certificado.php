<?php

include('conexion.php');
session_start();
	
	$empleado=$_SESSION['ide'];
	$feching=$_POST['feching'];

	$tipo_digitalizacion="2";
	
	$entidad=$_POST['tipo_entidad'];
	$categoria="24";
	$sector="7";

	$nombre=$_FILES["archivo"]["name"];
  	$ruta=$_FILES["archivo"]["tmp_name"]; 
  	$destino="img_capacitacion/".$nombre;
  	copy($ruta,$destino);

	$numero_curso=$_POST['numero_curso'];
	$nombre_capacita=$_POST['nombre_capacita'];
	$capacitador=$_POST['capacitador'];
	$fechai=$_POST['fechai'];
	$fechaf=$_POST['fechaf'];
	$descripcion=$_POST['descripcion'];

	$consulta="INSERT INTO digitalizacion (digi_fecha_ingreso, td_id, cat_id, sector_id, digi_archivo, digi_numero_codigo, digi_nombre_motivo, digi_capacitador, digi_fecha_inicio, digi_fecha_fin, digi_descripcion, epl_id, enti_id) VALUES ('$feching','$tipo_digitalizacion','$categoria','$sector', '$destino', '$numero_curso', '$nombre_capacita', '$capacitador', '$fechai', '$fechaf', '$descripcion', '$empleado', '$entidad')";
    $ejec=mysqli_query($con,$consulta);
    if (!$ejec) {
    	$_SESSION['noguardado']=1;
		header('Location:digitalizar_certificados.php');
    }else{
		$_SESSION['guardado']=1;
		header('Location:digitalizar_certificados.php');
	}
?>
