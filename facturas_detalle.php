<?php
require_once 'includes/cabecera.php';

$clienteID = $_GET['id'];

// Obtener los registros de la tabla Detallecargo para el cliente especificado
$consulta = "SELECT * FROM pagos WHERE estado_pago = 'Pagado' ";
$resultado = mysqli_query($db, $consulta);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detalle de Pagos pendientes de facturar</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Cuentas pendientes
                </div>
                <div class="card-body">
                    <form action="actualizar_factura.php" method="POST">
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Fecha Pago</th>
                                    <th class='text-center'>Monto</th>
                                    <th class='text-center'>Estado</th>
                                    <th class='text-center'>Metodo pago</th>
                                    <th class='text-center'>Facturar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    // Recorrer los registros y mostrarlos en el formulario
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$fila['ID']}</td>";
                                        echo "<td>" . date('d/m/Y', strtotime($fila['FechaPago'])) . "</td>";
                                        $precioFormateado = number_format($fila['Monto'], 2, '.', ',');
                                        echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                        echo "<td class='text-center'>{$fila['estado_pago']}</td>";
                                        echo "<td class='text-center'>{$fila['metodo_pago']}</td>";
                                        echo "<td class='text-center'><input type=\"checkbox\" name=\"registros_a_fac[]\" value=\"{$fila['ID']}\"> Facturar</td>";
                                        echo "</tr>";
                                    }

                                } else {
                                    echo "<tr><td colspan='5'>No hay registros para el cliente seleccionado.</td></tr>";
                                }

                                unset($_SESSION['completado']);
                                unset($_SESSION['errores']);
                                ?>

                            </tbody>
                        </table>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Ingrese el nombre del NIT" name="nombre" />
                                <label for="inputFirstName">Nombre</label>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="Ingrese el NIT" name="nit" />
                                <label for="inputFirstName">NIT</label>
                                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                            </div>
                        </div>
                        <?php

                        // Botón de submit para procesar el formulario
                        echo "<tr><td ><button type=\"submit\">Facturar Registros Seleccionados</button></td></tr>";
                        ?>
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