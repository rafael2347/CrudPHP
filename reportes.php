<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sistema CRUD</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }
        .company-info {
            text-align: right;
        }
        .company-info img {
            width: 50px;
            height: auto;
        }
        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
require 'conexion.php'; // Asegúrate de que el archivo de conexión esté incluido correctamente

// Datos de la empresa ficticia (ajusta según tus necesidades)
$nombreEmpresa = "Empresa XYZ";
$cifEmpresa = "12345678A";
$emailEmpresa = "info@empresa.xyz";
$telefonoEmpresa = "123 456 789";

// Ruta del logo para el PDF
$logoPath = 'imagenes/logo.jpg';

// Fecha y hora de generación del informe PDF
$fechaGeneracion = date("d/m/Y H:i:s");

// Mostrar la cabecera con el logo y datos de la empresa
echo '<div class="header">';
echo '<img src="' . $logoPath . '"class="img-thumbnail rounded" />';
echo "<div class='company-info'>
        <h2>{$nombreEmpresa}</h2>
        <p>CIF: {$cifEmpresa}<br>
        Email: {$emailEmpresa}<br>
        Teléfono: {$telefonoEmpresa}</p>
        <p>Fecha y hora de generación: {$fechaGeneracion}</p>
      </div>";
echo '</div>';



// Mostrar entradas
$sqlEntradas = "SELECT * FROM crud ORDER BY id DESC";

try {
    $statement = $conexion->prepare($sqlEntradas);
    $statement->execute();
    $entradas = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}


echo '<h1>Listado de Clientes</h1>
<table class="table table-success table-striped">';

echo '
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Email</th>
    </tr>';

foreach ($entradas as $row) {
    $id = $row['id'];
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $email = $row['email'];

    echo "
        <tr>
            <td>{$id}</td>
            <td>{$nombre}</td>
            <td>{$apellidos}</td>
            <td>{$direccion}</td>
            <td>{$telefono}</td>
            <td>{$email}</td>
        </tr>";
}

echo '</table>';
// Mostrar el pie de página con la política de privacidad
echo '<div class="footer">';
echo '<p>Política de privacidad de datos de la empresa...</p>';
echo '</div>';
?>
</body>
</html>

<?php
$html = ob_get_clean();

require_once './dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->render();

$dompdf->stream("Listado.pdf", array("Attachment" => false));
?>
