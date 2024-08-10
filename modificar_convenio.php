<?php

include('conexion.php');
session_start();	

	$idconv=$_SESSION['modidconv'];

	$entidad=$_POST['entidad'];
	$categoria=$_POST['categorias'];

	$nombre=$_FILES["archivo"]["name"];
  	$ruta=$_FILES["archivo"]["tmp_name"]; 
  	$destino="img_capacitacion/".$nombre;
  	copy($ruta,$destino);

	$numero_convenio=$_POST['numero_convenio'];
	$nombre_motivo=$_POST['motivo'];
	$fechai=$_POST['fechai'];
	$fechaf=$_POST['fechaf'];
	$descripcion=$_POST['descripcion'];

	if ($detino == ""){
  		$consulta="UPDATE digitalizacion SET enti_id='$entidad', cat_id='$categoria', digi_numero_codigo='$numero_convenio', digi_nombre_motivo='$nombre_motivo', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idconv'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_convenio.php?id='.$idconv);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_convenio.php?id='.$idconv);
		}
  	}else{
  		$consulta="UPDATE digitalizacion SET enti_id='$entidad', cat_id='$categoria', digi_numero_codigo='$numero_convenio', digi_nombre_motivo='$nombre_motivo', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idconv'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_convenio.php?id='.$idconv);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_convenio.php?id='.$idconv);
		}
  	}
?>
