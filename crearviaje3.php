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
    

  

</head>
<body>
<div style="float:top"
	<!-- CABECERA-->
	<?php include("cabecera.php"); ?>
</div>
<div id="cuerpo">
    <br>
    <form action="login.php" method="post">
        <label>Con su selección, este es su itinerario<label>
            <br>
        <?php $_SESSION['CodParada']=$_POST['paradas']; 
        $CodParada=$_POST['paradas'];
        $q2 = "SELECT * FROM `parada` WHERE `CodParada` >=". $CodParada ."  AND `CodigoCamino` = '".$_SESSION['CodCamino']. "'" ;
        $c=0;
        $d=0;
        $r2 = mysqli_query($ms, $q2);
        $_SESSION['CodParadas']=array();
        if(!$r2) {
            echo "<br>ERROR EN CONSULTA: ";
        } else{
            $resultados2 = mysqli_fetch_all($r2, MYSQLI_ASSOC);
            echo "<label>Etapas:<label>";
            foreach($resultados2 as $res2) {
                echo "<label> ".$res2['Nombre']." ". $res2['Km']. " Km<label><br>";
                $c=$c+$res2['Km'];
                $d=$d+1;
                $_SESSION['CodParadas'][$d]= $res2['CodParada'];
                
            } 
        }
        

        if ($c<100){
            echo "<label>Debes seleccionar una parada inicial que cumpla los requisitos</label>";
            echo "<a href='crearviaje2.php'></a>";
        }else {
            echo "<label>Con esta selección hará: ".$c."km</label>";
        }
        ?>
        <br>
        <input type="submit" value="Siguiente">
        <a href="vermapa.php" target="_blank">Ver mapa</a>
    </form>

</div>
<br>

<footer>
	<!-- PIE-->
	<?php include("pie.php"); ?>
</footer>

</body>
</html>