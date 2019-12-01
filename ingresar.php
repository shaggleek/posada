<?php  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "posada";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = ("INSERT INTO reservas(nombre, telefono, correo) VALUES ('{$_POST['nombre']}', '{$_POST['telefono']}', '{$_POST['correo']}') " );

	if ($conn->query($sql) === TRUE) {
		echo "Agregado";
		?> <button onclick="window.location.href='./index.php' ">Regresar</button> <?php
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>