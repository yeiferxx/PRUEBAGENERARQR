<?php
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
        $qr_filename = isset($_GET['qr']) ? $_GET['qr'] : ''; // Obtener el archivo QR generado

        // Mostrar la información del bovino y el código QR
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Perfil del Bovino</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
                h1 { text-align: center; }
                .info { margin: 10px 0; }
                .qr-container { text-align: center; margin: 20px 0; }
                .qr-container img { width: 150px; }
                .buttons { display: flex; justify-content: space-around; margin-top: 20px; }
                button { padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
            </style>
        </head>
        <body>
        <div class='container'>
            <h1>Perfil del Bovino</h1>
            <div class='info'><strong>Código:</strong> {$bovino['id']}</div>
            <div class='info'><strong>Nombre:</strong> {$bovino['nombre']}</div>
            <div class='info'><strong>Raza:</strong> {$bovino['raza']}</div>
            <div class='info'><strong>Peso:</strong> {$bovino['peso']} kg</div>
            <div class='info'><strong>Fecha de Nacimiento:</strong> {$bovino['fecha_nacimiento']}</div>
            <div class='info'><strong>Descripción:</strong> {$bovino['descripcion']}</div>
            
            <div class='qr-container'>
                <strong>Código QR:</strong><br>
                <img src='$qr_filename' alt='Código QR'>
                <p><a href='$qr_filename' download>Descargar Código QR</a></p>
            </div>
            
            <div class='buttons'>
                <button onclick='window.location.href=\"vacunas.php?id={$bovino['id']}\"'>Vacunas</button>
                <button onclick='window.location.href=\"peso.php?id={$bovino['id']}\"'>Peso</button>
                <button onclick='window.location.href=\"produccion.php?id={$bovino['id']}\"'>Producción</button>
            </div>
        </div>
        </body>
        </html>";
    } else {
        echo "No se encontró el bovino.";
    }
}

$conn->close();

