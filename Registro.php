<?php
// Esto va AL INICIO del archivo (no modifica tu diseño)
if (isset($_GET['error'])) {
    echo "<script>alert('" . htmlspecialchars($_GET['error']) . "');</script>";
}
if (isset($_GET['success'])) {
    echo "<script>alert('¡Registro exitoso! Bienvenido a la comunidad'); window.location.href='Miembros.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro - Comunidad Académica</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styleRegistro.css">
</head>
<body>
  <!-- Navbar exactamente igual al original -->
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
      <!-- IMPORTANTE: Cambiamos Miembros.html a Miembros.php -->
      <li><a href="Miembros.php">Miembros</a></li>
      <li><a href="EVENTOS.html">Eventos</a></li>
      <li><a href="QUIZ.html">Quiz interactivo</a></li>
      <!-- IMPORTANTE: Cambiamos Registro.html a Registro.php -->
      <li class="join"><a href="Registro.php">Unirse</a></li>
    </ul>
  </nav>

  <!-- Contenido principal con el formulario -->
  <div class="main-content">
    <div class="register-card">
      <!-- Lado izquierdo: Información visual -->
      <div class="left-panel">
        <h3>🎓 ¡Bienvenido!</h3>
        <p>Forma parte de nuestra comunidad académica y accede a beneficios exclusivos, eventos y networking con profesio.</p>
      </div>

      <!-- Lado derecho: Formulario de registro -->
      <div class="right-panel">
        <h2>Crear cuenta</h2>
        <p class="subtitle">Completa el formulario para registrarte</p>

        <!-- SOLO CAMBIAMOS EL ACTION: de registro.php a procesar_registro.php -->
        <form action="procesar_registro.php" method="POST" id="registroForm">
          <!-- Campo: Nombre -->
          <div class="form-group">
            <label for="nombre">Nombre <span class="required">*</span></label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Carlos" required>
          </div>

          <!-- Campo: Apellidos -->
          <div class="form-group">
            <label for="apellidos">Apellidos <span class="required">*</span></label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Ej. Rodríguez Martínez" required>
          </div>

          <!-- Campo: Carrera -->
          <div class="form-group">
            <label for="carrera">Carrera <span class="required">*</span></label>
            <select id="carrera" name="carrera" required>
              <option value="" disabled selected>Selecciona tu carrera</option>
              <option value="ingenieria_sistemas">Ingeniería en Sistemas</option>
              <option value="ingenieria_industrial">Ingeniería Industrial</option>
              <option value="administracion">Administración</option>
              <option value="derecho">Derecho</option>
              <option value="medicina">Medicina</option>
              <option value="psicologia">Psicología</option>
              <option value="contaduria">Contaduría</option>
              <option value="arquitectura">Arquitectura</option>
              <option value="otro">Otra</option>
            </select>
          </div>

          <!-- Campo: Número de cuenta -->
          <div class="form-group">
            <label for="numero_cuenta">Número de cuenta <span class="required">*</span></label>
            <input type="text" id="numero_cuenta" name="numero_cuenta" placeholder="Ej. 20241001" required>
            <span class="helper-text">Tu número único de estudiante</span>
          </div>

          <!-- Campo: Correo institucional -->
          <div class="form-group">
            <label for="email">Correo institucional <span class="required">*</span></label>
            <input type="email" id="email" name="email" placeholder="ejemplo@universidad.edu" required>
            <span class="helper-text">Usa tu correo institucional (@edu, @univ, etc.)</span>
          </div>

          <!-- Campo: Contraseña (fecha AAAAMMDD) -->
          <div class="form-group">
            <label for="password">Contraseña <span class="required">*</span></label>
            <input type="text" id="password" name="password" placeholder="AAAAMMDD" required pattern="[0-9]{8}" maxlength="8" autocomplete="off">
            <div class="password-info">
              <strong>Formato requerido:</strong>
              <code>AAAAMMDD</code> (Ej: 20050115)
            </div>
          </div>

          <!-- Campo: Confirmar contraseña -->
          <div class="form-group">
            <label for="confirm_password">Confirmar contraseña <span class="required">*</span></label>
            <input type="text" id="confirm_password" name="confirm_password" placeholder="Repite tu contraseña" required pattern="[0-9]{8}" maxlength="8" autocomplete="off">
          </div>

          <!-- Botón de registro -->
          <button type="submit" class="btn-submit">Registrarse</button>
        </form>

        <!-- Enlace a login -->
        <div class="login-redirect">
          ¿Ya tienes una cuenta?
          <!-- Cambiamos login.html a login.php si existe -->
          <a href="login.php">Inicia sesión aquí</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('registroForm').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm_password').value;
      const email = document.getElementById('email').value;

      // Validar que las contraseñas coincidan
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('❌ Las contraseñas no coinciden. Por favor, verifica.');
        return;
      }

      // Validar formato de fecha (8 dígitos numéricos)
      const fechaRegex = /^[0-9]{8}$/;
      if (!fechaRegex.test(password)) {
        e.preventDefault();
        alert('❌ La contraseña debe tener exactamente 8 dígitos numéricos (formato AAAAMMDD).');
        return;
      }

      // Validar correo institucional
      const dominiosValidos = ['.unam.mx'];
      const emailLower = email.toLowerCase();
      let esValido = false;

      for (let dominio of dominiosValidos) {
        if (emailLower.includes(dominio)) {
          esValido = true;
          break;
        }
      }

      if (!esValido) {
        e.preventDefault();
        alert('❌ Debes usar un correo institucional válido (.edu, .ac, .univ, etc.)');
        return;
      }

      // Validar que el correo no esté vacío y tenga formato básico
      if (!email.includes('@') || email.split('@')[1].length < 3) {
        e.preventDefault();
        alert('❌ Por favor, ingresa un correo electrónico válido.');
      }
    });
  </script>
</body>
</html>