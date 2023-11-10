<?php 


require_once 'includes/cabecera.php'; 
require_once 'includes/cabecera.php';

$no_h = $_GET['id'];

require_once 'includes/conexion.php';

$consultar = "SELECT * FROM menu WHERE id = '$no_h'";
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
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-4 text-center">Edición de Menu</h1>
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form class="row g-3 needs-validation mb-4" novalidate action="update_barestaurante.php" method="POST">
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nombre del Platillo/Bebida/Poste</label>
                                        <input type="text" class="form-control" value="<?= $fila['nombre']?>" id="factura" placeholder="Platillo" name="b_platillo">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom02" class="form-label">Categoria</label>
                                        <select class="form-select" id="validationCustom02" required name="b_categoria">
                                            <option <?php if ($fila['categoria'] == 'Desayuno') echo 'selected'; ?>>Desayuno</option>
                                            <option <?php if ($fila['categoria'] == 'Almuerzo') echo 'selected'; ?>>Almuerzo</option>
                                            <option <?php if ($fila['categoria'] == 'Cena') echo 'selected'; ?>>Cena</option>
                                            <option <?php if ($fila['categoria'] == 'Todos') echo 'selected'; ?>>Todos</option>
                                        </select>
                                        <div class="valid-feedback">
                                            ¡Se ha seleccionado un número de habitación!
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="exampleFormControlTextarea1">Descripción</label>
                                        <textarea class="form-control" name="b_descripcion" id="exampleFormControlTextarea1" rows="2"><?= $fila['descripcion'] ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">Precio</label>
                                        <input type="text" name="b_precio" class="form-control" value="<?= $fila['precio']?>" id="factura" placeholder="Platillo">
                                        <div class="valid-feedback">
                                            ¡Se ha seleccionado el precio!
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-4">
                                        <button class="btn btn-primary" type="submit">Guardar Menu</button>
                                        <input type="hidden" name="id_bar" value="<?php echo $no_h; ?>">
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