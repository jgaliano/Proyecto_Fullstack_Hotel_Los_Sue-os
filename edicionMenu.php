<?php require_once 'includes/cabecera.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form class="form-inline justify-content-center mt-4 mb-4">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-4 text-center">Edición de Huespedes</h1>
                    <br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form class="row g-3 needs-validation mb-4" novalidate>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1">Telefono</label>
                                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleFormControlInput1">CUI</label>
                                            <input type="text" class="form-control" id="cui" placeholder="CUI">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Correo Electronico</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputPassword1">Contraseña</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Tipo</label>
                                            <select class="form-select" id="validationCustom03" required>
                                                <option selected disabled value="">Selecciona el tipo de habitación...</option>
                                                <option>Confirmada</option>
                                                <option>Pendiente</option>
                                                <option>Cancelada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Area</label>
                                            <select class="form-select" id="validationCustom03" required>
                                                <option selected disabled value="">Selecciona el precio...</option>
                                                <option>Confirmada</option>
                                                <option>Pendiente</option>
                                                <option>Cancelada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Estado</label>
                                            <select class="form-select" id="validationCustom03" required>
                                                <option selected disabled value="">Selecciona el estatus de la reservación...</option>
                                                <option>Confirmada</option>
                                                <option>Pendiente</option>
                                                <option>Cancelada</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center mt-4">
                                        <button class="btn btn-primary" type="submit">Guardar Huesped</button>
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