<?php
require_once 'clienteController.php';

$clienteController = new ClienteController();
$usuarioID = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        switch ($accion) {
            case 'crear':
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $usuarioID = $_POST['usuario_id'];
                $clienteController->crearCliente($nombre, $apellido, $correo, $direccion, $telefono, $usuarioID);
                header('Location: ../templates/cliente.php');
                break;

            case 'actualizar':
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correo'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $usuarioID = $_POST['usuario_id'];
                $clienteController->actualizarCliente($id, $nombre, $apellido, $correo, $direccion, $telefono, $usuarioID);
                header('Location: ../templates/cliente.php');
                break;

            case 'eliminar':
                $id = $_GET['id'];
                $clienteController->eliminarCliente($id);
                header('Location: ../templates/cliente.php');
                break;

            default:
                echo "Acción no válida";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['accion'])) {
        $accion = $_GET['accion'];

        switch ($accion) {
            case 'eliminar':
                $id = $_GET['id'];
                $clienteController->eliminarCliente($id);
                header('Location: ../templates/cliente.php');
                break;

            default:
                echo "Acción no válida";
        }
    }
} else {
    echo "Método HTTP no soportado";
}
?>

