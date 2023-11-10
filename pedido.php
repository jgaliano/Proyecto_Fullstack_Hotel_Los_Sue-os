<?php

require_once 'includes/cabecera.php';

$sql = "SELECT * FROM menu";
$resultado = mysqli_query($db, $sql);

$sql2 = "SELECT * FROM Detallecargo where estado_cargo = 'Pendiente' order by id desc";
$resultado2 = mysqli_query($db, $sql2);

$sql3 = "SELECT * FROM clientes where estado = 'A'";
$resultado3 = mysqli_query($db, $sql3);

?>
<style>
    #dato_desc {
        display: none;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cargar Cuenta/Pedido</h1>
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
                <!-- Primera columna (Tabla izquierda) -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Menus Disponibles
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Platillo</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo "<tr>";
                                            echo "<td>{$fila['id']}</td>";
                                            echo "<td>{$fila['nombre']}</td>";
                                            echo "<td>Q{$fila['precio']}</td>";
                                            echo '<td><button class="btn btn-primary agregar" data-id="' . $fila['id'] . '">+</button></td>';
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No hay habitaciones registradas.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Productos Seleccionados
                        </div>
                        <div class="card-body">
                            <table class="table" id="tabla-seleccionados">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total:</th>
                                        <th id="subtotal">Q0.00</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-4">
                <div class="row">
                    <form class="row g-3 needs-validation mb-4" action="bkphp/pedidobk.php" method="POST" novalidate>
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Cliente</label>
                            <select class="form-select" id="validationCustom01" name="r_nombre" required>

                                <option selected disabled value="">Selecciona un nombre...</option>
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
                                        echo "<option value= {$fila['ID']}>{$fila['nombres']}</option>";
                                    }
                                } else {
                                    echo "<p>No hay habitaciones registradas.</p>";
                                }
                                unset($_SESSION['completado']);
                                unset($_SESSION['errores']);
                                ?>
                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'r_nombre') : ''; ?>
                        </div>


                        <div class="col-md-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Cargar Cuenta</button>
                        </div>
                        <input type="hidden" id="subtotalHidden" name="subtotal" value="">
                        <textarea id="dato_desc" class="form-control" name="dato_desc" rows="5" cols="40"></textarea>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pedidos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID cliente</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Total</th>
                                <th>Cancelar</th>
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
                            if ($resultado2 && mysqli_num_rows($resultado2) > 0) {


                                while ($fila = mysqli_fetch_assoc($resultado2)) {
                                    echo "<tr>";
                                    echo "<td>{$fila['ID']}</td>";
                                    echo "<td>{$fila['clienteID']}</td>";
                                    echo "<td>" . date('d/m/Y', strtotime($fila['fechaCargo'])) . "</td>";
                                    echo "<td>{$fila['descripcion']}</td>";
                                    $precioFormateado = number_format($fila['valor'], 2, '.', ',');
                                    echo "<td class='text-end'>Q{$precioFormateado}</td>";
                                    echo '<td><a class="btn btn-primary" href="Cancela_cargo.php?id=' . $fila['ID'] . '">Cancelar</a></td>';
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


<script>

    document.addEventListener("DOMContentLoaded", function () {

        const tablaSeleccionados = document.getElementById("tabla-seleccionados");
        const botonesAgregar = document.querySelectorAll(".agregar");
        const subtotalElement = document.getElementById("subtotal");


        let subtotal = 0;


        function calcularSubtotal() {
            subtotal = 0;
            tablaSeleccionados.querySelectorAll("tbody tr").forEach((fila) => {
                const precio = parseFloat(fila.querySelector("td:nth-child(2)").textContent.replace("Q", ""));
                const cantidad = parseInt(fila.querySelector(".cantidad").textContent);
                subtotal += precio * cantidad;
            });
            subtotalElement.textContent = `Q${subtotal.toFixed(2)}`;


            document.getElementById("subtotalHidden").value = subtotal.toFixed(2);
        }


        botonesAgregar.forEach((boton) => {
            boton.addEventListener("click", function () {

                const idProducto = this.getAttribute("data-id");
                const nombreProducto = this.parentElement.parentElement.querySelector("td:nth-child(2)").textContent;
                const precioProducto = parseFloat(this.parentElement.parentElement.querySelector("td:nth-child(3)").textContent.replace("Q", ""));


                const filaExistente = tablaSeleccionados.querySelector(`tr[data-id="${idProducto}"]`);
                if (filaExistente) {

                    const cantidad = filaExistente.querySelector(".cantidad");
                    cantidad.textContent = parseInt(cantidad.textContent) + 1;
                } else {

                    const nuevaFila = document.createElement("tr");
                    nuevaFila.setAttribute("data-id", idProducto);
                    nuevaFila.innerHTML = `
                        <td>${nombreProducto}</td>
                        <td>Q${precioProducto.toFixed(2)}</td>
                        <td class="cantidad">1</td>
                        <td>Q${precioProducto.toFixed(2)}</td>
                        <td><button class="btn btn-primary restar" data-id="${idProducto}">-</button></td>
                    `;
                    tablaSeleccionados.querySelector("tbody").appendChild(nuevaFila);
                }


                calcularSubtotal();


                mostrarElementosTablaSeleccionados();
            });
        });


        tablaSeleccionados.addEventListener("click", function (event) {
            if (event.target.classList.contains("restar")) {
                const idProducto = event.target.getAttribute("data-id");
                const fila = tablaSeleccionados.querySelector(`tr[data-id="${idProducto}"]`);
                const cantidad = parseInt(fila.querySelector(".cantidad").textContent);
                const precioProducto = parseFloat(fila.querySelector("td:nth-child(2)").textContent.replace("Q", ""));

                if (cantidad > 1) {
                    fila.querySelector(".cantidad").textContent = cantidad - 1;
                    fila.querySelector("td:nth-child(4)").textContent = `Q${(precioProducto * (cantidad - 1)).toFixed(2)}`;
                } else {
                    fila.remove();
                }


                calcularSubtotal();


                mostrarElementosTablaSeleccionados();
            }
        });


        function mostrarElementosTablaSeleccionados() {
            const filasTablaSeleccionados = tablaSeleccionados.querySelectorAll("tbody tr");
            let textoAcumulado = "";

            console.log("Elementos de la tabla seleccionados:");
            filasTablaSeleccionados.forEach((fila, indiceFila) => {
                const celdas = fila.querySelectorAll("td");
                const precio = celdas[0].textContent;
                const cantidad = celdas[1].textContent;
                const cantidad2 = celdas[2].textContent;


                textoAcumulado += `Nombre: ${precio}, Precio: ${cantidad}, Cantidad: ${cantidad2}***\n`;

                console.log(`${indiceFila + 1} Nombre: ${precio}, Precio: ${cantidad}, Cantidad: ${cantidad2}`);
            });


            const textareaDatoDesc = document.getElementById('dato_desc');
            textareaDatoDesc.value = textoAcumulado;
        }



    });
</script>
</body>

</html>