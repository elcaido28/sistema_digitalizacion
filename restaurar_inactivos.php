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
    <title>Restaurar</title>
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
    <script src="js/selecopciones.js"></script>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>RESTAURAR INACTIVOS</h1>
            </section>

            <section class="content">
                <div class="grande">
                    <div class="contenedor-opciones-restaurar">
                        <div class="opmenu tab-primera active"><a href="#empleados">Empleados</a></div>
                        <div class="opmenu tab-segunda"><a href="#clientes">Clientes</a></div>
                        <div class="opmenu tab-tercera"><a href="#proveedores">Proveedores  </a></div>
                    </div>

                    <!-- Contenido de los Formularios -->
                    <div class="contenedor-formularios">
                    <div class="contenido-tab">
                        <!-- Empleados -->
                        <div id="empleados">
                            <h1>Empleados</h1>
                            <div class="content_table">
                                <table class="tabla">
                                    <thead>
                                        <tr>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
                                            <th>Edad</th>
                                            <th>Cedula</th>     
                                            <th>Email</th>
                                            <th>Cargo</th>
                                            <th>Opciones</th>   
                                        </tr>
                                    </thead>
                                    <tr>
                                        <?php 
                                            $cons="SELECT * from empleados E INNER JOIN cargo C ON E.crg_id=C.crg_id WHERE E.est_id=2";
                                            $ejec=mysqli_query($con,$cons);
                                            while ($row=mysqli_fetch_array($ejec)) {
                                        ?>
                                        <td><?php echo $row['epl_apellidos']; ?></td>
                                        <td><?php echo $row['epl_nombres']; ?></td>
                                        <td><?php echo $row['epl_edad']; ?></td>
                                        <td><?php echo $row['epl_cedula']; ?></td>
                                        <td><?php echo $row['epl_correo']; ?></td>
                                        <td><?php echo $row['crg_dscrp']; ?></td>
                                        <td><div class="optabla2">
                                                <a href="restlogepl.php?id=<?php echo $row['epl_id']; ?>" title="Restaurar Empleado"><i class="fas fa-sync-alt esp-right"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php   } ?>
                                </table>
                            </div>
                        </div>

                        <!-- Clientes -->
                        <div id="clientes" class="esconder">
                            <h1>Clientes</h1>
                            <div class="content_table">
                                <table class="tabla">
                                    <thead>
                                        <tr>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
                                            <th>Edad</th>
                                            <th>Cedula</th>     
                                            <th>Email</th>
                                            <th>Opciones</th>   
                                        </tr>
                                    </thead>
                                    <tr>
                                        <?php 
                                            $cons2="SELECT * from clientes C WHERE C.est_id=2";
                                            $ejec2=mysqli_query($con,$cons2);
                                            while ($row2=mysqli_fetch_array($ejec2)) {
                                        ?>
                                        <td><?php echo $row2['cl_apellidos']; ?></td>
                                        <td><?php echo $row2['cl_nombres']; ?></td>
                                        <td><?php echo $row2['cl_edad']; ?></td>
                                        <td><?php echo $row2['cl_cedula']; ?></td>
                                        <td><?php echo $row2['cl_correo']; ?></td>
                                        <td><div class="optabla2">
                                                <a href="restlogcli.php?id=<?php echo $row2['cl_id']; ?>" title="Restaurar Cliente"><i class="fas fa-sync-alt esp-right"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php   } ?>
                                </table>
                            </div>
                        </div>

                        <!-- Proveedores -->
                        <div id="proveedores" class="esconder">
                            <h1>Proveedores</h1>
                            <div class="content_table">
                                <table class="tabla">
                                    <thead>
                                        <tr>
                                            <th>Proveedor</th>
                                            <th>Ciudad</th>
                                            <th>Ruc</th>
                                            <th>Actividad</th>     
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Opciones</th>   
                                        </tr>
                                    </thead>
                                    <tr>
                                        <?php 
                                            $cons3="SELECT * from proveedores P WHERE P.est_id=2";
                                            $ejec3=mysqli_query($con,$cons3);
                                            while ($row3=mysqli_fetch_array($ejec3)) {
                                        ?>
                                        <td><?php echo $row3['prov_nombre']; ?></td>
                                        <td><?php echo $row3['prov_ciudad']; ?></td>
                                        <td><?php echo $row3['prov_ruc']; ?></td>
                                        <td><?php echo $row3['prov_actividades']; ?></td>
                                        <td><?php echo $row3['prov_telefono']; ?></td>
                                        <td><?php echo $row3['prov_correo']; ?></td>
                                        <td><div class="optabla2">
                                                <a href="restlogprov.php?idp=<?php echo $row3['prov_id']; ?>" title="Restaurar Proveedores"><i class="fas fa-sync-alt esp-right"></i></a>
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
            </div>
        </div>
    <script>
        $(document).ready(function(){
            $('.tabla').DataTable();
        });
    </script>
    
    <script src="js/jquery.dataTables.min.js"></script>
    
</body>
</html>
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>