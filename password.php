<?php
    session_start();
    $servername = "localhost";
    $username = "Jair";
    $password = "Alpha";
    $dbname = "constructora";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $new_password = $_POST["new_password"];
        $query = "UPDATE usuarios SET password = '$new_password' WHERE nombre = '$username'";

        if ($conn->query($query) === TRUE) {
            // Redirige a index.html
            header("Location: index.html");
            exit;
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    }

    $conn->close();
?>
