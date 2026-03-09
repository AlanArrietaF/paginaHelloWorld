<?php
// Cargar miembros desde el archivo JSON
$archivo_miembros = 'miembros.json';
$miembros = [];

if (file_exists($archivo_miembros)) {
    $miembros_json = file_get_contents($archivo_miembros);
    $miembros = json_decode($miembros_json, true);
    
    // Si no hay miembros, usar los datos de ejemplo que ya tienes
    if (empty($miembros)) {
        $miembros = [
            [
                'nombre' => 'Ana Gómez',
                'cargo' => 'Desarrolladora Frontend',
                'puntos' => 1000,
                'foto' => 'https://randomuser.me/api/portraits/women/44.jpg'
            ],
            [
                'nombre' => 'Carlos Pérez',
                'cargo' => 'Ingeniero de Datos',
                'puntos' => 850,
                'foto' => 'https://randomuser.me/api/portraits/men/45.jpg'
            ],
            [
                'nombre' => 'Lucía Martínez',
                'cargo' => 'Especialista en IA',
                'puntos' => 750,
                'foto' => 'https://randomuser.me/api/portraits/women/46.jpg'
            ],
            [
                'nombre' => 'Miguel Rodríguez',
                'cargo' => 'Desarrollador Backend',
                'puntos' => 700,
                'foto' => 'https://randomuser.me/api/portraits/men/47.jpg'
            ],
            [
                'nombre' => 'Sofía López',
                'cargo' => 'Diseñadora UX/UI',
                'puntos' => 650,
                'foto' => 'https://randomuser.me/api/portraits/women/48.jpg'
            ]
        ];
    }
}

// Ordenar por puntos para mantener el ranking
usort($miembros, function($a, $b) {
    return $b['puntos'] - $a['puntos'];
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styleMiembros.css">
    <!-- Solo agregamos un estilo para el mensaje de bienvenida -->
    <style>
        .mensaje-bienvenida {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            text-align: center;
            margin: 20px auto;
            max-width: 1200px;
            border-radius: 10px;
            animation: slideDown 0.5s ease;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
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
    
    <?php
    // Mostrar mensaje si viene de un registro exitoso
    if (isset($_GET['success'])) {
        echo "<div class='mensaje-bienvenida'>¡Bienvenido nuevo miembro! 🎉</div>";
    }
    ?>
    
    <section class="seccion_miembros">
        <h2 class="seccion_titulo">Nuestros Miembros</h2>
        <div class="tarjetas_contenedor">
            <?php foreach ($miembros as $index => $miembro): ?>
                <?php
                // Determinar la clase de medalla según la posición
                $clase_medalla = 'medalla-general';
                if ($index == 0) $clase_medalla = 'medalla-1';
                elseif ($index == 1) $clase_medalla = 'medalla-2';
                elseif ($index == 2) $clase_medalla = 'medalla-3';
                ?>
                
                <div class="tarjeta <?php echo $clase_medalla; ?>">
                    <div class="medalla">Top <?php echo $index + 1; ?></div>
                    <img src="<?php echo htmlspecialchars($miembro['foto']); ?>" 
                         alt="<?php echo htmlspecialchars($miembro['nombre']); ?>">
                    <div class="nombre_miembro"><?php echo htmlspecialchars($miembro['nombre']); ?></div>
                    <div class="descripcion_miembro"><?php echo htmlspecialchars($miembro['cargo']); ?></div>
                    <div class="puntos">
                        <span class="punto-icono">⭐</span> 
                        <span class="punto-valor"><?php echo $miembro['puntos']; ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
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