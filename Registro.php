<?php
// registro.php

// Preparar variables para el template
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;
$success = isset($_GET['success']) ? true : false;

// Incluir el template HTML (que está en la misma carpeta)
include 'Registro.html';
?>