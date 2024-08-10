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
                        REGISTRO DE PROVEEDORES
                    </h1>
                </section>

                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><span class="mif-search mif-1x fg-pink"> </span> Proveedoress</label>
                        </div>
                        <div class="op-right">
                            <!-- <span class="mif-pencil mif-2x fg-pink"></span>
                            <input type="button" value="Nuevo Empleado"> -->
                            <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Proveedor</button>
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab" id="contenido_tab">
                                <form action="guardar_proveedor.php" method="post">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php $time2=date('Y-m-d'); echo $time2; ?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Sociedad <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="sociedad" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Ruc <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="caja" maxlength="10" name="ruc" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Pais <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="pais" maxlength="10" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Ciudad <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="ciudad" maxlength="10" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Matriz <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="matriz" class="input-style" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Sucursal <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="sucursal" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Actividades <span class="req">*</span>
                                            </label>
                                            <input type="text" name="actividades" class="input-style" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Teléfono <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" maxlength="10" id="cajas" name="telefono" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Correo <span class="req">*</span>
                                            </label>
                                            <input type="email" id="cajas" name="correo" class="input-style" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Fax <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="fax" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Dirección <span class="req">*</span>
                                            </label>
                                            <input type="text" name="direccion" class="input-style" required >
                                        </div>
                                    </div><br><br>
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
                                        <th>Proveedor</th>
                                        <th>Ciudad</th>
                                        <th>Ruc</th>
                                        <th>Telefono</th>     
                                        <th>Email</th>
                                        <th>Opciones</th>   
                                    </tr>
                                </thead>
                                <tr>
                                    <?php 
                                        $cons2="SELECT * from proveedores P WHERE P.est_id=1";
                                        $ejec2=mysqli_query($con,$cons2);
                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                    ?>
                                    <td><?php echo $row2['prov_nombre']; ?></td>
                                    <td><?php echo $row2['prov_ciudad']; ?></td>
                                    <td><?php echo $row2['prov_ruc']; ?></td>
                                    <td><?php echo $row2['prov_telefono']; ?></td>
                                    <td><?php echo $row2['prov_correo']; ?></td>
                                    <td><div class="optabla2">
                                        <a href="editar_proveedores.php?id=<?php echo $row2['prov_id']; ?>" title="Editar Proveedor"><i class="fas fa-pencil-alt esp-right"></i></a>
                                        <a href="#" onclick="deletelog(<?php echo $row2['prov_id'];?>)" title="Eliminar"><i class="fas fa-trash-alt esp-right"></i></a></div>
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
    <script type="text/javascript">
        document.getElementById("contenido_tab").style.display = "none";
        function mostrar(){
            document.getElementById("contenido_tab").style.display = "block";
        }
        function ocultar(){
            document.getElementById("contenido_tab").style.display = "none";
        }
        $('.boton1234').click(function(e){
        
            var desl= document.getElementById("contenido_tab");

            if(desl.style.display =="none"){
                mostrar();
            }else {
                ocultar();
            }
        })
    </script>
    <script>
        function deletelog(id_delete){
            //var confirmacion = confirm('Desea el iminar el paciente ' + id_delete + '?');
            var confirmacion = confirm('Esta seguro de eliminar al paciente ?');
            if(confirmacion){
                window.location = "dellogproveedor.php?id="+ id_delete;
            }
        }
    </script>
    <!-- MENSAJE DE GUARDADO -->
    <?php
        if (isset($_SESSION['guardado'])) {
            if ($_SESSION['guardado']==1) {
    ?>
        <script>
        alert('Proveedor Registrado con Éxito !!');
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
    <!-- MENSAJE DE ELIMINADO DE PROVEEDOR -->
    <?php
        if (isset($_SESSION['delprov'])) {
            if ($_SESSION['delprov']==1) {
    ?>
    <script>
        alert('El Proveedor ha sido dado de Baja.');
    </script>
    <?php
        unset($_SESSION['delprov']); }
        }
    ?>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/label_arriba_abajo.js"></script>
    <script src="js/validaciones.js"></script>
</body>
</html>
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>