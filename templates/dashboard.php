
<?php
include '../includes/headerLogin.php';
include '../controllers/autenticador.php';
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