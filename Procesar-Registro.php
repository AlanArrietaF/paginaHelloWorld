<?php
// procesar_registro.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'] ?? '';
    $cargo = $_POST['cargo'] ?? '';
    $puntos = $_POST['puntos'] ?? 0;
    
    // Validaciones básicas
    if (empty($nombre) || empty($cargo) || empty($puntos)) {
        header("Location: Registro.php?error=Por favor completa todos los campos");
        exit();
    }
    
    // Archivo donde guardaremos los datos
    $archivo_miembros = 'miembros.json';
    
    // Leer miembros existentes
    if (file_exists($archivo_miembros)) {
        $miembros_json = file_get_contents($archivo_miembros);
        $miembros = json_decode($miembros_json, true) ?: [];
    } else {
        $miembros = [];
    }
    
    // Generar foto aleatoria (como en tus ejemplos)
    $genero = (rand(0, 1) == 0) ? 'women' : 'men';
    $num_foto = rand(1, 99);
    $foto = "https://randomuser.me/api/portraits/$genero/$num_foto.jpg";
    
    // Crear nuevo miembro
    $nuevo_miembro = [
        'nombre' => $nombre,
        'cargo' => $cargo,
        'puntos' => intval($puntos),
        'foto' => $foto
    ];
    
    // Agregar a la lista
    $miembros[] = $nuevo_miembro;
    
    // Guardar en el archivo
    if (file_put_contents($archivo_miembros, json_encode($miembros, JSON_PRETTY_PRINT))) {
        header("Location: Miembros.php?success=1");
    } else {
        header("Location: Registro.php?error=Error al guardar el miembro");
    }
    exit();
    
} else {
    header("Location: Registro.php");
    exit();
}
?>