<!-- LOGIN DE USUARIOS -->

<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];

    // Conectarse a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "marcacion");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Consulta para verificar las credenciales del usuario
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$contra'";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($resultado) == 1) {
        // El usuario y la contraseña son correctos
        // echo "Inicio de sesión exitoso";
        header ("location: opciones.php");
    } else {
        // El usuario y/o la contraseña son incorrectos
        //echo "<div class='alert alert-danger' role='alert' align='center'>Usuario y/o contraseña incorrectos</div>";
    
        echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos! </div>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>