<?php

include('conexion.php');
session_start();	

	$idcap=$_SESSION['modidcap'];

	$sector=$_POST['sector'];

	$nombre=$_FILES["archivo"]["name"];
  	$ruta=$_FILES["archivo"]["tmp_name"]; 
  	$destino="img_capacitacion/".$nombre;
  	copy($ruta,$destino);

	$numero_capacita=$_POST['numero_capacita'];
	$nombre_capacita=$_POST['nombre_capacita'];
	$capacitador=$_POST['capacitador'];
	$fechai=$_POST['fechai'];
	$fechaf=$_POST['fechaf'];
	$descripcion=$_POST['descripcion'];

	if ($detino == ""){
  		$consulta="UPDATE digitalizacion SET sector_id='$sector', digi_numero_codigo='$numero_capacita', digi_nombre_motivo='$nombre_capacita', digi_capacitador='$capacitador', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idcap'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_capacitacion.php?id='.$idcap);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_capacitacion.php?id='.$idcap);
		}
  	}else{
  		$consulta="UPDATE digitalizacion SET sector_id='$sector', digi_archivo='$destino', digi_numero_codigo='$numero_capacita', digi_nombre_motivo='$nombre_capacita', digi_capacitador='$capacitador', digi_fecha_inicio='$fechai', digi_fecha_fin='$fechaf', digi_descripcion='$descripcion' WHERE digi_id='$idcap'";
	    $ejec=mysqli_query($con,$consulta);
	    if (!$ejec) {
	    	$_SESSION['noeditado']=1;
			header('Location:editar_capacitacion.php?id='.$idcap);
	    }else{
			$_SESSION['editado']=1;
			header('Location:editar_capacitacion.php?id='.$idcap);
		}
  	}
?>
