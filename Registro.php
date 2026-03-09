<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miembros</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styleMiembros.css">
    <!-- Estilos adicionales solo para el formulario -->
    <style>
        .registro-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .registro-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .form-group input:focus {
            border-color: #667eea;
            outline: none;
        }
        
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
        }
        
        .mensaje {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .mensaje-exito {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .mensaje-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
    
    <div class="registro-form">
        <h2>📝 Únete a HelloWorld</h2>
        
        <?php
        // Mostrar mensajes si existen
        if (isset($_GET['error'])) {
            echo "<div class='mensaje mensaje-error'>" . htmlspecialchars($_GET['error']) . "</div>";
        }
        if (isset($_GET['success'])) {
            echo "<div class='mensaje mensaje-exito'>¡Registro exitoso! Redirigiendo...</div>";
            echo "<script>setTimeout(function(){ window.location.href='Miembros.php'; }, 2000);</script>";
        }
        ?>
        
        <form action="procesar_registro.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required 
                       placeholder="Ej: Ana Gómez">
            </div>
            
            <div class="form-group">
                <label for="cargo">Cargo/Rol:</label>
                <input type="text" id="cargo" name="cargo" required 
                       placeholder="Ej: Desarrolladora Frontend">
            </div>
            
            <div class="form-group">
                <label for="puntos">Puntos:</label>
                <input type="number" id="puntos" name="puntos" required 
                       min="0" value="100" placeholder="Ej: 100">
            </div>
            
            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>
    
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