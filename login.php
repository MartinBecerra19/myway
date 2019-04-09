<?php require('./config.php'); 
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyWay</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>

</head>
<body>
    <div style="float:top"
	    <!-- CABECERA-->
		<?php include("cabecera.php"); ?>
    </div>
    <div id="cuerpo">
        <form action="crearviaje4.php" method="post">
            <label for="">Nombre de Usuario: </label>
            <input type="text" name="username" id="user">
            <br>
            <label for="">Contraseña:</label>
            <input type="text" name="passw" id="passw">
            <br>
            <input type="submit" value="Iniciar Sesión">
            <span id="inicioSesion">No tienes cuenta? <a href="./formulario.php" target="_self">Registrate</a> </span>
        </form>
    </div>
    <br>
    <footer>
	    <!-- PIE-->
	    <?php include("pie.php"); ?>
    </footer>

</body>
</html>