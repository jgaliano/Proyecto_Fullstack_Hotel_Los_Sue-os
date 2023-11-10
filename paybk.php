<?php
require_once 'includes/cabecera.php';

$clienteID = $_GET['id'];

// Obtener los registros de la tabla Detallecargo para el cliente especificado
$consulta = "SELECT * FROM Detallecargo WHERE clienteID = $clienteID AND estado_cargo = 'Pendiente' ";
$resultado = mysqli_query($db, $consulta);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Detalle de Cargos</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Cuentas pendientes
                </div>
                <div class="card-body">
                    <form action="actualizar_pago.php" method="POST">
                        <table id="datatablesSimple" class="table">
                            <thead>
                                <tr>
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Fecha Cargo</th>
                                    <th class='text-center'>Descripción</th>
                                    <th class='text-center'>Valor</th>
                                    <th class='text-center'>Estado</th>
                                    <th class='text-center'>Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado && mysqli_num_rows($resultado) > 0) {
                                    // Recorrer los registros y mostrarlos en el formulario
                                    while ($fila = mysqli_fetch_assoc($resultado)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$fila['ID']}</td>";
                                        echo "<td>" . date('d/m/Y', strtotime($fila['fechaCargo'])) . "</td>";
                                        echo "<td class='text-center'>{$fila['descripcion']}</td>";
                                        $precioFormateado = number_format($fila['valor'], 2, '.', ',');
                                        echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                        echo "<td class='text-center'>{$fila['estado_cargo']}</td>";
                                        echo "<td class='text-center'><input type=\"checkbox\" name=\"registros_a_pagar[]\" value=\"{$fila['ID']}\"> Pagar</td>";
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
                        <select name="metodo_pago">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta de crédito">Tarjeta de crédito</option>
                            <option value="Tarjeta de débito">Tarjeta de débito</option>
                        </select>
                        <?php

                        // Botón de submit para procesar el formulario
                        echo "<tr><td ><button type=\"submit\">Pagar Registros Seleccionados</button></td></tr>";
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'includes/footer.php'; ?>
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