<?php
require_once 'usuarioController.php'; // Asegúrate de ajustar la ruta según sea necesario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        // Crear una instancia del controlador de usuario
        $usuarioController = new UsuarioController();

        switch ($accion) {
            case 'registrar':
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
                $contrasena = $_POST['contrasena'];

                // Intentar crear el usuario
                $resultado = $usuarioController->crearUsuario($nombre, $apellido, $email, $contrasena);

                if ($resultado) {
                    // Redirigir al usuario a la página de inicio de sesión
                    header('Location: /Norliajeff-v.00/templates/login.php');
                    exit();
                } else {
                    echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
                }
                break;

            case 'login':
                $email = $_POST['email'];
                $contrasena = $_POST['contrasena'];

                // Verificar las credenciales
                $usuario = $usuarioController->verificarCredenciales($email, $contrasena);

                if ($usuario !== null) {
                    session_start();
                    $_SESSION['usuario_id'] = $usuario->getID();
                    $_SESSION['usuario_nombre'] = $usuario->getNombre();

                    header('Location: ../templates/dashboard.php');
                    exit();
                } else {
                    echo "Correo electrónico o contraseña incorrectos.";
                }
                break;

            default:
                echo "Acción no reconocida.";
                break;
        }
    }
}
?>

