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

if(isset($_SESSION['ide'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body class="skin-blue">
        <?php include('solomenu.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        BIENVENIDOS AL SISTEMA
                    </h1>
                </section>

                <!-- Main content -->
                <section class="contenti">
                    <h4 class="page-header">
                        OPCIONES PRINCIPALES <!-- <small>seleccione la opcion que desea editar o Consultar <code>!seleccione correctamente¡</code><code></code></small> -->
                   </h4>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        Digitalización
                                    </h3>
                                    <p>
                                        Agregar o editar Archivos
                                    </p>
                                </div>

                                <div class="icon"><a href="registrot.php"  id="alimen" data-icon="custom" data-transition="slide" data-prefetch="true" data-id="alimen" class="small-box-footer"><img src="../css/images/empleado2.png"  width='50' height='50'  alt="">
                                </div>
                                    IR <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

            <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       Búsqueda<sup style="font-size: 12px"></sup>
                                    </h3>
                                    <p>
                                       Búsqueda de Digitalizaciones
                                    </p>
                                </div>
                                <div class="icon">
                                    <a href="busqueda_digitalizacion.php" class="small-box-footer"><img src="../css/images/prestacion2.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="busqueda_digitalizacion.php" class="small-box-footer">
                                    IR <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>Generar Doc.<sup style="font-size: 12px"></sup></h3>
                                    <p>
                                        Lista de Documentos
                                    </p>
                                </div>
                                <div class="icon">
                                    <a href="liquidacionlista2.php" class="small-box-footer"><img src="../css/images/liquida.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="liquidacionlista2.php" class="small-box-footer">
                                    IR <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        Clientes
                                    </h3>
                                    <p>
                                        Agregar y consultar clientes
                                    </p>
                                </div>
                                <div class="icon">
                                     <a href="registro_clientes.php" class="small-box-footer"><img src="../css/images/liquidacion2.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="registro_clientes.php" class="small-box-footer">
                                    IR <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        </div>

<!-- MENSAJE DE INGRESO -->
<?php
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']==1) {
?>
    <script>
    alert('Ingreso Exitoso... BIENVENIDO !!!');
</script>
<?php
    unset($_SESSION['login']); }
    }
?>
    </body>
</html>
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>