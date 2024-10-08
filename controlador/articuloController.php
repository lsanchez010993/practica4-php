<?php


require_once __DIR__ . '/../modelo/conexion.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'eliminar') {
        $id = $_GET['id'];
        eliminarArticulo($id);
    } else if ($action === 'modificar') {
        $id = $_GET['id'];
        actualizarArticulo($id);
    } else if ($action === 'insertar') {
        insertarArticulo();
    }
}

// Función para actualizar artículos
function actualizarArticulo($id)
{

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $titol = $_POST['titol'];
        $cos = $_POST['cos'];

        $pdo = connectarBD();

        $sql = "UPDATE articles SET titol = :titol, cos = :cos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titol', $titol, PDO::PARAM_STR);
        $stmt->bindParam(':cos', $cos, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['mensaje_exito'] = "El artículo fue actualizado correctamente.";
        } else {
            $_SESSION['mensaje_error'] = "Error al actualizar el artículo.";
        }

        header("Location: ../vista/Modificar.php");
        exit();
    } else {
        $_SESSION['mensaje_error'] = "No se enviaron datos para actualizar.";
        header("Location: ../index.php");
        exit();
    }
}


// Función para eliminar artículos
function eliminarArticulo($id)
{

    session_start();

    $pdo = connectarBD();
    $sql = "DELETE FROM articles WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $_SESSION['mensaje_exito'] = "Artículo eliminado correctamente.";
    } else {
        $_SESSION['mensaje_error'] = "Error al eliminar el artículo.";
    }

    header("Location: ../vista/articles/Esborrar.php");
    exit();
}

// Función para insertar artículos
function insertarArticulo() {
    session_start();
    require_once '../modelo/conexion.php';

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

function limit_articulos_por_pagina($start, $articlesPerPage)
{
	$pdo = connectarBD();
	$sql = "SELECT * FROM articles LIMIT $start, $articlesPerPage";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$articles = $stmt->fetchAll();
	return $articles;
}
function contarArtiulos()
{
    $pdo = connectarBD(); 
    $sql = "SELECT COUNT(id) FROM articles "; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute(); 

    $count = $stmt->fetchColumn();

   
    return $count;
}


