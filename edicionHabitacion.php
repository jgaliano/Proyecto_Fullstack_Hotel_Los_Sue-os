<?php 

require_once 'includes/cabecera.php';

$no_h = $_GET['id'];

require_once 'includes/conexion.php';

$consultar = "SELECT * FROM Habitaciones WHERE NumeroHabitacion = '$no_h'";
$query = mysqli_query($db, $consultar);


if ($query) {
    $fila = mysqli_fetch_assoc($query);
} else {

    echo "Error en la consulta: " . mysqli_error($db);
}

?>


        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form class="form-inline justify-content-center mt-4 mb-4">
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-4 text-center">Edición de Habitaciones</h1>
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form action="update_habitacion.php" method="POST" class="row g-3 needs-validation mb-4" novalidate>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Numero de Habitación</label>
                                        <input type="text" name="numero_h" value="<?= $fila['NumeroHabitacion']?>" class="form-control" id="numberHabitacion" placeholder="000" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Numero de Piso</label>
                                        <select name="piso_h" class="form-control" id="exampleFormControlSelect1">
                                            <option <?php if ($fila['nivel_habitacion'] == '1') echo 'selected'; ?>>1</option>
                                            <option <?php if ($fila['nivel_habitacion'] == '2') echo 'selected'; ?>>2</option>
                                            <option <?php if ($fila['nivel_habitacion'] == '3') echo 'selected'; ?>>3</option>
                                            <option <?php if ($fila['nivel_habitacion'] == '4') echo 'selected'; ?>>4</option>
                                            <option <?php if ($fila['nivel_habitacion'] == '5') echo 'selected'; ?>>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripción</label>
                                        <textarea name="desc_h" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $fila['descripcion_habitacion'] ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Tipo</label>
                                            <select name="tipo_h" class="form-select" id="validationCustom03" required>
                                                <option <?php if ($fila['TipoHabitacion'] == 'Suite Ejecutiva') echo 'selected'; ?>>Suite Ejecutiva</option>
                                                <option <?php if ($fila['TipoHabitacion'] == 'Habitación Deluxe') echo 'selected'; ?>>Habitación Deluxe</option>
                                                <option <?php if ($fila['TipoHabitacion'] == 'Estudio Ejecutivo') echo 'selected'; ?>>Estudio Ejecutivo</option>
                                                <option <?php if ($fila['TipoHabitacion'] == 'Habitación Superior') echo 'selected'; ?>>Habitación Superior</option>
                                                <option <?php if ($fila['TipoHabitacion'] == 'Suite Junior') echo 'selected'; ?>>Suite Junior</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Precio</label>
                                            <input type="text" name="precio_h" value="<?= $fila['precio']?>" class="form-control" id="preciorHabitacion" placeholder="000">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Estado</label>
                                            <select name="estado_h" class="form-select" id="validationCustom04" required>
                                                <option <?php if ($fila['estado_habitacion'] == '1') echo 'selected'; ?> value="1">Disponible</option>
                                                <option <?php if ($fila['estado_habitacion'] == '2') echo 'selected'; ?> value="2">Limpieza</option>
                                                <option <?php if ($fila['estado_habitacion'] == '3') echo 'selected'; ?> value="3">Remodelación</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-4">
                                        <button class="btn btn-primary" type="submit">Guardar Habitación</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
            </main>
            <?php require_once 'includes/footer.php';  ?>
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