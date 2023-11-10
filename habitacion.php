<?php require_once 'includes/cabecera.php';

$sql = "SELECT * FROM Habitaciones";
$resultado = mysqli_query($db, $sql);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Habitaciones</h1>
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
                    <form class="row g-3 needs-validation mb-4" novalidate action="bkphp/habitacionbk.php" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="numberHabitacion">Numero de Habitación</label>
                                <input type="number" class="form-control" id="numberHabitacion" name="numeroHabitacion"
                                    placeholder="000">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'numeroHabitacion') : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Numero de Piso</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="numeroPiso">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'numeroPiso') : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion"
                                rows="2"></textarea>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : ''; ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Tipo</label>
                                <select class="form-select" id="validationCustom03" name="tipo" required>
                                    <option selected disabled value="">Selecciona el tipo de habitación...</option>
                                    <option>Triple</option>
                                    <option>Doble</option>
                                    <option>Simple</option>
                                    <option>Simple Delux</option>
                                    <option>Jr. Suite</option>
                                    <option>Suite</option>
                                </select>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'tipo') : ''; ?>
                            </div>

                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="validationCustom03" name="precio"
                                    step="0.01" placeholder="Precio" required>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'precio') : ''; ?>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Estado</label>
                                <select class="form-select" id="validationCustom03" name="estado" required>
                                    <option selected disabled value="">Selecciona el estatus de la reservación...
                                    </option>
                                    <option value=1>Disponible</option>
                                    <option value=2>Limpieza</option>
                                    <option value=3>Remodelación</option>
                                </select>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'estado') : ''; ?>
                            </div>
                            <div class="form-group">
                                <br>
                                <label for="imagenHabitacion">Imagen de la Habitación</label>
                                <input type="file" class="form-control" id="imagenHabitacion" name="imagenHabitacion"
                                    accept="image/*">
                            </div>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'imagenHabitacion') : ''; ?>
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Guardar Habitación</button>
                        </div>
                    </form>
                    <?php borrarErrores(); ?>

                </div>

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Habitaciones
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>Habitación</th>
                                <th>Piso</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
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
                                    echo "<td>{$fila['NumeroHabitacion']}</td>";
                                    echo "<td>{$fila['nivel_habitacion']}</td>";
                                    echo "<td>{$fila['TipoHabitacion']}</td>";
                                    // Formatear el precio como moneda en Quetzales
                                    $precioFormateado = number_format($fila['precio'], 2, '.', ',');
                                    echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                    
                                    // Mapeo de valores numéricos a textos
                                    $estadoText = '';
                                    switch ($fila['estado_habitacion']) {
                                        case 1:
                                            $estadoText = 'Disponible';
                                            break;
                                        case 2:
                                            $estadoText = 'Limpieza';
                                            break;
                                        case 3:
                                            $estadoText = 'Remodelación';
                                            break;
                                        default:
                                            $estadoText = 'Desconocido';
                                    }

                                    echo "<td>{$estadoText}</td>";
                                    echo '<td><a class="btn btn-primary" href="
                                    edicionHabitacion.php?id=' . $fila['NumeroHabitacion'] . '">Editar</a></td>';
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