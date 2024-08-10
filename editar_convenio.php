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
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        EDITAR REGISTRO DE CONVENIOS
                    </h1>
                </section>
<?php
    $_SESSION['modidconv']=$_REQUEST['id'];
    $idconv=$_SESSION['modidconv'];
    $consulta="SELECT * from digitalizacion D INNER JOIN entidades E ON D.enti_id=E.enti_id INNER JOIN categorias C ON C.cat_id=D.cat_id WHERE D.digi_id='$idconv'";
    $ejec=mysqli_query($con,$consulta);
    $row=mysqli_fetch_array($ejec);       
?>
                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><!-- <i class="fas fa-street-view"></i> --> <i class="fas fa-handshake"></i> Digitalizar Convenios</label>
                        </div>
                        <div class="op-right">
                            <!-- <span class="mif-pencil mif-2x fg-pink"></span>
                            <input type="button" value="Nuevo Empleado"> -->
                            <!-- <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Empleado</button> -->
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="modificar_convenio.php" method="post" enctype="multipart/form-data">
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Subir Documento <span class="req">*</span>
                                            </label>
                                            <input type="file" id="cajas" name="archivo" class="input-style" accept="image/jpeg,.pdf">
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Dirigido a <span class="req">*</span>
                                            </label>
                                            <select id="cajas" name="entidad" class="input-style">
                                                <option value="<?php echo $row['enti_id'];?>"><?php echo $row['enti_dscrp'];?></option>
                                                <?php 
                                                    $cons2="SELECT * FROM entidades WHERE enti_id>=2 AND enti_id<=3 ORDER BY enti_id DESC";
                                                    $ejec2=mysqli_query($con,$cons2);
                                                    while ($row2=mysqli_fetch_array($ejec2)) {
                                                        echo "<option value='".$row2['enti_id']."'>";
                                                        echo $row2['enti_dscrp']; echo "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Universidad <span class="req">*</span>
                                            </label>
                                            <select id="cargo" name="categorias" class="input-style">
                                                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_dscrp'];?></option>
                                                <?php 
                                                    $cons3="SELECT * FROM categorias WHERE cat_id>=8 AND cat_id<=11 ORDER BY cat_id DESC";
                                                    $ejec3=mysqli_query($con,$cons3);
                                                    while ($row3=mysqli_fetch_array($ejec3)) {
                                                        echo "<option value='".$row3['cat_id']."'>";
                                                        echo $row3['cat_dscrp']; echo "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="contenedor-input">
                                            
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                No. de Convenio <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_numero_codigo'];?>" id="cajas" name="numero_convenio" class="input-style" maxlength="11" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Motivo del Convenio <span class="req">*</span>
                                            </label>
                                            <input type="text" value="<?php echo $row['digi_nombre_motivo'];?>" class="input-style" id="cajas" name="motivo" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Inicio <span class="req">*</span>
                                            </label>
                                            <input type="date" value="<?php echo $row['digi_fecha_inicio'];?>" class="input-style" id="cajas" name="fechai" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Finalización <span class="req">*</span>
                                            </label>
                                            <input type="date" value="<?php echo $row['digi_fecha_fin'];?>" class="input-style" id="cajas" name="fechaf" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <textarea name="descripcion" id="cajas" rows="1" class="input-style"><?php echo $row['digi_descripcion'];?></textarea>
                                        </div>
                                        <div class="contenedor-input">
                                            <!-- <label class="label-style">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <input type="text" name="descripcion" class="input-style" maxlength="10" required > -->
                                        </div>
                                    </div>
                                    <div class="contenedor_botones">
                                        <input type="submit" class="botones" value="Guardar">
                                        <a href="digitalizar_convenios.php" class="botones">Regresar</a>
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
        alert('Datos Editados Correctamente');
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