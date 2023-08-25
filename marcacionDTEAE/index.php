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
    
        echo "<div class='alert alert-danger' role='alert' align='center'>Usuario o contraseña incorrectos! </div>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <div class="container fluid" align="center">
        <br>
        <br>
        <img class="img fluid" src="img\logo-mined-2022.png" alt="" width="350px">
        <br>
        <br>
        <h3>Aplicación de</h3>
        <h2>Marcación Diaria</h2>
        <div class="col-5">
                <form action="index.php" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="usuario" id="usuario" class="form-control" />
                    <label class="form-label" for="usuario">usuario</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="contra" id="contra" class="form-control" />
                    <label class="form-label" for="contra">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Recordarme </label>
                    </div>
                    </div>

                    <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Olvido su contraseña?</a>
                    </div>
                </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>No es usuario? <a href="#!">Registrese</a></p>
                <!-- <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
                </button> -->
            </div>
            </form>
        </div>
    </div>


</body>
</html>

