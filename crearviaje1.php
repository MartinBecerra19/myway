<?php require('./config.php'); ?>
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
    <div>
        Inicia tu viaje a Santiago de Compostela y consigue la compostela
        <br>de una manera sencilla y cómoda.
        <br>Usando códigos QR podrás sellar digitalmente cada etapa.
        <br>de una manera sencilla y cómoda.
        <br>Pero antes de inicar el camino, debes planificarlo.
</div>
    <div>
        <form action="crearviaje2.php" method="post">
            <input type="hidden" 	name="do" value="crearviaje">
            <label for="">Selecciona un camino: </label>          
            <?php 
            $q = "SELECT * FROM `camino` ";

            $r = mysqli_query($ms, $q);
                
            if(!$r) {
                echo "<br>ERROR EN CONSULTA: ";
            } else {
                $resultados = mysqli_fetch_all($r, MYSQLI_ASSOC);
                echo "<select name='caminos' id='caminos'>";

                foreach($resultados as $res) {
                    $CodCamino = $res["CodCamino"];
                    $nombre = $res["Nombre"];
                    echo "<option name='opcion' value='".$CodCamino ."'>".$nombre."</option>"; 
                }
                echo "</select>";
                echo "<br>";
            }
            ?>
            <input type="submit" value="Siguiente">
        </form>
    </div>
</body>
</html>