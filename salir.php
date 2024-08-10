<?php
	session_start();
	
	unset($_SESSION['ide']);
	unset($_SESSION['tnom']);
	unset($_SESSION['tape']);
	unset($_SESSION['perfil']);
	unset($_SESSION['cargo']); 	
	unset($_SESSION['estado']);

	unset($_SESSION['login']);
	unset($_SESSION['nologin']);

	unset($_SESSION['noactivo']);

	sleep(1);
	$_SESSION['mnsj_salida']=1;
	header("Location:login.php");
?>
