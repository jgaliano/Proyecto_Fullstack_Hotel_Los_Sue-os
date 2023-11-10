<?php
require_once 'includes/cabecera.php';

require_once 'includes/cabecera.php';

$no_h = $_GET['id'];
require_once 'includes/conexion.php';


$consultar = "SELECT * FROM clientes WHERE ID = '$no_h'";
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
            <h1 class="mt-4 text-center">Edición de Clientes</h1>
            <br>
            <form action="update_cliente.php" method="POST">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form class="row g-3 needs-validation mb-4" novalidate>
                                <div class="form-group row">
                                    
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Nombres</label>
                                        <input type="text" value="<?= $fila['nombres'] ?>" class="form-control"
                                            id="nombres" name="nombres">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Apellidos</label>
                                        <input type="text" value="<?= $fila['apellidos'] ?>" class="form-control"
                                            id="apellidos" placeholder="Apellido" name="apellidos">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleFormControlInput1">Telefono</label>
                                        <input type="text" value="<?= $fila['telefono'] ?>" class="form-control"
                                            id="telefono" placeholder="Telefono" name="telefono">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03">Nacionalidad</label>
                                        <input type="text" value="<?= $fila['nacionalidad'] ?>" class="form-control"
                                            id="nacionalidad" placeholder="Nacionaliad" name="nacionalidad">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Correo Electronico</label>
                                        <input type="email" value="<?= $fila['correo'] ?>" class="form-control"
                                            id="email" aria-describedby="emailHelp" placeholder="Enter email"
                                            name="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationCustom03">Numero ID</label>
                                        <input type="text" value="<?= $fila['numero_id'] ?>" class="form-control"
                                            id="validationCustom03" placeholder="Numero identificacion"
                                            name="numero_id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">Tipo ID</label>
                                        <select name="tipo_ID" class="form-control" id="exampleFormControlSelect1">
                                            <option <?php if ($fila['tipo_id'] == 'CUI')
                                                echo 'selected'; ?>>CUI</option>
                                            <option <?php if ($fila['tipo_id'] == 'DPI')
                                                echo 'selected'; ?>>DPI</option>
                                            <option <?php if ($fila['tipo_id'] == 'P')
                                                echo 'selected'; ?>>Pasaporte
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">Estado</label>
                                        <select name="estado" class="form-control" id="exampleFormControlSelect1">
                                            <option <?php if ($fila['estado'] == 'A')
                                                echo 'selected'; ?>>A</option>
                                            <option <?php if ($fila['estado'] == 'I')
                                                echo 'selected'; ?>>I</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center mt-4">
                                    <input type="hidden" name="id" value="<?php echo $no_h; ?>">
                                    <button class="btn btn-primary" type="submit">Guardar Cliente</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <a id="observacion">*El campo Estado = A/activo I/inactivo</a>
            </form>
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