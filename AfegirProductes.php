<?php
session_start();

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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
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

    <div class="container">
    <form action="afegirBDD.php" method="POST"  NAME="form">
MODEL:<br>
	  <input type="text"  name="model"/> <br/><br/>
      <?= _AFEGIR ?>:<br>	 
	  <input type="text"  name="preu"/> <br/><br/>
      <?= _DESCRIPCIO ?>:<br>	   
		<textarea name="descripcio" cols="30" rows="10"></textarea>
         <br><br>
		<input type="submit" value="<?= _ENVIAR ?>"/>
		
		
</form>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>