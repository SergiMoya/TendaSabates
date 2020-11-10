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
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="" alt="" class="img-fluid">
                        <h4 class="text-center"><?php echo $row['model'] ?></h4>
                        <a href="fitxa.php?id=<?php echo $row['id'] ?>"></a>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>

</html>