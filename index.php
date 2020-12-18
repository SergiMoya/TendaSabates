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
//make query
$sql = "Select id, model, preu from Producte";
$result = $conn->query($sql);
$conn->close();

// Set Language variable
// Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])
) {
    $_SESSION['lang'] = $_GET['lang'];

    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
}else {
    include "lang_en.php";
    $_SESSION['lang']="en";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenda de Sabates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script>
        function changeLang() {
            document.getElementById('form_lang').submit();
        }
    </script>


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

    <div class="container">

        <div class="row">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $model = $row["model"];
                    $preu = $row["preu"];

            ?>

                    <div class="col-sm-4">
                        <div class="col-sm-12 justify-content-center"><img src="public/imatges/<?php echo $id; ?>.jpg" alt="" class="img-fluid"></div>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body" style="background-color: #F5F5F5;">
                                <h5 class="card-title" ><?php echo $model ?></h5>
                                <p class="card-text"><?php echo $preu ?>€</p>
                                <a href='Fitxa.php?id=<?php echo $id; ?>' class="btn btn-secondary"><?= _INFO ?></a>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "0 results";
            }
            ?>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>