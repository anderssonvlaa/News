

<?php
include_once('./conf/con.php');

$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$imagen_nombre = $_FILES['imagen']['name'];
$imagen_temp = $_FILES['imagen']['tmp_name'];

// Guardar la imagen en una carpeta
$carpeta_imagenes = "carpeta/para/imagenes/";
$ruta_imagen = $carpeta_imagenes . $imagen_nombre;
move_uploaded_file($imagen_temp, $ruta_imagen);

// Insertar la noticia en la base de datos
$stmt = $conn->prepare("INSERT INTO noticias (categoria, titulo, descripcion, imagen) VALUES (?, ?, ?, ?)");
$stmt->execute([$categoria, $titulo, $descripcion, $ruta_imagen]);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<!-- Formulario de inserción de noticias -->
<form action="procesar_insercion.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría:</label>
        <select class="form-select" name="categoria" id="categoria" required>
            <option value="Nacionales">Nacionales</option>
            <option value="Internacionales">Internacionales</option>
            <option value="Deporte">Deporte</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Agregar Noticia</button>
</form>

<!-- idea de tabla

CREATE DATABASE noticias_db;

USE noticias_db;

CREATE TABLE noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (categoria)
); -->

</body>
</html>

