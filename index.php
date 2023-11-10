<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hotel Los Sueños</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="css/indexStyles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Header -->
    <header class="masthead position-relative">
        <div class="container">
            <!-- Contenido del header -->
            <div class="btns-social">
                <a class=" btn-social " href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class=" btn-social " href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class=" btn-social " href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="decorative-line"></div>
            <div class="masthead-subheading"> <img src="img/logo_pequeno.png" alt="logo"></div>
            <div class="decorative-line2"></div>
            <div class="masthead-heading text-uppercase"> <img src="img/titulo_peqeuno.png" alt="title"></div>
            <!-- Barra de navegación -->
            <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav mx-auto text-uppercase py-4 py-lg-0">
                            <li class="nav-item"><a class="nav-link fs-3" href="#portfolio">Habitaciones</a></li>
                            <li class="nav-item"><a class="nav-link fs-3" href="#amenidades">Amenidades</a></li>
                            <li class="nav-item"><a class="nav-link fs-3" href="#nosotros">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link fs-3" href="#contact">Contacto</a></li>
                            <li class="nav-item"><a class="nav-link fs-3" href="login.php">Ingresar</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha-inicio">Fecha de Ingeso</label>
                        <input type="date" class="form-control custom-date-input" id="fecha-inicio" name="fecha-inicio">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha-fin">Fecha de Salida</label>
                        <input type="date" class="form-control custom-date-input" id="fecha-fin" name="fecha-fin">
                    </div>
                </div>
            </div>
            <br>
            <a class="btn btn-primary btn-xl text-uppercase" href="registro.php">Reservar</a>
        </div>
        <!-- Video de fondo -->
        <video autoplay loop muted playsinline class="masthead-video">
            <source src="img/video_inicio.mp4" type="video/mp4">
        </video>
    </header>
    <!-- Habitaciones-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Habitaciones</h2>
                <br>
                <br>
                <h3 class="section-subheading text-muted">Cada habitación en el Hotel Los Sueños está diseñada con esmero para proporcionar una experiencia única y confortable, asegurando que su estancia en la Ciudad de Guatemala sea inolvidable.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/habitacion triple.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Triple</div>
                            <div class="portfolio-caption-subheading text-muted">Amplia, versátil, confortable, luminosa, acogedora, privada, bien equipada.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/habitacion doble.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Doble</div>
                            <div class="portfolio-caption-subheading text-muted">Íntima, cómoda, moderna, versátil, tranquila, elegante, privada.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/habitacionsimple.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Simple</div>
                            <div class="portfolio-caption-subheading text-muted">Paz y serenidad para el viajero en un espacio funcional y elegante. </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/habitacionsimpledelux.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Simple Delux</div>
                            <div class="portfolio-caption-subheading text-muted"> Elegancia refinada, con detalles exclusivos y comodidades.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/jrsuit.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Jr. Suite</div>
                            <div class="portfolio-caption-subheading text-muted">Encanto urbano, ambiente acogedor, con vistas cautivadoras.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="img/suit.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Suite</div>
                            <div class="portfolio-caption-subheading text-muted">Vistas majestuosas, atmósfera de opulencia y confort.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Amenidades-->
    <section class="page-section" id="amenidades">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Amenidades</h2>
                <br>
                <br>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <video class="videoamenidades" width="100%" height="500" autoplay loop muted playsinline>
                        <source src="img/saladereuinones.mp4" type="video/mp4">
                    </video>
                    <h4 class="my-4">Sala de reuniones</h4>

                </div>
                <div class="col-md-3">
                    <video class="videoamenidades" width="100%" height="500" autoplay loop muted playsinline>
                        <source src="img/jardines.mp4" type="video/mp4">
                    </video>
                    <h4 class="my-4">Jardines</h4>
                </div>

                <div class="col-md-3">
                    <video class="videoamenidades" width="100%" height="500" autoplay loop muted playsinline>
                        <source src="img/barlounge.mp4" type="video/mp4">
                    </video>
                    <h4 class="my-4">Lounge Bar</h4>
                </div>
                <div class="col-md-3">
                    <video class="videoamenidades" width="100%" height="500" autoplay loop muted playsinline>
                        <source src="img/piscina.mp4" type="video/mp4">
                    </video>
                    <h4 class="my-4">Piscina</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Nosotros -->
    <section class="page-section bg-light d-flex justify-content-center align-items-center" id="nosotros">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nosotros</h2>
                <br><br>
                <img class="img-fluid custom-size" src="img/hotellossuenos.jpg" alt="..." style="width: 350px; height: 300px;" />
                <img class="img-fluid custom-size" src="img/lossuenosjardin.jpg" alt="..." style="width: 350px; height: 300px;" />
                <img class="img-fluid custom-size" src="img/lossuenoslobby.jpg" alt="..." style="width: 350px; height: 300px;" />
            </div>
            <div class="row text-center">
                <div class="text-muted"><br><br>El hotel Los Sueños, ubicado en el corazón de la Ciudad de Guatemala, ofrece una experiencia única de hospitalidad y comodidad. Con impresionantes vistas de la ciudad y un ambiente acogedor, este hotel es el destino ideal para viajeros que buscan una estancia inolvidable. Con servicios de primera clase y una atención personalizada, Los Sueños garantiza una experiencia inolvidable en la vibrante capital guatemalteca.</div>
            </div>
        </div>
        </div>
    </section>
    <!-- Contacto -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contacto</h2>
            </div>
            <form id="contactForm" action="bkphp/enviar_email.php" method="post">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Nombre -->
                            <input class="form-control" id="name" name="name" type="text" placeholder="Nombre y Apellido *" required />
                        </div>
                        <div class="form-group">
                            <!-- Email -->
                            <input class="form-control" id="email" name="email" type="email" placeholder="Correo Electrónico *" required />
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Teléfono -->
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Número Telefónico *" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Mensaje -->
                            <textarea class="form-control" id="message" name="message" placeholder="Mensaje *" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Mensaje Enviado Correctamente!</div>
                    </div>
                </div>
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error al enviar el mensaje!</div>
                </div>
                <!-- Botón de envío -->
                <<div class="g-recaptcha" data-sitekey="6Lcai5UoAAAAADHzOqBQFXr31B_Pg35GgNDrKNkS" data-callback="recaptchaCallback"></div>
                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->
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
    <!-- Modales habitaciones pop up-->
    <!-- Item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Tiple</h2>
                                <img class="img-fluid d-block mx-auto" src="img/habitacion triple.jpg" alt="..." />
                                <p>Espaciosa y versátil, la Habitación Triple es perfecta para grupos pequeños o familias que buscan comodidad y funcionalidad. Ofrece tres cómodas camas, una zona de estar y un baño bien equipado. Los tonos cálidos y la iluminación ambiental crean un ambiente acogedor y relajante, ideal para compartir momentos especiales en familia o con amigos cercanos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Doble</h2>
                                <img class="img-fluid d-block mx-auto" src="img/habitacion doble.jpg" alt="..." />
                                <p>Diseñada para parejas o amigos cercanos, la Habitación Doble ofrece flexibilidad en la configuración de las camas, ya sea dos camas individuales o una cama king-size. La decoración moderna y los detalles cuidadosamente seleccionados crean un ambiente armonioso y relajante, proporcionando el espacio perfecto para descansar y disfrutar de la compañía del otro.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Simple</h2>
                                <img class="img-fluid d-block mx-auto" src="img/habitacionsimple.jpg" alt="..." />
                                <p>Pensada para el viajero individual, la Habitación Simple ofrece una estancia acogedora y funcional. La cómoda cama, el escritorio de trabajo y el baño privado proporcionan todo lo necesario para una estancia confortable. La decoración sencilla pero elegante crea un ambiente relajante y agradable, ideal para aquellos que buscan un espacio tranquilo para descansar y trabajar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Simple delux</h2>
                                <img class="img-fluid d-block mx-auto" src="img/habitacionsimpledelux.jpg" alt="..." />
                                <p> La Habitación Simple Deluxe es una indulgencia para los huéspedes individuales que buscan una experiencia excepcional. Detalles exclusivos, como la ropa de cama de alta calidad y el mobiliario elegante, elevan la estancia a un nivel superior de comodidad y estilo. El baño privado cuenta con comodidades adicionales y una ducha de lujo, brindando un espacio de relajación inigualable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Jr. Suit</h2>
                                <img class="img-fluid d-block mx-auto" src="img/jrsuit.jpg" alt="..." />
                                <p> La Junior Suite combina a la perfección estilo y comodidad para brindar a nuestros huéspedes una experiencia única. La zona de estar bien distribuida es ideal para recibir visitas o para disfrutar de momentos de tranquilidad. La cama king-size y la decoración moderna crean un ambiente cálido y acogedor, mientras que la vista encantadora de la ciudad añade un toque de encanto. Los detalles cuidadosamente seleccionados, como la iluminación ambiental, completan la experiencia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Detalles-->
                                <h2 class="text-uppercase">Habitación Suit</h2>
                                <img class="img-fluid d-block mx-auto" src="img/suit.jpg" alt="..." />
                                <p>La Suite es un oasis de lujo y confort, diseñada para ofrecer a nuestros huéspedes una experiencia inigualable. La espaciosa área de estar está elegantemente amueblada, proporcionando un espacio perfecto para el entretenimiento o la relajación. El dormitorio independiente cuenta con una lujosa cama king-size y ropa de cama de alta calidad para garantizar un descanso óptimo. Además de las comodidades premium, como el baño privado y minibar, los grandes ventanales ofrecen una vista panorámica impresionante de la ciudad, creando un ambiente de serenidad y sofisticación.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
    $(document).ready(function() {
        $("#contactForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "bkphp/enviar_email.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    alert(response.message);
                    if (response.status === "success") {
                        $("#contactForm")[0].reset();
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Error al enviar la solicitud: " + error);
                }
            });
        });
    });
    </script>
</body>

</html>