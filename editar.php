<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo_editar.css">
    <title>Formulario de Edición</title>
    <link rel="stylesheet" href="css/estilo_editar.css">
    
</head>

<body>

    <div class="contenedorPadre">
        <h2>Editar Usuario</h2>

        <?php
        require "conexion.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            
            // Consulta para obtener los datos del registro a editar
            $sql = "SELECT * FROM crud WHERE id = :id";

            try {
                $statement = $conexion->prepare($sql);
                $statement->bindParam(':id', $id);
                $statement->execute();
                $registro = $statement->fetch(PDO::FETCH_ASSOC);

                if ($registro) {
                    // Mostrar formulario de edición con los datos cargados
        ?>
                    <form action="actualizar.php" method="POST" class="formulario">
                        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>" required>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $registro['nombre']; ?>" required>
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" value="<?php echo $registro['apellidos']; ?>" required>
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" id="direccion" value="<?php echo $registro['direccion']; ?>" required>
                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" value="<?php echo $registro['telefono']; ?>" required>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $registro['email']; ?>" required>
                        <input type="submit" class="btn btn-success" value="Actualizar">
                    </form>
                <?php
                } else {
                    echo "No se encontró ningún registro con el ID proporcionado.";
                }
            } catch (PDOException $error) {
                echo "Error al ejecutar la consulta: " . $error->getMessage();
            }
        }
                ?>

        <a href="./index.php">
            <button type='button' class="btn btn-danger">Salir</button>
        </a>
    </div>

</body>

</html>
