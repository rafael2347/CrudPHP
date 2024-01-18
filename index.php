<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sistema CRUD</title>
    <link rel="stylesheet" href="css/index.css">
   
</head>
<body>

<h1>Sistema CRUD</h1><br>

<button onclick="location.href='anadir.php'"  class="btn btn-success">Añadir</button>
<button onclick="location.href='reportes.php'"  class="btn btn-success">Crear PDF</button>
<button onclick="location.href='excel.php'"  class="btn btn-success">Crear Excel</button>


<?php
require 'conexion.php'; // Asegúrate de que el archivo de conexión está incluido correctamente

// Mostrar entradas
$sqlEntradas = "SELECT * FROM crud ORDER BY id DESC";

try {
    
    $statement = $conexion->prepare($sqlEntradas);
    $statement->execute();
    $entradas = $statement->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}

echo "<div class='table table-success table-striped'>";
echo "<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>";

foreach ($entradas as $row) {
    $id = $row['id'];
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $email = $row['email'];

    echo "<tr>
            <td>{$id}</td>
            <td>{$nombre}</td>
            <td>{$apellidos}</td>
            <td>{$direccion}</td>
            <td>{$telefono}</td>
            <td>{$email}</td>
            <td>
                <form action='./editar.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' class='btn btn-warning'>Editar</button>
                </form>
                <form action='./borrar.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' class='btn btn-info'>Borrar</button>
                </form>
            </td>
          </tr>";
}

echo "</table>";
echo "</div>";

?>
</body>
</html>
