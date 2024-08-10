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
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        AGREGAR CARGO
                    </h1>
                </section>
                <section class="content">
                    <div class="medio1">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><i class="fas fa-address-card esp-right" id="btnasignar"></i> Cargos</label>
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                            <form action="guardar_cargos.php" method="post">
                                <div class="fila-arriba-grande">
                                    <div class="contenedor-input">
                                        <label class="label-style">
                                            Ingrese un nuevo cargo <span class="req">*</span>
                                        </label>
                                        <input type="text" class="input-style" id="cajas" name="nuevocargo" required >
                                    </div>
                                </div><br><br>
                                <div class="contenedor_boton">
                                    <input type="submit" class="botones" value="Guardar">
                                    <a href="inicio.php" class="botones">Regresar</a>
                                </div>
                            </form>
                        </div>
                        <div class="content_table">
                            <br><br>
                            <table class="tabla">
                                <thead>
                                    <tr>
                                        <th>Cargo</th>
                                        <th>Opciones</th>   
                                    </tr>
                                </thead>
                                <tr>
                                    <?php 
                                        $cons2="SELECT * from cargo ";
                                        $ejec2=mysqli_query($con,$cons2);
                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                    ?>
                                    <td><?php echo $row2['crg_dscrp']; ?></td>
                                    <td>
                                        <div class="optabla2">
                                        <a href="editar_cargo.php?id=<?php echo $row2['crg_id']; ?>" title="Editar"><i class="fas fa-pencil-alt esp-right"></i></a>
                                        <a href="#" onclick="deletelog(<?php echo $row2['epl_id'];?>)" title="Eliminar"><i class="fas fa-trash-alt esp-right"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php   } ?>
                            </table>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            $('.tabla').DataTable();
        });
    </script>
    <!-- MENSAJE DE GUARDADO -->
    <?php
        if (isset($_SESSION['guardado'])) {
            if ($_SESSION['guardado']==1) {
    ?>
        <script>
        alert('Cargo Agregado con Éxito !!');
    </script>
    <?php
        unset($_SESSION['guardado']); }
        }
    ?>
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
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>