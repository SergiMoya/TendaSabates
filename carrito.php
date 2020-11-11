

<?php

session_start();


$servername = "0.0.0.0";
$username = "perez";
$password = "moya1234";
$dbname = "TendaBD";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Producte";
$respuesta = $conn->query($sql);

$conn->close();

if(isset($_SESSION['carrito'])){
    $arreglo = $_SESSION['carrito'];
    echo "<table><th></th><th>ID</th><th>MODELO<th><th
    PREU</th>";
    foreach ($arreglo as $key => $fila){
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['model'] . "</td>";
        echo "<td>" . $fila['preu'] . "</td>";

    echo "</table>";
    }
}
?>