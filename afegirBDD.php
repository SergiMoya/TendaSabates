<?php
        
        $servername = "0.0.0.0";
        $username = "perez";
        $password = "moya1234";
        $dbname = "TendaBD";

        // Create connection
        $connect = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //make query
        $sql = "Select id, model, preu from Producte";
        $result = $conn->query($sql);
        $conn->close();

        if ($connect) {
            echo "conexion exitosa. <br />";
            $id= $_POST ['id'];
            $preu= $_POST ['preu'];
            $model= $_POST ['model'];
            $Apellido2= $_POST ['descripcio'];
    
            $consulta="insert into Producte values ('$id','$model','$preu','$descripcio')";
            
            $resultado=mysqli_query($connect,$consulta);
            
            if ($resultado) {
                echo "Producte insertat correctament <br />";
            }
            else {
                echo "Error amb insertar les dades <br />";
            }
            
            
    }

    ?>
