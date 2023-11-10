<?php require_once 'includes/cabecera.php';

$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($db, $sql);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cliente</h1>
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
                    <form class="row g-3 needs-validation mb-4" novalidate action="bkphp/clientesbk.php" method="POST">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Nombres</label>
                                <input type="text" class="form-control" id="nombres" placeholder="Nombre"
                                    name="nombres">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombres') : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" placeholder="Apellido"
                                    name="apellidos">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlInput1">Telefono</label>
                                <input type="text" class="form-control" id="telefono" placeholder="Telefono"
                                    name="telefono">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'telefono') : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03">Nacionalidad</label>
                                <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionaliad"
                                    name="nacionalidad">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nacionalidad') : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Correo Electronico</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                                    placeholder="Ingrese el correo" name="email" required>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03">Numero ID</label>
                                <input type="text" class="form-control" id="validationCustom03"
                                    placeholder="Numero identificacion" name="numero_id">
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'numero_id') : ''; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Tipo ID</label>
                                <select class="form-select" id="validationCustom03" name="tipo_id" required>
                                    <option selected disabled value="">Selecciona el tipo de ID...</option>
                                    <option>DPI</option>
                                    <option>CUI</option>
                                    <option>Pasaporte</option>
                                </select>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'tipo_id') : ''; ?>
                            </div>

                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Guardar Cliente</button>
                        </div>
                    </form>
                    <?php borrarErrores(); ?>
                </div>

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Huespedes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>Numero ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Tipo ID</th>
                                <th>Nacionalidad</th>
                                <th>Estado</th>
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
                                    echo "<td>{$fila['numero_id']}</td>";
                                    echo "<td>{$fila['nombres']}</td>";
                                    echo "<td>{$fila['apellidos']}</td>";
                                    echo "<td>{$fila['telefono']}</td>";
                                    echo "<td>{$fila['correo']}</td>";

                                    // Convertir tipo_id 
                                    $mostrarid = ($fila['tipo_id'] == 'P') ? 'Pasaporte' : $fila['tipo_id'];
                                    echo "<td>{$mostrarid}</td>";
                                    echo "<td>{$fila['nacionalidad']}</td>";

                                    // Convertir estado a "Activo" o "Inactivo"
                                    $estadoMostrado = ($fila['estado'] == 'A') ? 'Activo' : 'Inactivo';
                                    echo "<td>{$estadoMostrado}</td>";

                                    echo '<td><a class="btn btn-primary" href="edicioncliente.php?id=' . $fila['ID'] . '">Editar</a></td>';
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
    <?php require_once 'includes/footer.php' ?>
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