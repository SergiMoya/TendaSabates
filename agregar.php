<?php

session_start();


$codi = $_GET['id'];
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

$sql = "SELECT * FROM Producte where id = '".$codi."'";
$respuesta = $conn->query($sql);

$conn->close();

if($respuesta){
    $fila = mysqli_fetch_array($respuesta);
    if(!isset($_SESSION['carrito'])){
        $arreglo[0]['id'] = $fila['id'];
        $arreglo[0]['model'] = $fila['model'];
        $arreglo[0]['preu'] = $fila['preu'];
        $_SESSION['carrito'] = $arreglo;
    }
    else{
      $arreglo = $_SESSION['carrito'];
      $cant = count($arreglo);
      $arreglo[$cant + 1]['id'] = $fila['id'];
      $arreglo[$cant + 1]['model'] = $fila['model'];
      $arreglo[$cant + 1]['preu'] = $fila['preu'];
      $_SESSION['carrito'] = $arreglo;
    }
}

header("Refresh:0; url=carrito.php", true);

?>


