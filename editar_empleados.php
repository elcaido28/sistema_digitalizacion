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
                        EDITAR REGISTRO DE EMPLEADOS
                    </h1>
                </section>
<?php
    $_SESSION['modid']=$_REQUEST['id'];
    $ide=$_SESSION['modid'];
    $consulta="SELECT * from empleados E INNER JOIN estado ES ON E.est_id=ES.est_id INNER JOIN cargo C ON E.crg_id=C.crg_id WHERE E.epl_id='$ide'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);       
?>
                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><i class="fas fa-edit esp-right"></i> Empleado</label>
                        </div>
                        <div class="op-right">
                            <!-- <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Empleado</button> -->
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="modificar_empleados.php" method="post">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php $time2=date('Y-m-d'); echo $time2; ?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Nombres <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="nombres" value="<?php echo $row['epl_nombres'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Apellidos <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="caja" name="apellidos" value="<?php echo $row['epl_apellidos'];?>" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Cédula <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="cedula" value="<?php echo $row['epl_cedula'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Cargo <span class="req">*</span>
                                            </label>
                                            <select name="cargo" id="cargo" name="cargo" class="input-style">
                                                <option value="<?php echo $row['crg_id'];?>"><?php echo $row['crg_dscrp'];?></option>
                                                <?php 
                                                    $cons2="SELECT * from cargo";
                                                    $ejec2=mysqli_query($con,$cons2);
                                                    if(!$ejec2){
                                                        echo "hay un error en".$cons2;
                                                    }else{
                                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                                            echo "<option value='".$row2['crg_id']."'>";
                                                            echo $row2['crg_dscrp']; echo "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Edad <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="edad" class="input-style" value="<?php echo $row['epl_edad'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Correo <span class="req">*</span>
                                            </label>
                                            <input type="email" class="input-style" id="cajas" name="correo" value="<?php echo $row['epl_correo'];?>" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Teléfono <span class="req">*</span>
                                            </label>
                                            <input type="text" name="telefono" class="input-style" value="<?php echo $row['epl_telefono'];?>" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Dirección <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="direccion" value="<?php echo $row['epl_direccion'];?>" required>
                                        </div>
                                    </div>
                                    <div class="contenedor_botones">
                                        <input type="submit" class="botones" value="Modificar">
                                        <a href="registro_empleados.php" class="botones">Regresar</a>
                                    </div>
                                </form>
                        </div>
                        <div class="content_table">
                            <br><br>
                            <table class="tabla">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>
                                        <th>Opciones</th>   
                                    </tr>
                                </thead>
                                <tr>
                                    <?php 
                                        $cons3="SELECT * from usuarios U INNER JOIN empleados E ON U.epl_id=E.epl_id WHERE E.epl_id='$ide'";
                                        $ejec3=mysqli_query($con,$cons3);
                                        while ($row3=mysqli_fetch_array($ejec3)) {
                                    ?>
                                    <td><?php echo $row3['usu_usuario']; ?></td>
                                    <td><?php echo $row3['usu_clave']; ?></td>
                                    <td>
                                        <a href="#openmodal" class="btn_tabla" title="Editar"><i class="fas fa-pencil-alt esp-right"></i></a>
                                </tr>
                                <?php   } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="contenedor-modal">
        <section id="openmodal" class="modalDialog">
            <section class="modal">
                <div class="titulo_modal">
                    <a href="#close" class="close"> X </a>
                    <h2> Editar Usuario y contraseña </h2>
                </div>
                <form class="frmm" action="modificar_usu.php" method="POST">
                    <?php 
                        $cons4="SELECT * from empleados E INNER JOIN usuarios U ON U.epl_id=E.epl_id INNER JOIN tipo_perfil TP ON U.tp_id=TP.tp_id WHERE E.epl_id='$ide'";
                        $ejec4=mysqli_query($con,$cons4);
                        $row4=mysqli_fetch_array($ejec4);
                    ?>
                    <div class="mod">
                        <div class="contenedor-input">
                            <label class="label-style active">
                                Usuario <span class="req">*</span>
                            </label>
                            <input type="text" id="cajas" name="usuario" class="input-style" value="<?php echo $row4['usu_usuario']; ?>" required >
                        </div>
                    </div>
                    <div class="mod">
                        <div class="contenedor-input">
                            <label class="label-style active">
                                Contraseña <span class="req">*</span>
                            </label>
                            <input type="text" id="cajas" name="clave" class="input-style" value="<?php echo $row4['usu_clave']; ?>" required >
                        </div>
                    </div>
                    <div class="mod">
                        <div class="contenedor-input">
                            <label class="label-style active">
                                Tipo de Perfil <span class="req">*</span>
                            </label>
                            <select id="perfil" name="perfil" class="input-style">
                                <option value="<?php echo $row4['tp_id']; ?>"><?php echo $row4['tp_dscrp']; ?></option>
                                <?php 
                                    $conse5="SELECT * FROM tipo_perfil";
                                    $ejec5=mysqli_query($con,$conse5);   
                                    while ($row5=mysqli_fetch_array($ejec5)) {
                                    echo "<option value='".$row5['tp_id']."'>".$row5['tp_dscrp']."</option>"; }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="contenedor_botones">
                        <input type="submit" value="Guardar" class="button button-block">
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script>
        $(document).ready(function(){
            $('.tabla').DataTable();
        });
    </script>
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
    <!-- MENSAJE DE USUARIO NO EDITADO -->
    <?php
        if (isset($_SESSION['usunoedit'])) {
            if ($_SESSION['usunoedit']==1) {
    ?>
        <script>
        alert('ERROR!! Usuario y Contraseña NO Editados');
    </script>
    <?php
        unset($_SESSION['usunoedit']); }
        }
    ?>
    <!-- MENSAJE DE USUARIO EDITADO -->
    <?php
        if (isset($_SESSION['usueditado'])) {
            if ($_SESSION['usueditado']==1) {
    ?>
        <script>
        alert('Usuario y Contraseña Editados con Éxito');
    </script>
    <?php
        unset($_SESSION['usueditado']); }
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