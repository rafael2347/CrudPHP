<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        // Consulta para borrar el registro
        $sqlBorrar = "DELETE FROM crud WHERE id = :id";
        try {
            $statement = $conexion->prepare($sqlBorrar);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();

            echo "Registro eliminado correctamente.";
            // Redirige a paginaprincipal.php
            header('Location: ./index.php');
            exit();  // Asegura que el script se detiene después de la redirección
        } catch (PDOException $error) {
            echo "Error al eliminar el registro: " . $error->getMessage();
        }
    } else {
        echo "ID no proporcionado para eliminar el registro.";
    }
} else {
    echo "Acceso no válido.";
}
?>
