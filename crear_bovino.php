<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Bovino</title>
</head>
<body>
    <h1>Registrar Bovino</h1>
    <form action="guardar_bovino.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="raza">Raza:</label>
        <input type="text" id="raza" name="raza" required><br><br>

        <label for="peso">Peso (kg):</label>
        <input type="number" id="peso" name="peso" required><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br><br>

        <input type="submit" value="Registrar Bovino">
    </form>
</body>
</html>
