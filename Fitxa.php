<?php

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

$sql = "SELECT id, model, preu FROM Producte where id = '".$codi."'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();
$model = $row['model'];
$preu = $row['preu'];

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
<body>
<div class="container">
    <a href="index.php">Tornar</a>
    <div class="row">
        <div class="col-sm-6"><img src="imatges/<?php echo $codi; ?>" alt="" class="img-fluid"></div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-11"><h2><?php echo $model; ?></h2></div>
                <div class="col-sm-11"><h4><?php echo $preu; ?></h4></div>
                <div class="col-sm-11"><button class="btn btn-primary">Afegir</button></div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>