<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Password Reset | Hotel Los Sueños</title>
    <link href="css/loginStyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<header class="masthead position-relative">
    <div class="decorative-line"></div>
    <div class="masthead-subheading"> <img src="img/logo_pequeno.png" alt="logo"></div>
    <div class="decorative-line2"></div>
</header>

<body class="bg-primary">
    <div id="layoutAuthentication" style="min-height: 100vh;">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Recuperacion de Contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Ingrese su dirección de correo electrónico y le enviaremos el procedimiento para restablecer su contraseña.</div>
                                    <form method="POST" action="bkphp/passwordbk.php" id="resetPasswordForm">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Correo Electronico</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="login.php">Regresar al Inicio de Sesion</a>
                                            <button type="submit" class="btn btn-primary">Restablecer Contraseña</button>
                                        </div>
                                    </form>
                                    <!-- Mostrar mensaje de éxito o error aquí -->
                                    <?php
                                    session_start();
                                    if (isset($_SESSION['completado'])) {
                                        echo "<div class='alert alert-success'>" . $_SESSION['completado'] . "</div>";
                                        unset($_SESSION['completado']); // Limpiar la variable de sesión después de mostrar el mensaje
                                    } elseif (isset($_SESSION['errores']['general'])) {
                                        echo "<div class='alert alert-danger'>" . $_SESSION['errores']['general'] . "</div>";
                                        unset($_SESSION['errores']['general']); // Limpiar la variable de sesión después de mostrar el mensaje de error
                                    }
                                    ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="registro.php">¿Necesitas una cuenta? ¡Regístrate!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>