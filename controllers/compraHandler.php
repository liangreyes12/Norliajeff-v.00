<?php
require_once '../models/compras.php';
require_once '../models/conexion.php';
require_once '../controllers/compraController.php';

session_start();
$compraController = new CompraController();
$usuarioID = $_SESSION['usuario_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];

        switch ($accion) {
            case 'crear':
                $fecha = $_POST['fecha'];
                $total = $_POST['total'];
                $cantidad = $_POST['cantidad'];
                $precio = $_POST['precio'];
                $productoID = $_POST['producto_id'];
                $proveedorID = $_POST['proveedor_id'];

                $compraController->crearCompra($fecha, $total, $cantidad, $precio, $productoID, $usuarioID, $proveedorID);
                header('Location: ../templates/compras.php');
                break;

            case 'actualizar':
                $id = $_POST['id'];
                $fecha = $_POST['fecha'];
                $total = $_POST['total'];
                $cantidad = $_POST['cantidad'];
                $precio = $_POST['precio'];
                $productoID = $_POST['producto_id'];
                $proveedorID = $_POST['proveedor_id'];

                $compraController->actualizarCompra($id, $fecha, $total, $cantidad, $precio, $productoID, $usuarioID, $proveedorID);
                header('Location: ../templates/compras.php');
                break;

            case 'eliminar':
                $id = $_POST['id'];
                $compraController->eliminarCompra($id, $usuarioID);
                header('Location: ../templates/compras.php');
                break;

            default:
                echo "Acción no válida";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar') {
        $id = $_GET['id'];
        $compraController->eliminarCompra($id, $usuarioID);
        header('Location: ../templates/compras.php');
    }
}
?>
