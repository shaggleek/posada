<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservaciones</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Icons and Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Copyright -->
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <div class="container">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "posada";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM reservas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
        ?>
                
                <div class="row">
                    <div class="col-lg-8">
                        <br>
                        <h1>Reservaciones</h1>
                    </div>
                    <div class="col-lg-4">
                        <br>
                        <button class="btn btn-primary btn-block" onclick="window.location.href='../index.php' "> Home page </button>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6">
                        <form action="buscar" method="post">
                            <input class="form-control" type="text" name="idBuscar" id="idBuscar" placeholder="Buscar ID"> <br>
                            <button type="submit" class="btn btn-primary btn-block">BUSCAR</button>
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <form action="eliminar" method="post">
                            <input class="form-control" type="text" name="idEliminar" id="idEliminar" placeholder="Ingrese ID a eliminar"> <br>
                            <button type="submit" class="btn btn-danger btn-block">ELIMINAR</button>
                        </form>
                    </div>
                </div>

                <br><br>

                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contactado</th>
                    </tr>

                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td> <?php echo $row["id"] ?> </td>
                            <td> <?php echo $row["nombre"] ?> </td>
                            <td> <?php echo $row["telefono"] ?> </td>
                            <td> <?php echo $row["correo"] ?> </td>
                            <td> <?php echo $row["contactado"] ?> </td>
                        </tr>
                    <?php } ?>
                </table>
        <?php
            } else {
                echo "No hay registros en la base de datos";
            }
            $conn->close();
        ?>
    </div>
</body>
</html>


