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
        //make query
        $sql = "Select id, model, preu from Producte";
        $result = $conn->query($sql);
        $conn->close();

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    

    <div class="container">
        <div class="row">

            <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $model = $row["model"];
                        $preu = $row["preu"];
                        
                       
            ?>

            <div class="col-sm-4"><?php echo $model . " " . $preu . "€ "  ."<a href='fitxa.php?id=$id'>Mes informacio</a>" . "<br><br>"; ?></div>

            <?php
                    }
                }else{
                    echo "0 results";
                }
            ?>

        </div>
    </div>

</body>
</html>