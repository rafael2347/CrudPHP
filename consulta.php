<?php
require "conexion.php";
$sql = "SELECT * FROM crud";
$stmt = $conexion->prepare($sql);
$result = $stmt->execute();
$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    print $row['id'] . "; " . $row['nombre'] . "; " . $row['apellidos'] . "; " . $row['direccion'] . "; " . $row['telefono'] . "; " . $row['email'] . "\n";
}
?>
