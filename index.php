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
    <title>Tenda de Sabates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

            <div class="col-sm-4">
            <div class="col-sm-6"><img src="public/imatges/<?php echo $id; ?>.jpg" alt="" class="img-fluid"></div>
                <?php echo $model . " " . $preu . "€ "."<br>"  ."<a href='Fitxa.php?id=$id'>Mes informacio</a>" . "<br><br>"; ?>
            
            </div>

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