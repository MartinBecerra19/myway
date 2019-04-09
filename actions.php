<?php
function registroUsuarios($datos)
{
	
	// 1- configura la conexión con los datos en config.php
	require('./config.php');
			
	// 2- Vamos a poner una variable BOOLEAN, que será la que devuelva la función al acabar. La inicializamos a FALSE, para que si algo falla, ésta sea su respuesta por defecto.
	//    Solo si todo va bien, la cambiamos a TRUE.
	$todoFueBien = false;
	
	// 3- [OPCIONAL] Comprobamos todos los campos que recibimos. En teoría el propio formulario no deja enviar si algún campo vacío o del formato no especificado, 
	//    pero tal vez nosotros queramos imponer otras comprobaciones: que el usuario sea mayor de edad, o la contraseña tenga una longitud mínima, etc.
	$campos_ok = true;
	foreach ($datos as $campo) {
		if (strlen($campo) >= 1) {
			
			// aquí podríamos añadir todas las comprobaciones adicionales que quisiéramos: longitud mínima, mayor de edad, etc.

		} else {
			$campos_ok = false;
		}
	}
	
	// 4.1 - Solo en el caso de que todos nuestras comprobaciones hayan sido correctas, procedemos con el registro.
	if ($campos_ok) {
		
		// PRIMERA CONSULTA: comprobamos que ese email no esté ya registrado. 
		// Es muy útil dejar la consulta en una variable 'q', por claridad.
		// La ejecutamos y comprobamos si recibimos un error. Si no, el resultado de la consulta quedará en '$r'

        $q = "SELECT * FROM `usuario` WHERE `email`='" . $datos["mail"] . "'";
        $q1 = "SELECT `nombre` FROM `parada` WHERE `km` >= 100 AND `CodigoCamino` WHERE = '".$_POST["caminos"]."'";

		$r = mysqli_query($ms, $q);
		if (!$r) {
			echo "<br>ERROR EN CONSULTA: ";
		} else {

			// Con esta función sabemos cuántos registros nos devuelve la consulta realizada.
			// Como solo necesitamos saber si ya existe algún usuario con ese email, si nos devuelve >0 es que hay al menos uno. 
			if (mysqli_num_rows($r) > 0) {

				$mensaje = 'ERROR: El email indicado ya está en uso.<br>Por favor, indique otro email.'; 
				
			// Si la consulta devolvió 0 resultados, es que no hay nadie registrado con ese email, podemos avanzar.
			} else {
				// SEGUNDA CONSULTA: insertar los datos de nuestro formulario, vamos por partes.
				// Efectuamos la consulta y comprobamos si devolvió error o no. Podemos agruparlo en un simple IF

				$q = "INSERT INTO `usuario` (`Username`,`pass`,`nombre`,`telefono`,`direccion`,`pais`,`email`) VALUES ('" . $datos["username"] . "','" . $datos["passw"] . "','" . $datos["nombreReal"] . "','" . $datos["telefono"] . "','" . $datos["direccion"] . "','" . $datos["country"] . "','" . $datos["mail"] . "')";

				$r = mysqli_query($ms, $q);
				if (!$r) {
					echo "<br>ERROR EN CONSULTA!";
				} else {

					$todoFueBien = true;
					$mensaje = '¡Registro completado satisfactoriamente!<br>Acceda a MyWay.';
				}
			}

		}
		
	// 4.2 - Si alguno de los campos no cumplió nuestros requisitos, devolvemos FALSE. 
	//       Lo lógico sería también devolver un mensaje explicando el error.
	} else {
		$mensaje = 'ERROR: Alguno de los campos no cumple con los requisitos necesarios.';
	}
	
	// lo único que devolverá nuestra función de registro, TRUE si todo fue bien, o FALSE por defecto si se produjo algún error.
	return array($todoFueBien, $mensaje);
}

function muestraRegistro($datos, $mensaje)
{
	
	/*
		NOTA: Si a este formulario de registro, que es copia del de index.php, lo ponemos dentro del mismo identificador ya usado, 
		      podemos usar directamente la hoja de estilo que ya teníamos, no hay que tocar apenas nada, sólo centrarlo.
	 */
    echo '<form action="" method="post">
    <input type="hidden" 	name="do" value="register">
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
</form>';

}

function muestraLogin($datos, $mensaje)
{

	echo '<div id="home_login">
			<br><br>
			<p>' . $mensaje . '</p>
			<br>
			<form action="./home.php" 	method="POST">
				<input type="hidden" 	name="do" value="login">
				<input type="email" 	name="email" placeholder="email" size="40" required><br>
				<input type="password" 	name="passw" placeholder="contraseña" size="40" required>				
				<br>
				<input id="registros" type="submit" value="Log In">
			</form>
			<a style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; color: #8b9dc3;" href="./pass.php" target="_self">Cambia tu contraseña</a>
		  </div>';

}

function loginUsuario($datos)
{

	require('./config.php');
	$resultadoRegistroUsuario = false;
	$q = "SELECT * FROM `usuario` WHERE `email`='" . $datos["mail"] . "' AND `pass`='" . $datos["passw"] . "'";
	$r = mysqli_query($ms, $q);
	if (!$r) {
		echo "<br>ERROR EN CONSULTA: ";
	} else {

		if (mysqli_num_rows($r) != 1) {
			$mensaje = 'ERROR: El email o contraseña indicados ya están en uso.<br>Por favor, indique otro email o contraseña.';

		} else {
			$resultadoRegistroUsuario = true;
			// $resultado = mysqli_fetch_assoc($r);


			// $_SESSION["email"] = $resultado["email"];
			// $_SESSION["nombre"] = $resultado["firstname"];
			// print_r("Sesión iniciada" . " " . $resultado["firstname"]);
			return $resultadoRegistroUsuario;
		}
	}
	/* -----------------------------------------------------------
			   PARA HACER: Comprobación login usuario
	/* -------------------------------------------------------- */
}
?>