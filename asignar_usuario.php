<?php 
session_start();
//error_reporting(0);
include('conexion.php');
$varsesion = $_SESSION['ide'];
if ($varsesion == null || $varsesion = '') {
    echo 'Usted no tiene autorización';
    header("Location:login.php");
    //die();
}

if(isset($_SESSION['ide'])){
    if (isset($_REQUEST['id'])) {
        $_SESSION['eusu']=$_REQUEST['id'];
        $ide=$_SESSION['eusu'];
    }

    $consulta="SELECT * from usuarios U INNER JOIN empleados E ON U.epl_id=E.epl_id WHERE U.epl_id='$ide' ";
    $ejecuta=mysqli_query($con,$consulta);
    $fila=mysqli_fetch_array($ejecuta);
    if ($fila<1) {
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registros</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    
    <body class="skin-blue">
        <?php include('solomenu.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ASIGNAR USUARIO
                    </h1>
                </section>
                <section class="content">
                    <div class="medio">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><i class="fas fa-user-plus esp-right" id="btnasignar"></i>Usuario</label>
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="guardar_usuario.php" method="post">
                                    <div class="fila-arriba-grande">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Usuario <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="usuario" required >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="fila-arriba-grande">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Contraseña <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="clave" required >
                                        </div>
                                    </div>
                                    <br>
                                    <div class="fila-arriba-grande">
                                        <div class="contenedor-input">
                                            <select id="" name="perfil" class="input-style">
                                                <option value="0">Seleccionar Perfil</option>
                                                <?php 
                                                    $cons="SELECT * from tipo_perfil";
                                                    $ejec=mysqli_query($con,$cons);
                                                    if(!$ejec){
                                                        echo "hay un error en".$cons;
                                                    }else{
                                                        while ($row=mysqli_fetch_array($ejec)) {
                                                            echo "<option value='".$row['tp_id']."'>";
                                                            echo $row['tp_dscrp']; echo "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div><br><br>
                                    <div class="contenedor_boton">
                                        <input type="submit" class="botones" value="Guardar">
                                        <a href="registro_empleados.php" class="botones">Regresar</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    <!-- MENSAJE DE NO GUARDADO -->
    <?php
        if (isset($_SESSION['noguardado'])) {
            if ($_SESSION['noguardado']==1) {
    ?>
        <script>
        alert('Ocurrio un error intentelo de nuevo');
    </script>
    <?php
        unset($_SESSION['noguardado']); }
        }
    ?>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/label_arriba_abajo.js"></script>
    <script src="js/validaciones.js"></script>
</body>
</html>
<?php 
    }else{
        $_SESSION['mnsj_yausu']=1;
        header("Location:registro_empleados.php");
    }
    }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>