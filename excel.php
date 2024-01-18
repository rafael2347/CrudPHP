<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Excel.xls");

// Incluye el archivo de conexión
require 'conexion.php';

// Mostrar entradas
$sqlEntradas = "SELECT * FROM crud ORDER BY id DESC";

try {
    $statement = $conexion->prepare($sqlEntradas);
    $statement->execute();
    $entradas = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}

// Imprimir títulos
echo "ID\tNombre\tApellidos\tDirección\tTeléfono\tEmail\n";

// Imprimir solo los datos de la tabla
foreach ($entradas as $row) {
    echo "{$row['id']}\t{$row['nombre']}\t{$row['apellidos']}\t{$row['direccion']}\t{$row['telefono']}\t{$row['email']}\n";
}
?>
