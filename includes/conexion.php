<?php
//conexxion
/*$server = 'localhost:3306';
$username = 'adminSuenos';
$password = 'hot3lSu3n0s';*/

$server = 'localhost:8112';
$username = 'root';
$password = '';
$database = 'hotellossuenos_final';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");


if (!$db) {
    die("Error de conexión: " . mysqli_connect_error());
}

//Iniciar la sesion
session_start();
/*
// Establecer el tiempo de vida del cookie de sesión en 20 minutos (en segundos)
$cookieLifetime = 15 * 60;
session_set_cookie_params($cookieLifetime);

// Establecer el tiempo máximo de vida de la sesión en 20 minutos (en segundos)
ini_set('session.gc_maxlifetime', $cookieLifetime);

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Redireccionar a la página de inicio de sesión si no está autenticado
    exit();
}

// Verificar si ha pasado demasiado tiempo desde la última actividad
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $cookieLifetime)) {
    // Desconectar al usuario y destruir la sesión
    session_unset(); // unset $_SESSION variable for the run-time
    session_destroy(); // destroy session data in storage
    header("Location: logout.php"); // Redireccionar a la página de cierre de sesión
    exit();
}

// Actualizar la última actividad cada vez que se carga una página
$_SESSION['last_activity'] = time();
*/

?>