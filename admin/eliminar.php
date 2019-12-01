<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "posada";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM reservas WHERE id = " . $_POST['idEliminar'] . " ";
    $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "No lo volveremos a ver";
        ?> <button onclick="window.location.href='./reservaciones.php' ">Regresar</button> <?php
    } else {
        echo "Oops!! Algo paso - error: " . $conn->error;
    }

    $conn->close();
?>