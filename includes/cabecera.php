<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'conexion.php' ?>;
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Reservaciones | Hotel Los Sueños</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/adminStyles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<?php
    // Verificar si el nombre del usuario está presente en la sesión
    if (isset($_SESSION['nombre_usuario'])) {
        $nombreUsuario = $_SESSION['nombre_usuario'];
    }
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
       <a class="navbar-brand ps-3" href="index.php">
        <img src="img/logoadminpequeno.png" alt="Hotel Los Sueños">
       </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $nombreUsuario; ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="cerrar.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </form>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Inicio</div>
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Administracion
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReservaciones" aria-expanded="false" aria-controls="collapseReservaciones">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Reservaciones
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseReservaciones" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="reservacion.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Reservaciones
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHabitacion" aria-expanded="false" aria-controls="collapseHabitacion">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Habitación
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseHabitacion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="habitacion.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Habitaciones
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseHuespedes" aria-expanded="false" aria-controls="collapseHuespedes">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Clientes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseHuespedes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="cliente.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Clientes
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFactura" aria-expanded="false" aria-controls="collapseFactura">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Facturación
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseFactura" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="facturas_detalle.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-down"></i></div>
                                    Crear factura
                                </a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="facturas.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-down"></i></div>
                                    Imprimir factura
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePagos" aria-expanded="false" aria-controls="collapsePagos">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Pagos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePagos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="pagos.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-down"></i></div>
                                    Registrar pago
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBar" aria-expanded="false" aria-controls="collapseBar">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Bar y Restaurante
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseBar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="barestaurante.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    Menu 
                                </a>
                                <a class="nav-link" href="pedido.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                    Pedido
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>