<!doctype html>
<html>

<head>
    <title>Immortus 2.0</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>Bienvenido</h1>
    <?php

    class Captura
    {


        private $documento;
        private $nombre;
        private $apellido;
        private $email;
        private $clave;

        function __construct()
        {
            //variable global
            $this->documento = $_POST['documento'];
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->email = $_POST['email'];
            $this->clave = $_POST['clave'];
        }
        function verDatos()
        {
            echo $this->documento;
            echo $this->nombre;
            echo $this->apellido;
            echo $this->email;
            echo $this->clave;
        }

        function guardarBD()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "php_loco";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO personas VALUES ('$this->documento', '$this->nombre', '$this->apellido','$this->email',sha2('$this->clave',256))";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        function actualizarBD()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "php_loco";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE personas set nombre='$this->nombre', apellido='$this->apellido',email='$this->email',clave=sha2('$this->clave',256) WHERE documento='$this->documento'";

            if ($conn->query($sql) === TRUE) {
                echo "ok";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }

        function consultarDB(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "php_loco";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM personas";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "documento: " . $row["documento"]. " - Name: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
              }
            } else {
              echo "0 results";
            }

            $conn->close();

        }


    }

    $o = new Captura();
    if($_POST['accion']=="Guardar"){
        $o->guardarBD();
    }else if($_POST['accion']=="Actualizar"){
        $o->actualizarBD();
    }else if($_POST['accion']=="Consultar"){
        $o->consultarDB();
    }
   

 



    ?>

</body>

</html>