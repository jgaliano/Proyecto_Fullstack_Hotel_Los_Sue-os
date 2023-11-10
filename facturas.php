<?php

require_once 'includes/cabecera.php';

$sql = "SELECT * FROM Facturas";
$resultado = mysqli_query($db, $sql);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Imprimir facturas</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Facturas
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha Factura</th>
                                <th>Nombre Factura NIT</th>
                                <th>NIT</th>
                                <th>Monto Facturado</th>
                                <th>Imprimir</th>
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
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaFactura'])) . "</td>";
                                    echo "<td>{$fila['nombre_nit']}</td>";
                                    echo "<td>{$fila['NIT']}</td>";
                                    $precioFormateado = number_format($fila['monto'], 2, '.', ',');
                                    echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                
                                    echo '<td><a class="btn btn-primary" href="bkphp/facturabk.php?id=' . $fila['ID'] . '">Imprimir</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>No hay Facturas registradas.</p>";
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