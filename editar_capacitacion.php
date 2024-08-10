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
    <title>Editar Digitalizaciones</title>
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
                        EDITAR REGISTRO DE CAPACITACIÓN
                    </h1>
                </section>
<?php
    $_SESSION['modidcap']=$_REQUEST['id'];
    $idcap=$_SESSION['modidcap'];
    $consulta="SELECT * from digitalizacion D INNER JOIN sector S ON D.sector_id=S.sector_id WHERE D.digi_id='$idcap'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);       
?>
                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><i class="fas fa-people-carry"></i> Comunidad</label>
                        </div>
                        <div class="op-right">
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="modificar_capacitacion.php" method="post" enctype="multipart/form-data">
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Subir Documento <span class="req">*</span>
                                            </label>
                                            <input type="file" id="cajas" name="archivo" class="input-style" accept="image/jpeg,.pdf">
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Sector <span class="req">*</span>
                                            </label>
                                            <select id="cargo" name="sector" class="input-style">
                                                <option value="<?php echo $row['sector_id'];?>"><?php echo $row['sector_dscrp'];?></option>
                                                <?php 
                                                    $cons2="SELECT * from sector";
                                                    $ejec2=mysqli_query($con,$cons2);
                                                    if(!$ejec2){
                                                        echo "hay un error en".$cons2;
                                                    }else{
                                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                                            echo "<option value='".$row2['sector_id']."'>";
                                                            echo $row2['sector_dscrp']; echo "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                No.Capacitación <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_numero_codigo'];?>" id="cajas" name="numero_capacita" class="input-style" maxlength="5"  required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Nombre de la Capacitación <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_nombre_motivo'];?>" class="input-style" id="cajas" name="nombre_capacita" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Capacitador <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_capacitador'];?>" id="cajas" name="capacitador" class="input-style" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Inicio <span class="req">*</span>
                                            </label>
                                            <input type="date" value="<?php echo $row['digi_fecha_inicio'];?>" class="input-style" id="cajas" name="fechai" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Finalización <span class="req">*</span>
                                            </label>
                                            <input type="date" value="<?php echo $row['digi_fecha_fin'];?>" class="input-style" id="cajas" name="fechaf" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_descripcion'];?>" id="cajas" name="descripcion" class="input-style"  required >
                                        </div>
                                    </div>
                                    <div class="contenedor_botones">
                                        <input type="submit" class="botones" value="Guardar">
                                        <a href="digitalizar_capacitaciones.php" class="botones">Regresar</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- MENSAJE DE GUARDADO -->
    <?php
        if (isset($_SESSION['editado'])) {
            if ($_SESSION['editado']==1) {
    ?>
        <script>
        alert('Datos Guardados Correctamente');
    </script>
    <?php
        unset($_SESSION['editado']); }
        }
    ?>
    <!-- MENSAJE DE NO GUARDADO -->
    <?php
        if (isset($_SESSION['noeditado'])) {
            if ($_SESSION['noeditado']==1) {
    ?>
        <script>
        alert('Ocurrio un error intentelo de nuevo');
    </script>
    <?php
        unset($_SESSION['noeditado']); }
        }
    ?>
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