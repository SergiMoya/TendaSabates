<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $product_html = '';
  while($row = $result->fetch_assoc()) {
    
    while( $product = mysqli_fetch_assoc($product_results) ) {
        $product_html .= '<div class="col-md-3 product">';
        $product_html .= '<h4>'.$product["model"].'</h4>';
        $product_html .= '<h4>Price: $'.$product["preu"].'</h4>';
        $product_html .= '</div>';
        }
        $product_html .= '<div class="clear_both"></div></div>';
        }
  }
 else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>