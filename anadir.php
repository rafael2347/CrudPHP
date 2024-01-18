<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo_anadir.css">
    <title>Añadir</title>
    
    
</head>
<div class="contenedorPadre">
<div class="formulario">
    <h1>Añadir un usuario</h1>
<form action="anadir.php" method="POST">
    Nombre:<br>
    <input type="text" name="nombre" required><br><br>
    Apellidos:<br>
    <input type="text" name="apellidos" required><br><br>
    Dirección:<br>
    <input type="text" name="direccion" required><br><br>
    Teléfono:<br>
    <input type="text" name="telefono" required><br><br>
    Email:<br>
    <input type="email" name="email" required><br><br>
    <input type="submit" class="btn btn-info" value="Enviar">
    

    
    

    
</form>
<a href="./index.php">
    <button  class="btn btn-danger">Salir</button>
</a>
</div>
</div>

<div>
<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

   // Validación de nombre y apellidos (solo letras y espacios)
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u", $nombre) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/u", $apellidos)) {
        echo "Error: El nombre y los apellidos deben contener solo letras, espacios y tildes.";
        ?><br><button onclick="location.href='index.php'" type='submit'>Salir</button><?php
        exit();
    }

if (!is_numeric($telefono) || !preg_match("/^\+34\d{9}$/", $telefono)) {
    echo "Error: Número de teléfono no válido.";
    ?><br><button onclick="location.href='index.php'" type='submit'>Salir</button><?php
    exit();
}

    // Resto del código para la inserción en la base de datos
    $sql = "INSERT INTO crud (nombre, apellidos, direccion, telefono, email) VALUES (:nombre, :apellidos, :direccion, :telefono, :email)";
    
    try {
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellidos', $apellidos);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':email', $email);

        if ($statement->execute()) {
            echo "Los datos se han añadido correctamente a la base de datos.";
        } else {
            echo "Ha ocurrido un error al añadir los datos a la base de datos.";
        }
        
    } catch (PDOException $error) {
        echo "Error al ejecutar la consulta: " . $error->getMessage();
    }
    
    mysqli_close($conexion);
}
?>
