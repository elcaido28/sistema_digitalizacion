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
    <title>Búsqueda</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="css/estilos2.css" rel="stylesheet" type="text/css" />
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
                        BÚSQUEDA DE DIGITALIZACIONES
                    </h1>
                </section>

                <section class="content">
                    <div class="grande">
                    <div class="contenedor-optitle">
                        <div class="op-left">
                            <label class="titulo-form"><span class="mif-search mif-1x fg-pink"> </span> Archivos </label>
                        </div>
                        <div class="op-right">
                            <!-- <span class="mif-pencil mif-2x fg-pink"></span>
                            <input type="button" value="Nuevo Empleado"> -->
                            <!-- <button class="boton1234"><i class="fas fa-file-medical esp-right"></i> Nuevo Empleado</button> -->
                        </div>
                    </div>
                    <div id="formu" class="contenedor-formularios">
                        <div class="contenido_tab_mod" id="contenido_tab">
                                <form action="#" method="post">
                                    <br>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <select name="cargo" id="cargo" name="cargo" class="input-style">
                                                <option value="0">Categoria</option>
                                                <?php
                                                    $cons="SELECT * from categorias";
                                                    $ejec=mysqli_query($con,$cons);
                                                    if(!$ejec){
                                                        echo "hay un error en".$cons;
                                                    }else{
                                                        while ($row=mysqli_fetch_array($ejec)) {
                                                            echo "<option value='".$row['cat_id']."'>";
                                                            echo $row['cat_dscrp']; echo "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="contenedor-input">
                                            <select name="cargo" id="cargo" name="cargo" class="input-style">
                                                <option value="0">Tipo</option>
                                                <?php
                                                    $cons2="SELECT * from tipo_digitalizacion";
                                                    $ejec2=mysqli_query($con,$cons2);
                                                    if(!$ejec2){
                                                        echo "hay un error en".$cons2;
                                                    }else{
                                                        while ($row2=mysqli_fetch_array($ejec2)) {
                                                            echo "<option value='".$row2['td_id']."'>";
                                                            echo $row2['td_dscrp']; echo "</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Inicio <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="fechai" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Fecha de Finalización <span class="req">*</span>
                                            </label>
                                            <input type="date" class="input-style" id="cajas" name="fechaf" required >
                                        </div>
                                    </div>
                                    <div class="fila-arriba">
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Número/Código <span class="req">*</span>
                                            </label>
                                            <input type="text" id="cajas" name="edad" class="input-style" maxlength="2" required >
                                        </div>
                                        <div class="contenedor-input">
                                            <label class="label-style active">
                                                Nombre/Motivo <span class="req">*</span>
                                            </label>
                                            <input type="email" class="input-style" id="cajas" name="correo" required>
                                        </div>
                                    </div>
                                    <div class="contenedor_boton">
                                        <input type="submit" class="button button-block" value="Buscar">
                                    </div>
                                </form>
                        </div><br><br>
                        <div class="contenido_tab_mod_busqueda">

                          <section class="portafolio-item">
                            <img src="img/a.jpg" alt="" class="portafolio-img">
                            <section class="portafolio-text">
                              <h2>Documentos PDF,JPG</h2>
                              <p>* Resultado 1</p>
                              <p>* Resultado 2</p>
                              <p>* Resultado 3</p>
                            </section>
                          </section>

                          <section class="portafolio-item">
                            <img src="img/b.jpg" alt="" class="portafolio-img">
                            <section class="portafolio-text">
                              <h2>Documentos PDF,JPG</h2>
                              <p>* Resultado 1</p>
                              <p>* Resultado 2</p>
                              <p>* Resultado 3</p>
                            </section>
                          </section>

                          <section class="portafolio-item">
                            <img src="img/c.jpg" alt="" class="portafolio-img">
                            <section class="portafolio-text">
                              <h2>Documentos PDF,JPG</h2>
                              <p>* Resultado 1</p>
                              <p>* Resultado 2</p>
                              <p>* Resultado 3</p>
                            </section>
                          </section>

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
