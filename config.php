<?php

    //Configurarción de nuestro servidor y base de atos MySQL
    $host = "localhost";
    $user = "diwbook";
    $pass = "diwbook";
    $db = "myway";

    // Conectar al servidor MySQL y a la base de datos especificados
    $ms = mysqli_connect($host, $user, $pass);
    if(!$ms) {
        echo "Ooops! Error conectando a ".$host;
    } else {
        if(mysqli_select_db($ms, $db)){
            // echo "OK! Conexión correcta a ".$db." en ".$host;
        }else {
            echo "Error al conectar";
        }
        
        
    }
?>