<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="css/estilog.css">

    <title>Inicio de Sesión</title>
</head>
<body>

   <!-- Formularios -->
    <div class="contenedor-formularios">
        <!-- Contenido de los Formularios -->
        <div class="contenido-tab">
            <!-- Iniciar Sesion -->
            <div id="iniciar-sesion">
                <h1>Iniciar Sesión</h1>
                <form action="validar.php" method="post">
                    <div class="contenedor-input">
                        <label>
                            Usuario <span class="req">*</span>
                        </label>
                        <input type="text" name="usuario" id="usuario" required>
                    </div>

                    <div class="contenedor-input">
                        <label>
                            Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" name="pass" id="pass" required>
                    </div>
                    <p class="forgot"><a href="#">Ver Contraseña</a></p>
                    <input type="submit" class="button button-block" value="Iniciar Sesión">
                </form>
            </div>
            <!-- Registrarse --><div id="registrarse"></div>
        </div>
    </div>
<!-- MENSAJE DE NO LOGIN   --> 
<?php
    if (isset($_SESSION['nologin'])) {
        if ($_SESSION['nologin']==1) {
?>
<script>
    alert('Usuario o Contraseña Incorrectos');
</script>
<?php
    unset($_SESSION['nologin']);
    }  }
?>

<!-- MENSAJE DE NO ACTIVO -->
<?php
    if (isset($_SESSION['noactivo'])) {
        if ($_SESSION['noactivo']==1) {
?>
    <script>
    alert('El Empleado se encuentra INACTIVO');
</script>
<?php
    unset($_SESSION['noactivo']); }
    }
?>

<!-- MENSAJE DE SALIDA -->
<?php
    if (isset($_SESSION['mnsj_salida'])) {
        if ($_SESSION['mnsj_salida']==1) {
?>
    <script>
    alert('La Sesión ha terminado');
</script>
<?php
    unset($_SESSION['mnsj_salida']); }
    }
?>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
