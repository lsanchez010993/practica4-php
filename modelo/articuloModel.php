<?php


require_once __DIR__ . '/../modelo/conexion.php';



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    session_start();
    if ($action === 'eliminar') {
        $id = $_GET['id'];
        eliminarArticulo($id);
    } else if ($action === 'insertar') {
        insertarArticulo();
    }
}

function actualizarArticulo($id, $titulo, $contenido) {
    require_once '../modelo/conexion.php';
    $pdo = connectarBD();

    // Consulta de actualización
    $sql = "UPDATE articles SET titol = :titol, cos = :cos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':titol', $titulo);
    $stmt->bindParam(':cos', $contenido);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute(); // Devuelve true o false
}

function obtenerArticuloPorId($id) {
    $pdo = connectarBD();
    $sql = "SELECT * FROM articles WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// Función para eliminar artículos
function eliminarArticulo($id)
{

    $pdo = connectarBD();
    $sql = "DELETE FROM articles WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['mensaje_exito'] = "Artículo eliminado correctamente.";
    } else {
        $_SESSION['mensaje_error'] = "Error al eliminar el artículo.";
    }

    header("Location: ../index.php");
    exit();
}

// Función para insertar artículos
function insertarArticulo()
{
  
    require_once 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $usuario_id = $_SESSION['usuario_id'];  // Obtener el ID del usuario autenticado

        $pdo = connectarBD();
        $sql = "INSERT INTO articles (titol, cos, usuario_id) VALUES (:titol, :cos, :usuario_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titol', $titulo);
        $stmt->bindParam(':cos', $contenido);
        $stmt->bindParam(':usuario_id', $usuario_id);

        if ($stmt->execute()) {
            $_SESSION['mensaje_exito'] = "Artículo creado correctamente.";
        } else {
            $_SESSION['mensaje_error'] = "Error al crear el artículo.";
        }

        header("Location: ../vista/articles/insertar.php");
        exit();
    }
}

// Función para leer artículos

function leerArticulos()
{


    $pdo = connectarBD();
    $sql = "SELECT id, titol, cos FROM articles";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();


    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function limit_articulos_por_pagina($start, $articlesPerPage, $usuario_id = null)
{
    $pdo = connectarBD();  // Se conecta a la base de datos

    if ($usuario_id !== null) {

        $sql = "SELECT * FROM articles WHERE usuario_id = :usuario_id LIMIT :start, :articlesPerPage";
        $stmt = $pdo->prepare($sql);
        // Bind de las variables a los marcadores de posición
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':articlesPerPage', $articlesPerPage, PDO::PARAM_INT);
    } else {
        // Prepara la consulta sin usuario_id
        $sql = "SELECT * FROM articles LIMIT :start, :articlesPerPage";
        $stmt = $pdo->prepare($sql);
        // Bind de las variables a los marcadores de posición
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':articlesPerPage', $articlesPerPage, PDO::PARAM_INT);
    }

    // Ejecuta la consulta y obtiene los resultados
    $stmt->execute();
    $articles = $stmt->fetchAll();

    return $articles;
}
function contar_articulos_user($articulos)
{
    if (is_array($articulos)) {
        $numero_Articulos = count($articulos);
        return $numero_Articulos;
    } else {
        return 0;
    }
}
// Consulta para contar el número total de artículos
function contarArtiulosTotales()
{
    $pdo = connectarBD();
    $sql = "SELECT COUNT(id) FROM articles ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $count = $stmt->fetchColumn();


    return $count;
}



