<?php

require_once 'includes/cabecera.php';

$sql = "SELECT * FROM Habitaciones";
$resultado = mysqli_query($db, $sql);

$sql2 = "SELECT * FROM clientes";
$resultado2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * FROM Reservaciones";
$resultado3 = mysqli_query($db, $sql3);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Hotel Los Sueños</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Reservaciones
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Reservación</th>
                                <th>Fecha In</th>
                                <th>Fecha Out</th>
                                <th>ID Cliente</th>
                                <th>No. Habitación</th>
                                <th>Estado</th>
                                <th>Cant. Noches</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Reservaciones -->
                            <?php
                            if (isset($_SESSION['completado'])) {
                                echo "<p>{$_SESSION['completado']}</p>";
                            } elseif (isset($_SESSION['errores']['general'])) {
                                echo "<p>{$_SESSION['errores']['general']}</p>";
                            }
                            ?>

                            <?php
                            if ($resultado3 && mysqli_num_rows($resultado3) > 0) {


                                while ($fila = mysqli_fetch_assoc($resultado3)) {
                                    echo "<tr>";
                                    echo "<td>{$fila['ID']}</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaInicio'])) . "</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['FechaFin'])) . "</td>";
                                    echo "<td>{$fila['IDcliente']}</td>";
                                    echo "<td>{$fila['NumeroHabitacion']}</td>";
                                    echo "<td>{$fila['Estado']}</td>";
                                    echo "<td>{$fila['Cant_noches']}</td>";
                                    echo "<td>{$fila['r_sub']}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>No hay habitaciones registradas.</p>";
                            }

                            // Limpia las variables de sesión después de mostrar los mensajes
                            unset($_SESSION['completado']);
                            unset($_SESSION['errores']);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Clientes
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Cliente</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Tipo Documento</th>
                                <th>Nacionalidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Huespedes -->
                            <?php
                            if (isset($_SESSION['completado'])) {
                                echo "<p>{$_SESSION['completado']}</p>";
                            } elseif (isset($_SESSION['errores']['general'])) {
                                echo "<p>{$_SESSION['errores']['general']}</p>";
                            }
                            ?>

                            <?php
                            if ($resultado2 && mysqli_num_rows($resultado2) > 0) {

                                while ($fila = mysqli_fetch_assoc($resultado2)) {
                                    echo "<tr>";
                                    echo "<td>{$fila['numero_id']}</td>";
                                    echo "<td>{$fila['nombres']}</td>";
                                    echo "<td>{$fila['apellidos']}</td>";
                                    echo "<td>{$fila['telefono']}</td>";
                                    echo "<td>{$fila['correo']}</td>";
                                    echo "<td>{$fila['tipo_id']}</td>";
                                    echo "<td>{$fila['nacionalidad']}</td>";
                                    echo "<td>{$fila['estado']}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>No hay habitaciones registradas.</p>";
                            }

                            // Limpia las variables de sesión después de mostrar los mensajes
                            unset($_SESSION['completado']);
                            unset($_SESSION['errores']);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Habitaciones
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Habitación</th>
                                <th>Nivel</th>
                                <th>Tipo Habitación</th>
                                <th>Precio</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Habitaciones -->
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
                                    echo "<td>{$fila['NumeroHabitacion']}</td>";
                                    echo "<td>{$fila['nivel_habitacion']}</td>";
                                    echo "<td>{$fila['TipoHabitacion']}</td>";
                                    echo "<td>{$fila['precio']}</td>";
                                    echo "<td>{$fila['estado_habitacion']}</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<p>No hay habitaciones registradas.</p>";
                            }

                            // Limpia las variables de sesión después de mostrar los mensajes
                            unset($_SESSION['completado']);
                            unset($_SESSION['errores']);
                            ?>
                        </tbody>
                    </table>
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