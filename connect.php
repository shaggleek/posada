<?php
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    
    if (!empty($username)){
        if (!empty($password)){
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "bootstrap";

            // Create connection
            $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

            if (mysqli_connect_error()){
                die('Connect Error ('. mysqli_connect_errno() .') '
                . mysqli_connect_error());
            } else {
                $sql = "INSERT INTO tabla1 (username, password) values ('$username','$password')";
                if ($conn->query($sql)){
                    echo "Los datos fueron enviados te contectaremos en breve";
                } else {
                    echo "Error: ". $sql ."
                    ". $conn->error;
                }
                $conn->close();
            }
        } else {
            echo "Oops!! Algo paso";
            die();
        }
    } else{
        echo "Oops!! Algo paso (Usuario)";
        die();
    }
?>