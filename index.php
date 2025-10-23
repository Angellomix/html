<?php
include 'includes/database.php';
// Angellomix.com
$mensaje = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = trim($_POST['nombre']);
    $carrera = trim($_POST['carrera']);
    $tetramestre = trim($_POST['tetramestre']);

    if($nombre && $carrera && $tetramestre){
        $alumno_id = guardarAlumno($nombre, $carrera, $tetramestre);
        // Redirigir a la primera práctica
        header("Location: practicar.php?alumno_id=$alumno_id");
        exit;
    } else {
        $mensaje = "Por favor completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Alumno - HTML2025</title>
<link rel="stylesheet" href="assets/style.css">
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }

    .registro-container {
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    .registro-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .registro-container input {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
    }

    .registro-container button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: #6e8efb;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .registro-container button:hover {
        background: #5a73e0;
    }

    .mensaje {
        color: red;
        margin-top: 10px;
        font-size: 14px;
    }

    @media (max-width: 500px){
        .registro-container {
            padding: 30px 20px;
        }
    }
</style>
</head>
<body>

<div class="registro-container">
    <h2>Registro de Alumno</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        <input type="text" name="carrera" placeholder="Carrera" required>
        <input type="text" name="tetramestre" placeholder="Tetramestre" required>
        <button type="submit">Registrar</button>
    </form>
    <?php if($mensaje): ?>
        <div class="mensaje"><?php echo $mensaje; ?></div>
    <?php endif; ?>
</div>

</body>
</html>
