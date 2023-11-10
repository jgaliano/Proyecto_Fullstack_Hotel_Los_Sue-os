<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registro | Hotel Los Sueños</title>
    <link href="css/loginStyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<header class="masthead position-relative">
    <a href="index.php">
        <button type="btn" class="btn btn-primary-header">Inicio</button>
    </a>
    <div class="decorative-line"></div>
    <div class="masthead-subheading"> <img src="img/logo_pequeno.png" alt="logo"></div>
    <div class="decorative-line2"></div>
</header>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 custom-container">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Registrar Cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($_SESSION['completado'])) : ?>
                                        <div class="alerta">
                                            <?= $_SESSION['completado'] ?>
                                        </div>
                                    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                                        <div class="alerta alerta-error">
                                            <?= $_SESSION['errores']['general'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <form action="bkphp/registrobk.php" method="POST">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="nombre" />
                                                    <label for="inputFirstName">Nombre</label>
                                                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="apellidos" />
                                                    <label for="inputLastName">Apellidos</label>
                                                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" />
                                            <label for="inputEmail">Correo Electronico</label>
                                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="pass1" />
                                                    <label for="inputPassword">Contraseña</label>
                                                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'pass1') : ''; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="pass2" />
                                                    <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Agrega el widget de reCAPTCHA al formulario de registro -->
                                        <div class="g-recaptcha" data-sitekey="6Lcai5UoAAAAADHzOqBQFXr31B_Pg35GgNDrKNkS" data-callback="recaptchaCallback"></div>
                                        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'g-recaptcha-response') : ''; ?>

                                        <div class="mt-4 mb-0">
                                            <input class="btn btn-primary btn-block" type="submit" value="Crear Cuenta">
                                        </div>
                                    </form>
                                    <?php borrarErrores(); ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Ya tienes cuenta? Inicia Sesión</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php require_once 'includes/footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>