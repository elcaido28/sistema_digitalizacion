<?php
	session_start();
	include('conexion.php');

	if (isset($_POST['usuario']) AND isset($_POST['pass'])) {

		$usuario=$_POST['usuario'];
		$clave=$_POST['pass'];
		
		$consulta="SELECT * FROM empleados E INNER JOIN cargo C ON E.crg_id=C.crg_id INNER JOIN estado ES ON E.est_id=ES.est_id INNER JOIN usuarios U ON E.epl_id=U.epl_id INNER JOIN tipo_perfil TP ON U.tp_id=TP.tp_id WHERE U.usu_usuario='$usuario' and U.usu_clave='$clave'";
		// $consulta="SELECT * FROM usuarios U INNER JOIN tipo_perfil TP ON U.tp_id=TP.tp_id INNER JOIN empleados E ON U.epl_id=E.epl_id INNER JOIN cargo C ON E.crg_id=C.crg_id INNER JOIN estado ES ON E.est_id=ES.est_id WHERE U.usu_usuario='$usuario' and U.usu_clave='$clave'";
		$resultado=mysqli_query($con, $consulta);
		$filas=mysqli_num_rows($resultado);
		if($filas>0){
			$row = mysqli_fetch_array($resultado);
			if($row['est_id']==1) {
				$_SESSION['ide']=$row['epl_id'];
				$_SESSION['tnom']=$row['epl_nombres'];
				$_SESSION['tape']=$row['epl_apellidos'];
				$_SESSION['perfil']=$row['tp_dscrp'];
				$_SESSION['cargo']=$row['crg_dscrp']; 	
				$_SESSION['estado']=$row['est_dscrp'];

				$_SESSION['login']=1;
				echo $_SESSION['ide'];
				header("Location:inicio.php");
			}else{
				$_SESSION['noactivo']=1;
				header("Location:login.php");
			}	
		}else{
			$_SESSION['nologin']=1;
			header("Location:login.php");
		}
	}
	mysqli_free_result($resultado);
	mysqli_close($con);

?>