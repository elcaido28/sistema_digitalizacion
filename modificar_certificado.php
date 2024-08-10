<?php

include('conexion.php');
session_start();	

	$idcert=$_SESSION['modidcer'];

	$entidad=$_POST['tipo_entidad'];

	$nombre=$_FILES["archivo"]["name"];
  	$ruta=$_FILES["archivo"]["tmp_name"]; 
  	$destino="img_capacitacion/".$nombre;
  	copy($ruta,$destino);

	$numero_capacita=$_POST['numero_curso'];
	$nombre_capacita=$_POST['nombre_capacita'];
	$capacitador=$_POST['capacitador'];
	$fechai=$_POST['fechai'];
	$fechaf=$_POST['fechaf'];
	$descripcion=$_POST['descripcion'];

	if ($detino == ""){
  		$consulta="UPDATE digitalizacion SET enti_id='$entidad', digi_numero_codigo='$numero_capacita', digi_nombre_motivo='$nombre_capacita', digi_capacitador='$capacitador', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idcert'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_certificado.php?id='.$idcert);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_certificado.php?id='.$idcert);
		}
  	}else{
  		$consulta="UPDATE digitalizacion SET enti_id='$entidad', digi_archivo='$destino', digi_numero_codigo='$numero_capacita', digi_nombre_motivo='$nombre_capacita', digi_capacitador='$capacitador', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idcert'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_certificado.php?id='.$idcert);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_certificado.php?id='.$idcert);
		}
  	}
?>
