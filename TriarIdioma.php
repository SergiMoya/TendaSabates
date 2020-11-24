<?php
$lang = "es";

if (isset($_GET["lang"]) && $_GET["lang"] != "") {
    if ($_GET["lang"] == "en" || $_GET["lang"] == "es") {
        $lang = $_GET["lang"];
    }
}

$frases = array(
    "es" => array(
        "inici" => "Inici",
        "carrito" => "Carreto",
        "contacte" => "Contacte",
        "afegir" => "Afegir Productes",
        "idioma" => "Idioma",
        "info" => "Mes Informacio"
    ),
    "en" => array(
        "inici" => "Home",
        "carrito" => "Cart",
        "contacte" => "Contact",
        "afegir" => "Add Product",
        "idioma" => "Language",
        "info" => "More Information"
    )

);
?>