<?php

require_once 'includes/cabecera_out.php';

require_once 'includes/conexion.php';


if (isset($_SESSION['clienteID'])) {
    $clienteID = $_SESSION['clienteID'];

}

$sql = "SELECT * FROM Reservaciones where Estado != 'Cancelada' and IDcliente = $clienteID";
$resultado = mysqli_query($db, $sql);



$sql2 = "SELECT * FROM Habitaciones where estado_habitacion = 1";
$resultado2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * FROM clientes where id = $clienteID";
$resultado3 = mysqli_query($db, $sql3);


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br>
            <br>
            <br>
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Habitaciones</h2>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                    <img class="img-fluid" src="img/habitacion triple.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Triple - habitacion 101</div>
                                    <div class="portfolio-caption-subheading text-muted">Amplia, versátil, confortable,
                                        luminosa, acogedora, privada, bien equipada.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                    <img class="img-fluid" src="img/habitacion doble.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Doble - habitacion 102</div>
                                    <div class="portfolio-caption-subheading text-muted">Íntima, cómoda, moderna,
                                        versátil, tranquila, elegante, privada.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4">
                            <!-- Item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                    <img class="img-fluid" src="img/habitacionsimple.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Simple - habitacion 103</div>
                                    <div class="portfolio-caption-subheading text-muted">Paz y serenidad para el viajero
                                        en un espacio funcional y elegante. </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                            <!-- Item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                    <img class="img-fluid" src="img/habitacionsimpledelux.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Simple Delux - habitacion 104</div>
                                    <div class="portfolio-caption-subheading text-muted"> Elegancia refinada, con
                                        detalles exclusivos y comodidades.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                            <!-- Item 5-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                    <img class="img-fluid" src="img/jrsuit.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Jr. Suit - habitacion 105</div>
                                    <div class="portfolio-caption-subheading text-muted">Encanto urbano, ambiente
                                        acogedor, con vistas cautivadoras.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <!-- Item 6-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                    <img class="img-fluid" src="img/suit.jpg" alt="..." />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">Suit - habitacion 106</div>
                                    <div class="portfolio-caption-subheading text-muted">Vistas majestuosas, atmósfera
                                        de opulencia y confort.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h1 class="mt-4">Realice una Reservacion</h1>
            <div class="container">
                <div class="row">
                    <?php if (isset($_SESSION['completado'])): ?>
                        <div class="alerta">
                            <?= $_SESSION['completado'] ?>
                        </div>
                    <?php elseif (isset($_SESSION['errores']['general'])): ?>
                        <div class="alerta alerta-error">
                            <?= $_SESSION['errores']['general'] ?>
                        </div>
                    <?php endif; ?>
                    <form class="row g-3 needs-validation mb-4" novalidate action="bkphp/reserva_out.php" method="POST">
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nombre</label>

                            <select class="form-select" id="validationCustom01" name="r_nombre" required>
                                <option selected disabled value="">Selecciona un nombre...</option>
                                <?php
                                if (isset($_SESSION['completado'])) {
                                    echo "<p>{$_SESSION['completado']}</p>";
                                } elseif (isset($_SESSION['errores']['general'])) {
                                    echo "<p>{$_SESSION['errores']['general']}</p>";
                                }
                                ?>
                                <?php
                                if ($resultado3 && mysqli_num_rows($resultado3) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado3)) {
                                        echo "<option value='{$fila['ID']}'>{$fila['nombres']} {$fila['apellidos']}</option>";
                                    }
                                } else {
                                    echo "<p>No hay clientes registrados.</p>";
                                }
                                unset($_SESSION['completado']);
                                unset($_SESSION['errores']);
                                ?>
                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'r_nombre') : ''; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Número de Habitación</label>
                            <select class="form-select" id="validationCustom02" name="r_habitacion" required>
                                <option selected disabled value="">Selecciona un número de habitación...</option>
                                <?php
                                if (isset($_SESSION['completado'])) {
                                    echo "<p>{$_SESSION['completado']}</p>";
                                } elseif (isset($_SESSION['errores']['general'])) {
                                    echo "<p>{$_SESSION['errores']['general']}</p>";
                                }
                                ?>
                                <?php
                                if ($resultado2 && mysqli_num_rows($resultado2) > 0) {
                                    while ($fila = mysqli_fetch_assoc($resultado2)) {
                                        echo "<option>{$fila['NumeroHabitacion']}</option>";
                                    }
                                } else {
                                    echo "<p>No hay habitaciones registradas.</p>";
                                }
                                unset($_SESSION['completado']);
                                unset($_SESSION['errores']);
                                ?>
                            </select>
                            <div class="valid-feedback">
                                ¡Se ha seleccionado un número de habitación!
                            </div>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'r_habitacion') : ''; ?>
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">Fecha de Ingreso</label>
                            <input type="date" class="form-control" id="validationCustom04" name="r_fecha_in" required>
                            <div class="valid-feedback">
                                ¡Se ha seleccionado una fecha de ingreso!
                            </div>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'r_fecha_in') : ''; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom05" class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" id="validationCustom05" name="r_fecha_out" required>
                            <div class="valid-feedback">
                                ¡Se ha seleccionado una fecha de salida!
                            </div>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'r_fecha_out') : ''; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleFormControlInput1" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono"
                                name="telefono">
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefono') : ''; ?>
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Guardar Reservación</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Reservaciones Realizadas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>ID Habitación</th>
                                <th>Estado</th>
                                <th>Cant. Noches</th>
                                <th>Subtotal</th>
                                <th>Cancelar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            if (isset($_SESSION['completado'])) {
                                echo "<p>{$_SESSION['completado']}</p>";
                            } elseif (isset($_SESSION['errores']['general'])) {
                                echo "<p>{$_SESSION['errores']['general']}</p>";
                            }
                            ?>

                            <?php
                            if ($resultado && mysqli_num_rows($resultado) > 0) {


                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaInicio'])) . "</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaFin'])) . "</td>";
                                    echo "<td>{$fila['NumeroHabitacion']}</td>";
                                    echo "<td>{$fila['Estado']}</td>";
                                    echo "<td>{$fila['Cant_noches']}</td>";
                                    echo "<td>{$fila['r_sub']}</td>";
                                    echo '<td><a class="btn btn-primary" href="Cancela_reserva.php?id=' . $fila['ID'] . '">Cancelar</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>No hay habitaciones registradas.</p>";
                            }


                            unset($_SESSION['completado']);
                            unset($_SESSION['errores']);
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </main>
    <?php require_once 'includes/footer.php'; ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>