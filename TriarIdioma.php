<?php
$lang = "es";


session_start();
 

if(isset($_POST["lang"])){
  $lang = $_POST["lang"];
  if(!empty($lang)){
    $_SESSION["lang"] = $lang;
  }
}



$frases = array(
    "es" => array(
        "inici" => "Inici",
        "carrito" => "Carreto",
        "contacte" => "Contacte",
        "afegir" => "Afegir Productes",
        "idioma" => "Idioma",
        "info" => "Mes Informacio",
        "afegir" => "Afegir",
        "preu" => "Preu"
    ),
    "en" => array(
        "inici" => "Home",
        "carrito" => "Cart",
        "contacte" => "Contact",
        "afegir" => "Add Product",
        "idioma" => "Language",
        "info" => "More Information",
        "afegir" => "Add",
        "preu" => "Price"
    )

);
?>