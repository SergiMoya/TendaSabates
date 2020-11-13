<?php
        
        $servername = "0.0.0.0";
        $username = "perez";
        $password = "moya1234";
        $dbname = "TendaBD";

        // Create connection
        $connect = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        //make query
        $sql = "Select model, preu, descripcio from Producte";
        $result = $connect->query($sql);
        

        if ($connect) {
            echo "conexion exitosa. <br />";
            
            $preu= $_POST['preu'];
            $model= $_POST['model'];
            $descripcio= $_POST['descripcio'];
    
            $consulta="insert into Producte (model, preu, descripcio) values ('$model','$preu','$descripcio')";
            
            $resultado=mysqli_query($connect,$consulta);
            

            

            if ($resultado) {
                echo "Producte insertat correctament <br />";
            }
            else {
                echo "Error amb insertar les dades <br />";
            }
            
            
    }
    $connect->close();
    ?>
