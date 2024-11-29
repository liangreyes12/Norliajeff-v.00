<?php
require_once '../includes/headerLogin.php';
require_once '../controllers/compraController.php';
require_once '../controllers/productoController.php';
require_once '../controllers/proveedorController.php';
require_once '../controllers/autenticador.php';

// Verificar si el ID está presente y es válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    $compraController = new CompraController();
    $compra = $compraController->obtenerCompraPorID($id, $_SESSION['usuario_id']); // Obtener compra por ID

    if ($compra) {
        // Crear instancias de los controladores para llenar los menús desplegables
        $productoController = new ProductoController();
        $proveedorController = new ProveedorController();
        
        $productos = $productoController->obtenerTodosLosProductosPorID($_SESSION['usuario_id']);
        $proveedores = $proveedorController->obtenerTodosLosProveedoresPorID($_SESSION['usuario_id']);
        ?>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <form class="col-4 p-3" action="../controllers/compraHandler.php" method="POST">
                <h2 class="text-center" id="titulo">Actualizar Compra</h2>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($compra->getID()); ?>">
                <input type="hidden" name="accion" value="actualizar"> <!-- Acción que indica que se está actualizando -->
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="<?php echo htmlspecialchars($compra->getFecha()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" class="form-control" name="total" value="<?php echo htmlspecialchars($compra->getTotal()); ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" value="<?php echo htmlspecialchars($compra->getCantidad()); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" value="<?php echo htmlspecialchars($compra->getPrecio()); ?>" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="producto_id" class="form-label">Producto</label>
                    <select class="form-select" name="producto_id" required>
                        <option value="" disabled>Seleccione un producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?php echo htmlspecialchars($producto->getID()); ?>" <?php echo ($compra->getProductoID() == $producto->getID()) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($producto->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proveedor_id" class="form-label">Proveedor</label>
                    <select class="form-select" name="proveedor_id" required>
                        <option value="" disabled>Seleccione un proveedor</option>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <option value="<?php echo htmlspecialchars($proveedor->getID()); ?>" <?php echo ($compra->getProveedorID() == $proveedor->getID()) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($proveedor->getNombre()); ?>
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
        echo "Compra no encontrada.";
    }
} else {
    echo "ID de compra no proporcionado.";
}
?>

<?php
require_once '../includes/footer.php';
?>
