<?php
    $servername = "localhost";
    $database = "proyecto1";
    $username = "acarro";
    $password = "acarro";
    // Creamos la conexión
    $conexion = mysqli_connect($servername, $username, $password, $database);
    // Chequeamos la connección
    if (!$conexion) {
        die("Fallo de conexión: " . mysqli_connect_error());
    }
    // trato que se decodifique la conexion para el español y corregir problema de tildes usando utf8
    mysqli_set_charset($conexion, "utf8");
    echo "Connected successfully";
    echo "<br>";
    
    ?>