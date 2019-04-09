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

    <form action="crearviaje3.php" method="post">
        <label>Para conseguir la Compostela debes realizar al menos 100 km.<label>
        <br>
        <?php 
        if (isset($_POST['caminos'])){
            $CodCamino=$_POST['caminos'];   
            $_SESSION['CodCamino']=$CodCamino;         
        } else{
            $CodCamino=$_SESSION['CodCamino']; 
        }
        $q2 = "SELECT `Nombre` FROM `parada` WHERE `Km` >= 100 AND `CodigoCamino` = '".$CodCamino."' order by `Km` limit 1" ;
        $r2 = mysqli_query($ms, $q2);
        if(!$r2) {
            echo "<br>ERROR EN CONSULTA: ";
        } else{
            $resultados2 = mysqli_fetch_all($r2, MYSQLI_ASSOC);
            foreach($resultados2 as $res2) {
                echo "<label>Con ese camino debes empezar al menos desde: ".$res2["Nombre"]."<label>";
            }
            echo "<br>";
        }
        ?>
        <label>Selecciona punto inicial: </label>          
        <?php 
        $q = "SELECT * FROM `parada` WHERE `CodigoCamino` = '".$CodCamino."'";
        $r = mysqli_query($ms, $q);
            if(!$r) {
                    echo "<br>ERROR EN CONSULTA: 2";
            } else {
                $resultados = mysqli_fetch_all($r, MYSQLI_ASSOC);
                echo "<select name='paradas' id='paradas'>";
                foreach($resultados as $res) {
                    $CodParada = $res["CodParada"];
                    $Parada = $res["Nombre"];
                    $Km = $res["Km"];
                    echo "<option name='opcion' value=".$CodParada .">".$Parada."-".$Km."km </option>"; 
                }
                echo "</select>";
                echo "<br>";            
            }       
        ?>
        <input type="submit" value="Siguiente">
    </form>

</div>
<br>
<footer>
	<!-- PIE-->
	<?php include("pie.php"); ?>
</footer>

</body>
</html>