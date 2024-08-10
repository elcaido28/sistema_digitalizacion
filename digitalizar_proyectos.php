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
    <title>Digitalizaciones</title>
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
                        PROYECTOS
                    </h1>
                </section>

                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><!-- <i class="fas fa-street-view"></i> --> <i class="fas fa-people-carry"></i> Comunidad</label>
                        </div>
                        <div class="op-right">
                            <!-- <span class="mif-pencil mif-2x fg-pink"></span>
                            <input type="button" value="Nuevo Empleado"> -->
                            <!-- <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Empleado</button> -->
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="guardar_empleado.php" method="post">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php $time2=date('Y-m-d'); echo $time2; ?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Tipo de Capacitación <span class="req">*</span>
                                            </label>
                                            <select name="cargo" id="cargo" name="cargo" class="input-style">
                                                <option value="0">...</option>
                                                <option value="1">Estimulación Temprana</option>
                                                <option value="2">Tiendas más Eficientes</option>
                                                <option value="3">Centro de Desarrollo Empresarial y Comunitario</option>
                                                <option value="4">Centro de Expresión Musical</option>
                                                <option value="5">Escuela de Danza</option>
                                                <option value="6">Escuela de Taekwondo</option>
                                                <option value="7">Proyecto de Actividades Recreativas</option>
                                                <option value="7">Microempresas Asociativas</option>
                                            </select>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Tipo de Documento <span class="req">*</span>
                                            </label>
                                            <select name="cargo" id="cargo" name="cargo" class="input-style">
                                                <option value="0">...</option>
                                                <option value="1">Plan de Actividades, Informes.</option>
                                                <option value="2">Curriculum(Capacitador)</option>
                                                <option value="3">Lista de los Capacitados</option>
                                                <option value="4">Materiales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                No.Capacitazión <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="numero_capacita" class="input-style" maxlength="2" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Nombre de la Capazitación <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="nombre_capacita" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Capacitador <span class="req">*</span>
                                            </label>
                                            <input type="text" name="telefono" class="input-style" maxlength="10" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Inicio <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="direccion" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Finalización <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="direccion" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <input type="text" name="telefono" class="input-style" maxlength="10" required >
                                        </div>
                                    </div>
                                    <div class="contenedor_boton">
                                        <input type="submit" class="button button-block" value="Guardar">
                                    </div>
                                </form>
                        </div>
                        <div class="content_table">
                            <br><br>
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
                                        $cons2="SELECT * from empleados E INNER JOIN cargo C ON E.crg_id=C.crg_id WHERE E.est_id=1";
                                        $ejec2=mysqli_query($con,$cons2);
                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                    ?>
                                    <td><?php echo $row2['epl_apellidos']; ?></td>
                                    <td><?php echo $row2['epl_nombres']; ?></td>
                                    <td><?php echo $row2['epl_edad']; ?></td>
                                    <td><?php echo $row2['epl_cedula']; ?></td>
                                    <td><?php echo $row2['epl_correo']; ?></td>
                                    <td><?php echo $row2['crg_dscrp']; ?></td>
                                    <td><div class="optabla2">
                                        <a href="asignar_usuario.php?id=<?php echo $row2['epl_id']; ?>" title="Agregar Usuario" id="cualquiera"><i class="fas fa-user-plus esp-right" id="btnasignar"></i></a>
                                        <a href="editar_empleados.php?id=<?php echo $row2['epl_id']; ?>" title="Editar"><i class="fas fa-pencil-alt esp-right"></i></a>
                                        <a href="#" onclick="deletelog(<?php echo $row2['epl_id'];?>)" title="Eliminar"><i class="fas fa-trash-alt esp-right"></i></a></div>
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
    <script>
        function deletelog(id_delete){
            //var confirmacion = confirm('Desea el iminar el paciente ' + id_delete + '?');
            var confirmacion = confirm('Esta seguro de eliminar al paciente ?');
            if(confirmacion){
                window.location = "dellogemple.php?id="+ id_delete;
            }
        }
    </script>
    <!-- MENSAJE DE GUARDADO -->
    <?php
        if (isset($_SESSION['guardado'])) {
            if ($_SESSION['guardado']==1) {
    ?>
        <script>
        alert('El Empleado esta Registrado');
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
    <!-- MENSAJE DE YA EXISTE USUARIO -->
    <?php
        if (isset($_SESSION['mnsj_yausu'])) {
            if ($_SESSION['mnsj_yausu']==1) {
    ?>
    <script>
        alert('El empleado ya tiene un usuario para ingresar al Sistema');
    </script>
    <?php
        unset($_SESSION['mnsj_yausu']); }
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