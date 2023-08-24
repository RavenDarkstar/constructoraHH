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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT idusu, idrol FROM usuarios WHERE nombre = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['idusuario'];
        $user_id = $row['idusuario'];
        $user_role = $row['idrol'];

        if ($user_role == 1) {
            header("Location: admin.php");
        } elseif ($user_role == 2) {
            header("Location: supervisor.php");
        }
    } else {
        header("Location: index.html?error=1");
    }
}

$conn->close();
?>