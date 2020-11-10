<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
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
$category_sql = "SELECT id, name FROM categories LIMIT 10";
$resultset = mysqli_query($conn, $category_sql) or die("database error:". mysqli_error($conn));
$active_class = 0 ;
$category_html = '';
$product_html = '';
while( $category = mysqli_fetch_assoc($resultset) ) {
$current_tab = "";
$current_content = "";
if(!$active_class) {
$active_class = 1;
$current_tab = 'active';
$current_content = 'in active';
}
while( $product = mysqli_fetch_assoc($product_results) ) {
    $product_html .= '<div class="col-md-3 product">';
    
    $product_html .= '<h4>'.$product["model"].'</h4>';
    $product_html .= '<h4>Price: $'.$product["preu"].'</h4>';
    $product_html .= '</div>';
    }
    $product_html .= '<div class="clear_both"></div></div>';
    }

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>