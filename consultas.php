<?php
	include('conexion.php');
    $cons="SELECT * FROM cargo";
    $prep=mysqli_query($con,$cons);
    if(!$prep){
    	echo "hay un error en".$cons;
    }else{
    	$lista=mysqli_fetch_array($prep);
    }
?>