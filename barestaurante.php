<?php

require_once 'includes/cabecera.php';

$sql = "SELECT * FROM menu";
$resultado = mysqli_query($db, $sql);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Menu</h1>
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
                    <form class="row g-3 needs-validation mb-4" novalidate action="bkphp/barestaurantebk.php"
                        method="POST">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Nombre del Platillo/Bebida/Poste</label>
                            <input type="text" class="form-control" id="factura" name="nombre" placeholder="Platillo">
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tipo</label>
                            <select class="form-select" id="validationCustom02" name="tipo" required>
                                <option selected disabled value="">Selecciona una categoria...</option>
                                <option>Comida</option>
                                <option>Bebida</option>
                                <option>Entrada</option>
                                <option>Postre</option>
                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'tipo') : ''; ?>
                        </div>
                        <div class="col-md-8">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion"
                                rows="2"></textarea>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'descripcion') : ''; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Categoria</label>
                            <select class="form-select" id="validationCustom03" name="categoria" required>
                                <option selected disabled value="">Selecciona una categoria...</option>
                                <option>Desayuno</option>
                                <option>Almuerzo</option>
                                <option>Cena</option>
                                <option>Todos</option>
                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'categoria') : ''; ?>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="validationCustom03" name="precio" step="0.01"
                                placeholder="Precio" required>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'precio') : ''; ?>
                        </div>
                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Agregar al Menu</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Menu
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Platillo</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Accion</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if ($resultado && mysqli_num_rows($resultado) > 0) {


                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>{$fila['id']}</td>";
                                    echo "<td>{$fila['nombre']}</td>";
                                    echo "<td>{$fila['categoria']}</td>";

                                    // Formatear el precio como moneda en Quetzales
                                    $precioFormateado = number_format($fila['precio'], 2, '.', ',');
                                    echo "<td class='text-end'>Q{$precioFormateado}</td>";

                                    echo "<td>{$fila['descripcion']}</td>";
                                    echo "<td>{$fila['tipo']}</td>";
                                    echo '<td><a class="btn btn-primary" href="edicionBarestaurante.php?id=' . $fila['id'] . '">Editar</a></td>';
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