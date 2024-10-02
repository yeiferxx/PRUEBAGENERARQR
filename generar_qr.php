<?php
include('phpqrcode/qrlib.php'); // Incluir la librería QR

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bovinos_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la información del bovino
    $sql = "SELECT * FROM bovinos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $bovino = $result->fetch_assoc();

        // URL que queremos codificar (enlace al perfil del bovino)
        $url = "http://localhost/mostrar_bovino.php?id=" . $id;

        // Generar el código QR
        $filename = 'qr_bovino_' . $id . '.png';
        QRcode::png($url, $filename);

        // Redirigir al perfil del bovino con el código QR
        header("Location: mostrar_bovino.php?id=$id&qr=$filename");
    } else {
        echo "No se encontró el bovino.";
    }
}

$conn->close();
?>
