<?php
include '../includes/headerLogin.php';
require_once '../controllers/ventasController.php';
require_once '../controllers/productoController.php';
require_once '../controllers/clienteController.php';
include '../controllers/autenticador.php';

// Verificar si el ID está presente y es válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $ventasController = new VentasController();
    $venta = $ventasController->obtenerVentaPorID($id, $_SESSION['usuario_id']); // Obtener venta por ID

    if ($venta) {
        // Crear instancias de los controladores para llenar los menús desplegables
        $productoController = new ProductoController();
        $clienteController = new ClienteController();
        
        $productos = $productoController->obtenerTodosLosProductos($_SESSION['usuario_id']);
        $clientes = $clienteController->obtenerClientesPorUsuarioID($_SESSION['usuario_id']);
        ?>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <form class="col-4 p-3" action="../controllers/ventasHandler.php" method="POST">
                <h2 class="text-center" id="titulo">Actualizar Venta</h2>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($venta->getID()); ?>">
                <input type="hidden" name="accion" value="actualizar"> <!-- Acción que indica que se está actualizando -->
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($venta->getFecha()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" name="total" value="<?php echo htmlspecialchars($venta->getTotal()); ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" value="<?php echo htmlspecialchars($venta->getCantidad()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" value="<?php echo htmlspecialchars($venta->getPrecio()); ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="producto_id" class="form-label">Producto</label>
                    <select class="form-select" name="producto_id" required>
                        <option value="" disabled>Seleccione un producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?php echo htmlspecialchars($producto->getID()); ?>" <?php echo ($venta->getProductoID() == $producto->getID()) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($producto->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Cliente</label>
                    <select class="form-select" name="cliente_id" required>
                        <option value="" disabled>Seleccione un cliente</option>
                        <?php foreach ($clientes as $cliente): ?>
                            <option value="<?php echo htmlspecialchars($cliente->getID()); ?>" <?php echo ($venta->getClienteID() == $cliente->getID()) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cliente->getNombre() . " " . $cliente->getApellido()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($_SESSION['usuario_id']); ?>">
                <button type="submit" class="btn btn-primary" name="BtnActualizar" value="OK">Actualizar</button>
            </form>
        </div>
        <?php
    } else {
        echo "Venta no encontrada.";
    }
} else {
    echo "ID de venta no proporcionado.";
}
?>

<?php
include '../includes/footer.php';
?>
