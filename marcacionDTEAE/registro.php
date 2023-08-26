<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marcacion";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar el registro si se envió el formulario
if (isset($_POST['registro'])) {
    $usuario = $_POST['usuario'];
    $codigo = $_POST['codigo'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha_nac'];
    $contra = $_POST['contra'];

    // Preparar y vincular la consulta
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, codigo, correo, telefono, contra, fecha_nac) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $usuario, $codigo, $correo, $telefono, $contra, $fecha);

    if ($stmt->execute()) {
        // Alerta verde - Usuario creado exitosamente
        echo '<div class="alert alert-success" role="alert">
            Usuario creado exitosamente. <a href="index.php" class="alert-link">Iniciar cesion</a>.
        </div>';
    } else {
        // Alerta roja - Error al registrar
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
            <use xlink:href="#exclamation-triangle-fill"/>
        </svg>
        <div>
            No se ha podido crear el usuario, por favor vuelva a intentarlo.
        </div>
    </div>';
    }

    // Cerrar la declaración preparada
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row g-0 bg-body-secondary position-relative" id="Login">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="img/Ministerio.png" class="w-100" alt="prueba">
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">

                        <h2 class="fw-bold" id="Titulo">Crear Usuario</h2>
                        <h6 class="fw-normal" id="Subtitulo">Por favor ingrese sus datos para crear su cuenta</h6>
                        <br><br>

                        <div class="form-container"> <!-- Agregamos el contenedor del formulario -->
                            <form action="" method="POST">

                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Usuario</h4>
                                    <hr>
                                    <input type="text" name="codigo" id="codigo" class="form-control" required placeholder="Ingrese su codigo de empleado" />
                                </div>
                                <br>
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Contraseña</h4>
                                    <hr>
                                    <input type="text" name="contra" id="contra" class="form-control" required placeholder="Ingrese su contraseña" />
                                </div><br>

                                <!-- Agregamos los campos de entrada del primer formulario -->
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Nombre</h4>
                                    <hr>
                                    <input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Ingrese su nombre completo" />
                                </div><br>
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Fecha de nacimiento</h4>
                                    <hr>
                                    <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required />
                                </div><br>
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Correo</h4>
                                    <hr>
                                    <input type="email" name="correo" id="correo" class="form-control" required placeholder="Ingrese su correo electrónico" />
                                </div><br>
                                <div class="form-outline mb-4">
                                    <h4 class="fw-bold" id="Titulo">Teléfono</h4>
                                    <hr>
                                    <input type="tel" name="telefono" id="telefono" class="form-control" required placeholder="Ingrese su número de teléfono" />
                                </div><br>
                                <!-- ... (otros campos de entrada del primer formulario) ... -->

                                <button type="submit" name="registro" value="Registrar" class="btn btn-primary btn-block mb-4" id="Entrar">Registar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>