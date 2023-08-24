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

// Obtener datos de usuario
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Supervisor</title>
	<link rel="stylesheet" type="text/css" href="sesion.css">
</head>
<body>
    <h1>Bienvenido, Supervisor</h1>
    <h2>Lista de Proyectos</h2>
    <table>
        <tr>
            <th>ID Proyecto</th>
            <th>ID Usuario</th>
            <th>Fecha Inicio</th>
            <th>Foto</th>
            <th>Fecha Término</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idproyec"] . "</td>";
                echo "<td>" . $row["idusuario"] . "</td>";
                echo "<td>" . $row["fecha_inicio"] . "</td>";
                echo "<td><img src='" . $row["foto"] . "' alt='Foto del Proyecto' height='100'></td>";
                echo "<td>" . $row["fecha_termino"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay proyectos registrados para este supervisor</td></tr>";
        }
        ?>
    </table>
    <p><a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>