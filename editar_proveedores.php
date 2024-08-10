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
    <title>Editar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="css/estilomodal.css">
    
    <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/tabla_normal.css" rel="stylesheet" type="text/css" />
</head>
    
    <body class="skin-blue">
        <?php include('solomenu.php'); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        EDITAR REGISTRO DE PROVEEDORES
                    </h1>
                </section>
<?php
    $_SESSION['modprov']=$_REQUEST['id'];
    $idprov=$_SESSION['modprov'];
    $consulta="SELECT * from proveedores P INNER JOIN estado E ON P.est_id=E.est_id WHERE P.prov_id='$idprov'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);       
?>
                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><i class="fas fa-edit esp-right"></i> Proveedor</label>
                        </div>
                        <div class="op-right">
                            <!-- <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Empleado</button> -->
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="modificar_proveedores.php" method="post">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php $time2=date('Y-m-d'); echo $time2; ?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Sociedad <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="sociedad" value="<?php echo $row['prov_nombre'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Ruc <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="caja" name="ruc" value="<?php echo $row['prov_ruc'];?>" maxlength="10" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Pais <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="pais" value="<?php echo $row['prov_pais'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Ciudad <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="ciudad" value="<?php echo $row['prov_ciudad'];?>" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Matriz <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="matriz" class="input-style" value="<?php echo $row['prov_matriz'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Sucursal <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="sucursal" value="<?php echo $row['prov_sucursal'];?>" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Actividades <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="actividades" value="<?php echo $row['prov_actividades'];?>" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Teléfono <span class="req">*</span>
                                            </label>
                                            <input type="text" name="telefono" maxlength="10" class="input-style" value="<?php echo $row['prov_telefono'];?>" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Correo <span class="req">*</span>
                                            </label>
                                            <input type="text" name="correo" class="input-style" value="<?php echo $row['prov_correo'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fax <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="fax" value="<?php echo $row['prov_fax'];?>" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Dirección <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="direccion" value="<?php echo $row['prov_direccion'];?>" required>
                                        </div>
                                    </div><br><br>
                                    <div class="contenedor_botones">
                                        <input type="submit" class="botones" value="Modificar">
                                        <a href="registro_proveedores.php" class="botones">Regresar</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                    </div>
            </div>
        </div>

   <!-- MENSAJE DE EDITADO -->
    <?php
        if (isset($_SESSION['editado'])) {
            if ($_SESSION['editado']==1) {
    ?>
        <script>
        alert('Datos Editados Correctamente');
    </script>
    <?php
        unset($_SESSION['editado']); }
        }
    ?>
    <!-- MENSAJE DE NO EDITADO -->
    <?php
        if (isset($_SESSION['noeditado'])) {
            if ($_SESSION['noeditado']==1) {
    ?>
        <script>
        alert('ERROR!! Los Datos NO se editaron');
    </script>
    <?php
        unset($_SESSION['noeditado']); }
        }
    ?>
    <script src="js/validaciones.js"></script>
</body>
</html>
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>