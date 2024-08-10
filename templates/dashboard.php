<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: Login.php');
    exit();
}
?>
<?php
include '../includes/headerLogin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h1>
    <p>Este es tu panel de control.</p>
    <a href="../controllers/logout.php">Cerrar sesión</a>
</body>
</html>

<?php
include '../includes/footer.php';
?>