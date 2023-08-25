<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<img src="img\Mined.jpeg" class="card-img-top" alt="...">
    <h3>Registro de usuarios</h3>
    <form class="form-control" action="" method="get">
        Ingresar Nombre: <input class="form-control"  type="text" name="usuario" required><br>
        Ingresar Codigo de empleado: <input type="text" name="codigo" required><br>
        Ingresar Contraseña: <input class="form-control"  type="text" name="contra" required><br>
        Ingresar Fecha de nacimiento: <input type="date" name="fecha_nac" required><br>
        Ingresar Correo: <input class="form-control"  type="email" name="correo" required><br>
        Ingresar Telefono: <input class="form-control"  type="numbrer" name="telefono" required><br>
        



        <input type="submit" name="registro" value="Registrar">
        
    </form>
</body>
</html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marcacion"; // Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['registro'])) {
        $usuario = $_GET['usuario'];
        $codigo = $_GET['codigo'];
        $correo = $_GET['correo'];
        $telefono = $_GET['telefono'];
        $fecha = $_GET['fecha_nac'];
        $sql = "INSERT INTO usuarios (usuario, codigo, correo, telefono, fecha_nac) VALUES ('$usuario', '$codigo', '$correo', '$telefono' , '$fecha')";
        if ($conn->query($sql) === TRUE) {
            echo "Registo hecho";
            echo "<a href='index.php'>Iniciar sesion</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
