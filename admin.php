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

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
	<link rel="stylesheet" type="text/css" href="sesion.css">
</head>
<body>
    <h1>Bienvenido, Administrador</h1>
    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Rol</th>
        </tr>

        <?php
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idusuario"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>" . $row["idrol"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron usuarios registrados</td></tr>";
        }
        ?>
    </table>
    <p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>