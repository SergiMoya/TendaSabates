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

// Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];

    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
} else {
    include "lang_es.php";
}
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        function changeLang() {
            document.getElementById('form_lang').submit();
        }
    </script>
</head>

<body>
<div class="container-fluid" style="padding: 0;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">

<button class="navbar-toggler botores" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php"><?= _INICI ?>
                <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link efecte" href="carrito.php"><?= _CARRITO ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link efecte" href="contacte.html"><?= _CONTACTE ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link efecte" href="AfegirProductes.php"><?= _AFEGIR ?></a>
        </li>
        <li class="nav-item">
            <form method="get" action="" id="form_lang" class="dropdown-dark">
                <select name='lang' onchange='changeLang();'>
                <option value="" disabled selected>Tria l'idioma</option>
                    <option value='en' class="form-control select2bs4" <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
                                            echo "selected";
                                        } ?>>Angles</option>
                    <option value='es' <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'es') {
                                            echo "selected";
                                        } ?>>Espanyol</option>
                </select>
            </form>
        </li>
    </ul>
</div>

</nav>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">MODEL</th>
                <th scope="col">PREU</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_SESSION['carrito'])) {
            $arreglo = $_SESSION['carrito'];
            foreach ($arreglo as $key => $fila) {

        ?>
                
                    <tr>
                        <th scope="row"><?php echo $fila['id']; ?></th>
                        <td><?php echo $fila['model']; ?></td>
                        <td><?php echo $fila['preu']; ?></td>
                    </tr>
            <?php
            }
        }
            ?>
                </tbody>

    </table>
</body>

</html>