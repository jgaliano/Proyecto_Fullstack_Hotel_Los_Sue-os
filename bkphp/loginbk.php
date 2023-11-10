<?php
session_start();
// Verificar reCAPTCHA
$recaptchaSecretKey = "6Lcai5UoAAAAADqYMW5PyGaTT4tIXWGNbPEoAT-Q";
$recaptchaResponse = $_POST['g-recaptcha-response'];

$recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse";
$recaptcha = json_decode(file_get_contents($recaptchaUrl));

if (!$recaptcha->success) {
    $_SESSION['error_login'] = "Por favor, verifica que no eres un robot.";
    header("Location: ../login.php");
    exit();
}

require_once '../includes/conexion.php';

if ($db) {

    if (isset($_POST)) {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Consulta para comprobar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($db, $sql);

        if ($login && mysqli_num_rows($login) == 1) {
            $usuario = mysqli_fetch_assoc($login);
            $verify = password_verify($password, $usuario['password']);

            if ($verify) {
                // Utilizar una sesion para guardar los datos del usuario logueado
                $_SESSION['usuario'] = $usuario;

                // Almacenar el nombre del usuario en la sesión
                $_SESSION['nombre_usuario'] = $usuario['nombre']; // Reemplaza 'nombre' con el nombre real de la columna en tu base de datos

                // Redirigir al usuario a la página correspondiente
                if ($usuario['rol'] == 'U') {
                    // Consulta para obtener el ID del cliente
					$sqlClienteID = "SELECT ID FROM clientes WHERE correo = '$email'";
					$resultClienteID = mysqli_query($db, $sqlClienteID);

					if ($resultClienteID && mysqli_num_rows($resultClienteID) == 1) {
						$cliente = mysqli_fetch_assoc($resultClienteID);
						$clienteID = $cliente['ID'];

						$_SESSION['clienteID']= $clienteID;

						// enviar el ID del cliente a reservacion_out.php
						header("Location: ../reservacion_out.php");
						exit;
					} else {
						// manejar el caso de que no se obtenga el ID del cliente
						$_SESSION['general'] = "Error al obtener el ID del cliente.";
					}
                } else {
                    header('Location: ../principal.php');
                }
                exit();
            } else {
                // Si la contraseña es incorrecta, enviar sesión con el fallo
                $_SESSION['error_login'] = "Contraseña incorrecta!!";
            }
        } else {
            // Si el usuario no existe, enviar sesión con el fallo
            $_SESSION['error_login'] = "Usuario no registrado!!";
        }
    } else {
        // Si no se enviaron datos por POST, redirigir al usuario de vuelta al formulario de inicio de sesión
        $_SESSION['error_login'] = "No se enviaron datos de inicio de sesión.";
    }
} else {
    // Si no se pudo conectar a la base de datos, mostrar un mensaje de error
    $_SESSION['error_login'] = "Error: No se pudo conectar a la base de datos.";
}

// Redirigir al usuario de vuelta al formulario de inicio de sesión en caso de error
header('Location: ../login.php');
