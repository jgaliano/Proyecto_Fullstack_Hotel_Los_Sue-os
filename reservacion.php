<?php

require_once 'includes/cabecera.php';

$sql = "SELECT * FROM Reservaciones";
$resultado = mysqli_query($db, $sql);

$sql2 = "SELECT * FROM Habitaciones";
$resultado2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * FROM clientes";
$resultado3 = mysqli_query($db, $sql3);


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Reservaciones</h1>
            <div class="container">
                <div class="row">
                    <?php if (isset($_SESSION['completado'])) : ?>
                        <div class="alerta">
                            <?= $_SESSION['completado'] ?>
                        </div>
                    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                        <div class="alerta alerta-error">
                            <?= $_SESSION['errores']['general'] ?>
                        </div>
                    <?php endif; ?>
                    <form class="row g-3 needs-validation mb-4" novalidate action="bkphp/reservacionbk.php" method="POST">
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
                            <div class="valid-feedback">
                                ¡Se ha seleccionado un nombre!
                            </div>
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
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Guardar Reservación</button>
                            <td><a class="btn btn-primary" href="bkphp/reporte_res.php">Reporte Reservaciones</a></td>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Reservaciones
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Salida</th>
                                <th>ID Cliente</th>
                                <th>ID Habitación</th>
                                <th>Estado</th>
                                <th>Cant. Noches</th>
                                <th>Subtotal</th>
                                <th>Editar</th>
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
                                    echo "<td>{$fila['ID']}</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaInicio'])) . "</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaFin'])) . "</td>";
                                    echo "<td>{$fila['IDcliente']}</td>";
                                    echo "<td>{$fila['NumeroHabitacion']}</td>";
                                    echo "<td>{$fila['Estado']}</td>";
                                    echo "<td>{$fila['Cant_noches']}</td>";
                                    
                                     // Formatear el precio como moneda en Quetzales
                                     $precioFormateado = number_format($fila['r_sub'], 2, '.', ',');
                                     echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                    echo '<td><a class="btn btn-primary" href="edicionReservacion.php?id=' . $fila['ID'] . '">Editar</a></td>';
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
    <?php require_once 'includes/footer.php'  ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>