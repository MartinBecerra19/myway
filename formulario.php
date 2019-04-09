<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="registro">
        <h5 style="text-align:center;">Registrate:</h5>
        <form action="crearviaje4.php" method="post">
            <input type="hidden" name="do" value="register">
            <label for="">Nombre de Usuario: </label>
            <input type="text" name="username" id="user">
            <br>
            <label for="">Contraseña:</label>
            <input type="text" name="passw" id="passw">
            <br>
            <label for="">Nombre:</label>
            <input type="text" name="nombreReal" id="">
            <br>
            <label for="">Email:</label>
            <input type="text" name="mail" id="mail">
            <br>
            <label for="">Dirección:</label>
            <input type="text" name="direccion" id="dir">
            <br>
            <label for="">Teléfono:</label>
            <input type="text" name="telefono" id="tlf">
            <br>
            <label for="">Pais:</label>
            <input type="text" name="country" id="pais">
            <br>
            <input style="float:left;" type="submit" value="Confirmar">  
        </form>
    </div>
    
</body>
</html>