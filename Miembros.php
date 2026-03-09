<?php
// Iniciar sesión para ver si hay usuario logueado
session_start();

// Cargar miembros desde el archivo JSON
$archivo_miembros = 'miembros.json';
$miembros = [];

if (file_exists($archivo_miembros)) {
    $miembros_json = file_get_contents($archivo_miembros);
    $miembros = json_decode($miembros_json, true) ?: [];
}

// Ordenar por puntos para el ranking
usort($miembros, function($a, $b) {
    return $b['puntos'] - $a['puntos'];
});

// Verificar si hay usuario logueado
$usuario_logueado = isset($_SESSION['usuario_id']);
$nombre_usuario = $usuario_logueado ? $_SESSION['usuario_nombre'] : '';

// Mostrar mensajes
if (isset($_GET['success'])) {
    echo "<script>alert('¡Bienvenido " . addslashes($nombre_usuario) . "!');</script>";
}
if (isset($_GET['error'])) {
    echo "<script>alert('" . htmlspecialchars($_GET['error']) . "');</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styleMiembros.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.html" class="logo">
            <img src="Multimedia/About/logoHW.png" alt="HelloWorld Logo">
        </a>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">☰</label>
        <ul class="nav-links">
            <li><a href="historia.html">Historia</a></li>
            <li><a href="about.html">Quiénes somos</a></li>
            <li><a href="projects.html">Proyectos</a></li>
            <li><a href="Miembros.php">Miembros</a></li>
            <li><a href="EVENTOS.html">Eventos</a></li>
            <li><a href="QUIZ.html">Quiz interactivo</a></li>
            <li class="join"><a href="Registro.php">Unirse</a></li>
        </ul>
    </nav>
    
    <section class="seccion_miembros">
        <h2 class="seccion_titulo">Nuestros Miembros</h2>
        <div class="tarjetas_contenedor">
            <?php if (empty($miembros)): ?>
                <!-- Si no hay miembros, mostrar los de ejemplo -->
                <div class="tarjeta medalla-1">
                    <div class="medalla">Top 1</div>
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ana Gómez">
                    <div class="nombre_miembro">Ana Gómez</div>
                    <div class="descripcion_miembro">Desarrolladora Frontend</div>
                    <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor">1000</span></div>
                </div>
                <div class="tarjeta medalla-2">
                    <div class="medalla">Top 2</div>
                    <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Carlos Pérez">
                    <div class="nombre_miembro">Carlos Pérez</div>
                    <div class="descripcion_miembro">Ingeniero de Datos</div>
                    <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor">850</span></div>
                </div>
                <div class="tarjeta medalla-3">
                    <div class="medalla">Top 3</div>
                    <img src="https://randomuser.me/api/portraits/women/46.jpg" alt="Lucía Martínez">
                    <div class="nombre_miembro">Lucía Martínez</div>
                    <div class="descripcion_miembro">Especialista en IA</div>
                    <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor">750</span></div>
                </div>
                <div class="tarjeta medalla-general">
                    <div class="medalla">Top 4</div>
                    <img src="https://randomuser.me/api/portraits/men/47.jpg" alt="Miguel Rodríguez">
                    <div class="nombre_miembro">Miguel Rodríguez</div>
                    <div class="descripcion_miembro">Desarrollador Backend</div>
                    <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor">700</span></div>
                </div>
                <div class="tarjeta medalla-general">
                    <div class="medalla">Top 5</div>
                    <img src="https://randomuser.me/api/portraits/women/48.jpg" alt="Sofía López">
                    <div class="nombre_miembro">Sofía López</div>
                    <div class="descripcion_miembro">Diseñadora UX/UI</div>
                    <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor">650</span></div>
                </div>
            <?php else: ?>
                <?php foreach ($miembros as $index => $miembro): ?>
                    <?php
                    $clase_medalla = 'medalla-general';
                    if ($index == 0) $clase_medalla = 'medalla-1';
                    elseif ($index == 1) $clase_medalla = 'medalla-2';
                    elseif ($index == 2) $clase_medalla = 'medalla-3';
                    ?>
                    <div class="tarjeta <?php echo $clase_medalla; ?>">
                        <div class="medalla">Top <?php echo $index + 1; ?></div>
                        <img src="<?php echo htmlspecialchars($miembro['foto']); ?>" 
                             alt="<?php echo htmlspecialchars($miembro['nombre_completo'] ?? $miembro['nombre']); ?>">
                        <div class="nombre_miembro"><?php echo htmlspecialchars($miembro['nombre_completo'] ?? $miembro['nombre'] . ' ' . ($miembro['apellidos'] ?? '')); ?></div>
                        <div class="descripcion_miembro"><?php echo htmlspecialchars($miembro['carrera'] ?? $miembro['cargo'] ?? 'Miembro'); ?></div>
                        <div class="puntos"><span class="punto-icono">⭐</span> <span class="punto-valor"><?php echo $miembro['puntos']; ?></span></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-brand">
                <h2 class="mono-text">> HelloWorld_</h2>
                <p class="tagline">La primera línea de algo grande.</p>
            </div>
            <div class="footer-links">
                <a href="https://github.com/HelloWorldClub" target="_blank" class="social-link">GitHub</a>
                <a href="#" class="social-link">Discord</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="mailto:contacto@helloworld.com" class="social-link">Contacto</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="final-phrase">Todo empieza con un <span class="highlight">Hello World</span>. En este club, es donde empieza tu impacto.</p>
        </div>
    </footer>
</body>
</html>