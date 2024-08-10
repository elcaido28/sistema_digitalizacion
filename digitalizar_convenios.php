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
                        CONVENIOS
                    </h1>
                </section>

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
                                <form action="guardar_digita_convenio.php" method="post" enctype="multipart/form-data">
                                    <div class="fila-fecha">
                                        <div class="contenedor-fecha">
                                            <input type="text" class="input-fecha" id="cajas" name="feching" value="<?php $time2=date('Y-m-d'); echo $time2; ?>" onkeypress="return enable(event)" required>
                                        </div>
                                    </div><br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Subir Documento <span class="req">*</span>
                                            </label>
                                            <input type="file" id="cajas" name="archivo" class="input-style" accept="image/jpeg,.pdf" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Dirigido a <span class="req">*</span>
                                            </label>
                                            <select id="cajas" name="entidad" class="input-style">
                                                <option value="0">...</option>
                                                <?php 
                                                    $cons="SELECT * FROM entidades WHERE enti_id>=2 AND enti_id<=3 ORDER BY enti_id DESC";
                                                    $ejec=mysqli_query($con,$cons);
                                                    while ($row=mysqli_fetch_array($ejec)) {
                                                        echo "<option value='".$row['enti_id']."'>";
                                                        echo $row['enti_dscrp']; echo "</option>";
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
                                                <option value="0">...</option>
                                                <?php 
                                                    $cons="SELECT * FROM categorias WHERE cat_id>=8 AND cat_id<=11 ORDER BY cat_id DESC";
                                                    $ejec=mysqli_query($con,$cons);
                                                    while ($row=mysqli_fetch_array($ejec)) {
                                                        echo "<option value='".$row['cat_id']."'>";
                                                        echo $row['cat_dscrp']; echo "</option>";
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
                                            <label class="label-style">
                                                No. de Convenio <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="numero_convenio" class="input-style" maxlength="11" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Motivo del Convenio <span class="req">*</span>
                                            </label>
                                            <input type="text" class="input-style" id="cajas" name="motivo" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Inicio <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="fechai" required>
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Finalización <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="fechaf" required>
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <textarea name="descripcion" id="cajas" rows="1" class="input-style"></textarea>
                                        </div>
                                        <div class="contenedor-input">
                                            <!-- <label class="label-style">
                                                Descripción <span class="req">*</span>
                                            </label>
                                            <input type="text" name="descripcion" class="input-style" maxlength="10" required > -->
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
                                        <th>Motivo</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Archivo</th>
                                        <th>Opciones</th>   
                                    </tr>
                                </thead>
                                <tr>
                                    <?php 
                                        $cons2="SELECT * FROM digitalizacion WHERE td_id = 3";
                                        $ejec2=mysqli_query($con,$cons2);
                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                    ?>
                                    <td><?php echo $row2['digi_nombre_motivo']; ?></td>
                                    <td><?php echo $row2['digi_fecha_inicio']; ?></td>
                                    <td><?php echo $row2['digi_fecha_fin']; ?></td>
                                    <td><a href="<?php echo $row2['digi_archivo']; ?>" target="_blank" title="Vista Previa del Archivo"><img src="img/ver_archivos.png" alt="" width="30" height="30"></a></td>
                                    <td><div class="optabla2">
                                        <a href="editar_convenio.php?id=<?php echo $row2['digi_id']; ?>" title="Editar"><i class="fas fa-pencil-alt esp-right"></i></a>
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
        alert('Datos Guardados Correctamente');
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
<?php }else{
    //echo "<script> window.location='login.php'; </script>" ;
    header("Location:login.php");
    //https://metroui.org.ua/icons.html==> link para lis iconos
    }
?>