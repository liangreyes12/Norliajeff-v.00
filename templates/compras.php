<?php
include "../includes/headerLogin.php";
require_once '../controllers/compraController.php';
require_once '../controllers/productoController.php';
require_once '../controllers/proveedorController.php';
include '../controllers/autenticador.php';

$usuario_id = $_SESSION['usuario_id'];
$compraController = new CompraController();
$productoController = new ProductoController();
$proveedorController = new ProveedorController();

// Obtén las compras, productos y proveedores del usuario logueado
$compras = $compraController->obtenerTodasLasComprasPorUsuario($usuario_id);
$productos = $productoController->obtenerTodosLosProductos($usuario_id);
$proveedores = $proveedorController->obtenerTodosLosProveedoresPorID($usuario_id);
?>

<main class="main">
    <section>
        <div class="container-fluid row">
            <form class="col-4 p-3" action="../controllers/compraHandler.php" method="POST">
                <h2 class="text-center" id="titulo">Registro de Compra</h2>

                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" step="0.01" class="form-control" name="total" required>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" name="precio" required>
                </div>
                <div class="mb-3">
                    <label for="producto_id" class="form-label">Producto</label>
                    <select class="form-control" name="producto_id" required>
                        <option value="">Seleccione un producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?php echo htmlspecialchars($producto->getID()); ?>">
                                <?php echo htmlspecialchars($producto->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proveedor_id" class="form-label">Proveedor</label>
                    <select class="form-control" name="proveedor_id" required>
                        <option value="">Seleccione un proveedor</option>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <option value="<?php echo htmlspecialchars($proveedor->getID()); ?>">
                                <?php echo htmlspecialchars($proveedor->getNombre()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars($usuario_id); ?>">
                <input type="hidden" name="accion" value="crear">
                <button type="submit" class="btn btn-primary" name="BtnRegistrar" value="OK">Registrar</button>
            </form>

            <div class="col-8 p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($compras)): ?>
                                <?php foreach ($compras as $compra): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($compra->getID()); ?></td>
                                        <td><?php echo htmlspecialchars($compra->getFecha()); ?></td>
                                        <td><?php echo htmlspecialchars($compra->getTotal()); ?></td>
                                        <td><?php echo htmlspecialchars($compra->getCantidad()); ?></td>
                                        <td><?php echo htmlspecialchars($compra->getPrecio()); ?></td>
                                        <td>
                                            <?php
                                                $producto = $productoController->obtenerProductoPorID($compra->getProductoID(), $usuario_id);
                                                echo htmlspecialchars($producto ? $producto->getNombre() : 'No disponible');
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $proveedor = $proveedorController->obtenerProveedorPorID($compra->getProveedorID());
                                                echo htmlspecialchars($proveedor ? $proveedor->getNombre() : 'No disponible');
                                            ?>
                                        </td>
                                        <td>
                                            <a href='actualizarCompras.php?id=<?php echo htmlspecialchars($compra->getID()); ?>' class='btn btn-secondary'>
                                                <i class='fa-solid fa-pen-to-square'></i>
                                            </a>
                                            <a href='../controllers/compraHandler.php?accion=eliminar&id=<?php echo htmlspecialchars($compra->getID()); ?>' class='btn btn-danger' onclick='return confirm("¿Estás seguro de que deseas eliminar esta compra?")'>
                                                <i class='fa-solid fa-trash'></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="8">No hay compras para mostrar.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
    include '../includes/footer.php';
?>
