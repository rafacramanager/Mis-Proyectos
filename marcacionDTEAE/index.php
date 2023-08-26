<!-- LOGIN DE USUARIOS -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["codigo"];
    $contra = $_POST["contra"];

    $conexion = mysqli_connect("localhost", "root", "", "marcacion");

    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    $consulta = "SELECT * FROM usuarios WHERE codigo = '$usuario' AND contra = '$contra'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        header("location: opciones.php");
    } else {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill"/>
            </svg>
            <div>
                Usuario o contraseña no encontrada...
            </div>
        </div>';
    }

    mysqli_close($conexion);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Cesion</title>
    <link rel="icon" href="img/Mined.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row g-0 bg-body-secondary position-relative" id="Login">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="img/Ministerio.png" class="w-100 img-fluid" alt="Logo">
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">

                        <h2 class="fw-bold" id="Titulo">Control De Horario</h2>
                        <h6 class="fw-normal" id="Subtitulo">Por favor ingrese sus datos</h6>
                        <br><br>

                        <div class="form-container"> <!-- Agregamos el contenedor del formulario -->
                            <form action="index.php" method="POST">

                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Usuario</h4>
                                    <hr>
                                    <input type="text" name="codigo" id="codigo" class="form-control" required placeholder="Ingrese su usuario" />
                                </div>
                                <br>
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Contraseña</h4>
                                    <hr>
                                    <input type="password" name="contra" id="contra" class="form-control" required placeholder="Ingrese su contraseña" />
                                </div><br>
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                        <div class="mb-5 form-check form-switch">
                                            <input type="checkbox" class="form-check-input" role="switch" id="show-password" disabled>
                                            <label class="form-check-label" for="show-password">
                                                <h6 class="fw-normal" id="Subtitulo">Ver contraseña</h6>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <a href="index.php">
                                                <h6 class="fw-normal" id="Subtitulo">¿Olvido sus credenciales?</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-4" id="Entrar">Entrar</button>
                                <div class="text-center">
                                    <h5 id="Usuario">¿No tienes una cuenta? <a href="registro.php">Registrar</a></h5>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script>
        const showPasswordCheckbox = document.getElementById("show-password");
        const passwordInput = document.getElementById("contra");

        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });

        passwordInput.addEventListener("input", function() {
            if (passwordInput.value.length > 0) {
                showPasswordCheckbox.disabled = false;
            } else {
                showPasswordCheckbox.disabled = true;
                showPasswordCheckbox.checked = false;
                passwordInput.type = "password";
            }
        });
        // Agregar un evento para limpiar el formulario después de enviarlo
        loginForm.addEventListener("submit", function() {
            // Restablecer los valores de los campos del formulario
            passwordInput.type = "password";
            passwordInput.value = "";
            showPasswordCheckbox.checked = false;
            showPasswordCheckbox.disabled = true;
        });
    </script>




</body>

</html>