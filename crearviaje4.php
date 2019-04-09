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

    <?php 
        $usuario = $_POST["username"];
        $q2 = "INSERT INTO `viaje` (`CodViaje`,`CodigoUsuario`,`CodigoCamino`) VALUES ('" . $_SESSION["CodViaje"] . "','" . $usuario . "','" . $_SESSION["CodCamino"] . "')"; 
        $r2 = mysqli_query($ms,$q);
        
        foreach($_SESSION["CodParada"] as $parada) {
            $q = "INSERT INTO `miviaje` (`CodigoViaje`,`CodigoCamino`,`CodigoParada`) VALUES ('" . $_SESSION["CodViaje"] . "','" . $_SESSION["CodCamino"] . "','" . $parada . "')";

            $r = mysqli_query($ms, $q);
        }
        header('Location: ./login.php');
    ?>

</head>
<body>
    <div style="float:top"
	    <!-- CABECERA-->
		<?php include("cabecera.php"); ?>
    </div>
    <div id="cuerpo">
        


    </div>
    <br>
    <footer>
	    <!-- PIE-->
	    <?php include("pie.php"); ?>
    </footer>

</body>
</html>