<?php
require_once 'usuarioController.php'; 

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Crear una instancia del controlador de usuario
    $usuarioController = new UsuarioController();

    // Intentar crear el usuario
    $resultado = $usuarioController->crearUsuario($nombre, $apellido, $email, $contrasena);

    // Verificar si se creó el usuario con éxito
    if ($resultado) {
        // Redirigir al usuario a la página de inicio de sesión
        header('Location: \Norliajeff-v.00\templates\login.php');
        exit();
    } else {
        // Mostrar un mensaje de error
        echo "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
    }
}
?>
