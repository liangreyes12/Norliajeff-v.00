<?php
require_once '../controllers/productoController.php';
session_start(); // Asegúrate de iniciar la sesión

$productoController = new ProductoController();
$usuarioID = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        switch ($accion) {
            case 'crear':
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];
                $proveedorID = $_POST['proveedor_id'];
                $productoController->crearProducto($nombre, $descripcion, $precio, $stock, $proveedorID, $usuarioID);
                header('Location: ../templates/productos.php');
                exit;

            case 'actualizar':
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $stock = $_POST['stock'];
                $proveedorID = $_POST['proveedor_id'];
                $productoController->actualizarProducto($id, $nombre, $descripcion, $precio, $stock, $proveedorID, $usuarioID);
                header('Location: ../templates/productos.php');
                exit;

            case 'eliminar':
                $id = $_POST['id'];
                $productoController->eliminarProducto($id, $usuarioID);
                header('Location: ../templates/productos.php');
                exit;

            default:
                echo "Acción no válida";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
        $id = $_GET['id'];
        $productoController->eliminarProducto($id, $usuarioID);
        header('Location: ../templates/productos.php');
        exit;
    } else {
        echo "Acción no válida";
    }
} else {
    echo "Método de solicitud no válido";
}
?>
