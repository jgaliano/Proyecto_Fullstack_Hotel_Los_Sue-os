<?php

require_once 'includes/cabecera.php';

$sql = "select clienteID, obten_nombre_completo(clienteID)as nombre,sum(valor) total from detallecargo d where estado_cargo = 'Pendiente' group by clienteID";
$resultado = mysqli_query($db, $sql);


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Clientes pendientes de pago</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Cuentas pendientes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th class='text-center'>No. Cliente</th>
                                <th class='text-center'>Nombre cliente</th>
                                <th class='text-center'>Total pendiente de pago</th>
                            </tr>
                        </thead>
                        <tfoot>

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
                                    echo "<td class='text-center'>{$fila['clienteID']}</td>";
                                    echo "<td class='text-center'>{$fila['nombre']}</td>";
                                    $precioFormateado = number_format($fila['total'], 2, '.', ',');
                                    echo "<td class='text-center'>Q{$precioFormateado}</td>";
                                    echo '<td></a> <a class="btn btn-primary" href="paybk.php?id=' . $fila['clienteID'] . '">Ver detalle</a></td>';
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