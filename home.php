<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyWay</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/index.js"></script>

</head>
<body>
<div style="float:top"
	    			<!-- CABECERA-->
			     	<?php include("cabecera.php"); ?>
</div>
<div id="cuerpo">
<?php 
    include("./actions.php"); //archivo actions.php de funciones vinculado con el home.php
    session_start();
if (isset($_POST["do"])) {
    if (strcmp($_POST["do"], "register") == 0) {
        $resultadoRegistroUsuario = registroUsuarios($_POST);
        if ($resultadoRegistroUsuario[0]) {
            muestraLogin($_POST, $resultadoRegistroUsuario[1]);
        } else {
            muestraRegistro($_POST, $resultadoRegistroUsuario[1]);
        };
    } else if (isset($_POST["do"]) && strcmp($_POST["do"], "login") == 0) {
        $resultadoLoginUsuario = loginUsuario($_POST);
        
        if ($resultadoLoginUsuario == true) {
            header("Location: ./crearviaje.php");
        } else {
            $mensaje = "Error al loguearte";
            muestraLogin($_POST, $mensaje);
        }
    }
} else {
    muestraLogin($_POST, 'Acceda a myWay');
}
?>
</div>
<div id="footer">
	    			<!-- PIE-->
			     	<?php include("pie.php"); ?>
</div>

</body>
</html>