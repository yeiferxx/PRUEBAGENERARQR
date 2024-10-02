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

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$peso = $_POST['peso'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$descripcion = $_POST['descripcion'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO bovinos (nombre, raza, peso, fecha_nacimiento, descripcion) 
        VALUES ('$nombre', '$raza', '$peso', '$fecha_nacimiento', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    // Obtener el ID del bovino recién creado
    $id_bovino = $conn->insert_id;

    // Redirigir a la página para generar el código QR
    header("Location: generar_qr.php?id=$id_bovino");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
