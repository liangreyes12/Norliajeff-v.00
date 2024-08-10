<?php
require_once 'UsuarioController.php'; // Asegúrate de ajustar la ruta según sea necesario

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Crear una instancia del controlador de usuario
    $usuarioController = new UsuarioController();

    // Verificar las credenciales
    $usuario = $usuarioController->verificarCredenciales($email, $contrasena);

    if ($usuario !== null) {
        // Las credenciales son correctas, iniciar sesión y redirigir
        session_start();
        $_SESSION['usuario_id'] = $usuario->getID();
        $_SESSION['usuario_nombre'] = $usuario->getNombre();

        // Redirigir a la página de inicio o dashboard ++++++++ Por corregir
        header('Location: ../templates/dashboard.php');
        exit();
    } else {
        // Mostrar un mensaje de error
        echo "Correo electrónico o contraseña incorrectos.";
    }
}
?>
