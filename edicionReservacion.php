<?php

require_once 'includes/cabecera.php';

require_once 'includes/cabecera.php';

$no_h = $_GET['id'];

require_once 'includes/conexion.php';

$consultar = "SELECT * FROM Reservaciones WHERE ID = '$no_h'";
$query = mysqli_query($db, $consultar);

$sql2 = "SELECT * FROM Habitaciones";
$resultado2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * FROM clientes";
$resultado3 = mysqli_query($db, $sql3);

if ($query) {
    $fila = mysqli_fetch_assoc($query);
} else {
    echo "Error en la consulta: " . mysqli_error($db);
}

$sqlEstado = "SELECT Estado FROM Reservaciones WHERE ID = $no_h";
$resultadoEstado = mysqli_query($db, $sqlEstado);

if ($resultadoEstado && mysqli_num_rows($resultadoEstado) > 0) {
    $filaEstado = mysqli_fetch_assoc($resultadoEstado);
    $estadoSeleccionado = $filaEstado['Estado'];
} else {
    $estadoSeleccionado = '';
}

////////////////////////////////////////////////

$sqlFechaInicio = "SELECT FechaInicio FROM Reservaciones WHERE ID = $no_h";
$resultadoFechaInicio = mysqli_query($db, $sqlFechaInicio);

if ($resultadoFechaInicio && mysqli_num_rows($resultadoFechaInicio) > 0) {
    $filaFechaInicio = mysqli_fetch_assoc($resultadoFechaInicio);
    $fechaInicioSeleccionada = $filaFechaInicio['FechaInicio'];
} else {
    $fechaInicioSeleccionada = '';
}

///////////////////////////////////////////////////////////////////////////////////////////

$sqlFechaFin = "SELECT FechaFin FROM Reservaciones WHERE ID = $no_h";
$resultadoFechaFin = mysqli_query($db, $sqlFechaFin);

if ($resultadoFechaFin && mysqli_num_rows($resultadoFechaFin) > 0) {
    $filaFechaFin = mysqli_fetch_assoc($resultadoFechaFin);
    $fechaFinSeleccionada = $filaFechaFin['FechaFin'];
} else {
    $fechaFinSeleccionada = '';
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <h1 class="mt-4 text-center">Edición de Reservaciones</h1>
            <br>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="update_reservacion.php" method="POST" class="row g-3 needs-validation mb-4"
                            novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Nombre</label>
                                <input type="text" name="r_nombre_1" value="<?= $fila['IDcliente'] ?>"
                                    class="form-control" id="preciorHabitacion" placeholder="000" disabled>
                                <input type="hidden" name="r_nombre" value="<?= $fila['IDcliente'] ?>"
                                    class="form-control" id="preciorHabitacion" placeholder="000">
                                <div class="valid-feedback">
                                    ¡Se ha seleccionado un nombre!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Número de Habitación</label>
                                <input type="text" name="r_habitacion" value="<?= $fila['NumeroHabitacion'] ?>"
                                    class="form-control" id="preciorHabitacion" placeholder="000" required>
                                <div class="valid-feedback">
                                    ¡Se ha seleccionado un número de habitación!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Estatus de Reservación</label>
                                <select class="form-select" id="validationCustom03" name="estado" required>
                                    <option value="Confirmada" <?php if ($estadoSeleccionado === 'Confirmada')
                                        echo 'selected'; ?>>Confirmada</option>
                                    <option value="Pendiente" <?php if ($estadoSeleccionado === 'Pendiente')
                                        echo 'selected'; ?>>Pendiente</option>
                                    <option value="Cancelada" <?php if ($estadoSeleccionado === 'Cancelada')
                                        echo 'selected'; ?>>Cancelada</option>
                                    <option value="Activa">Activa</option>
                                </select>
                                <div class="valid-feedback">
                                    ¡Se ha seleccionado un estatus de reservación!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="validationCustom04" name="fechaInicio"
                                    value="<?php echo $fechaInicioSeleccionada; ?>" required>
                                <div class="valid-feedback">
                                    ¡Se ha seleccionado una fecha de ingreso!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom05" class="form-label">Fecha de Salida</label>
                                <input type="date" class="form-control" id="validationCustom05" name="fechaFin"
                                    value="<?php echo $fechaFinSeleccionada; ?>" required>
                                <div class="valid-feedback">
                                    ¡Se ha seleccionado una fecha de salida!
                                </div>
                            </div>


                            <div class="col-md-12 text-center mt-4">
                                <button class="btn btn-primary" type="submit">Guardar Reservación</button>
                                <input type="hidden" name="id_reservacion" value="<?php echo $no_h; ?>">
                                <input type="hidden" name="fecha_date_in" value="<?= $fila['FechaFin'] ?>">
                                <input type="hidden" name="fecha_date_out" value="<?= $fila['FechaInicio'] ?>">
                            </div>
                        </form>
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