<?php
session_start();
if (isset($_GET['id'])) {
    // Set Language variable
    if (isset($_GET['lang']) && !empty($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];

        if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
            echo "<script type='text/javascript'> location.reload(); </script>";
        }
    }

    // Include Language file
    if (isset($SESSION['lang'])) {
        include "lang" . $_SESSION['lang'] . ".php";
    } else {
        include "lang_en.php";
    }
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
$id = $_GET['id'];
    $lang = $_SESSION['lang'];

    $sql = "select * from Producte".$lang." WHERE id='$id' LIMIT 1";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();
    $id = $row["id"];
    $price = $row["preu"];
    $description = $row["descripcio"];
    $type = $row["model"];





$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>

<body style="background-color: #F5F5F5;">
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
                </ul>
            </div>

        </nav>
    </div>
    <a href="index.php">Tornar</a>
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><img src="public/imatges/<?php echo $codi; ?>.jpg" alt="" class="img-fluid"></div>
            <div class="col-sm-6">
                <div class="row">

                    <div class="col-sm-11">
                        <h2><?php echo $model; ?></h2>
                    </div>
                    <div class="col-sm-11">
                        <h4><?php echo $preu; ?><?php echo '€'; ?></h4>
                    </div>
                    <div class="col-sm-11">
                        <h8><?php echo $descripcio; ?></h8>
                    </div>
                    <div class="col-sm-11">
                        <a href='agregar.php?id=<?php echo $id; ?>' class="btn btn-secondary"><?= _ACARRITO ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>