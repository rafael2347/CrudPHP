<?php
require "conexion.php";

try {
    $conexion = new PDO($dsn, $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Error de conexión: " . $error->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
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

    // Consulta para actualizar el registro
    $sql = "UPDATE crud SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono = :telefono, email = :email WHERE id = :id";

    try {
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nombre', $nombre);
        $statement->bindParam(':apellidos', $apellidos);
        $statement->bindParam(':direccion', $direccion);
        $statement->bindParam(':telefono', $telefono);
        $statement->bindParam(':email', $email);

        if ($statement->execute()) {
            echo "Los datos se han actualizado correctamente en la base de datos.";
            ?><br><button onclick="location.href='index.php'" type='submit'>Salir</button><?php
        } else {
            echo "Ha ocurrido un error al actualizar los datos en la base de datos.";
        }
    } catch (PDOException $error) {
        echo "Error al ejecutar la consulta: " . $error->getMessage();
    }
    
    mysqli_close($conexion);
}
?>
