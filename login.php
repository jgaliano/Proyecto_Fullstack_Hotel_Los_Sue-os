<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Hotel Los Sueños</title>
    <link href="css/loginStyles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <main>

            <header class="masthead position-relative">
                <a href="index.php">
                    <button type="btn" class="btn btn-primary-header">Inicio</button>
                </a>
                <div class="decorative-line"></div>
                <div class="masthead-subheading"> <img src="img/logo_pequeno.png" alt="logo"></div>
                <div class="decorative-line2"></div>
            </header>
            <div class="container login-container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                            </div>
                            <div class="card-body">


                                <?php if (isset($_SESSION['error_login'])): ?>
                                    <div class="alerta alerta-error">
                                        <?= $_SESSION['error_login']; ?>
                                    </div>
                                <?php endif; ?>


                                <form method="POST" action="bkphp/loginbk.php">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="email" type="email"
                                            placeholder="name@example.com" required>
                                        <label for="inputEmail">Correo Electrónico</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" name="password" type="password"
                                            placeholder="Password" required>
                                        <label for="inputPassword">Contraseña</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                            value="" />
                                        <label class="form-check-label" for="inputRememberPassword">Recordar
                                            Contraseña</label>
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6Lcai5UoAAAAADHzOqBQFXr31B_Pg35GgNDrKNkS">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.php">¿Has olvidado tu contraseña?</a>
                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <?php borrarErrores(); ?>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="registro.php">¿Necesitas una cuenta? ¡Regístrate!</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/carusel1.png" alt="Imagen 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/carusel2.png" alt="Imagen 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/carousel3.png" alt="Imagen 3">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class=".col-lg-4 text-lg-start">
                    <img class="footer-logo" src="img/titulo_peqeuno.png" alt="titulo logo">
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Copyright &copy; Hotel Los Sueños 2023</a>
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none me-3" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>