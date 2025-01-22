<?php
// Conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$database = "hms";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si el valor de 'periodo' está presente en el POST
if(isset($_POST['periodo'])) {
    $periodo = $_POST['periodo'];
} else {
    echo json_encode([]); // Envía una respuesta vacía si no hay periodo
    exit;
}

$data = [];
if ($periodo === "daily") {
    $sql = "SELECT DATE(appointmentDate) AS date, SUM(consultancyFees) AS income FROM appointment GROUP BY DATE(appointmentDate)";
} elseif ($periodo === "monthly") {
    $sql = "SELECT CONCAT(YEAR(appointmentDate), '-', MONTH(appointmentDate)) AS date, SUM(consultancyFees) AS income FROM appointment GROUP BY YEAR(appointmentDate), MONTH(appointmentDate)";
} else {
    $sql = "SELECT YEAR(appointmentDate) AS date, SUM(consultancyFees) AS income FROM appointment GROUP BY YEAR(appointmentDate)";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
?>
