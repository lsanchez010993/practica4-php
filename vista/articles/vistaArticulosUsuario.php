<?php
// He definido una constante para que resulte más facil modificar el numero de artículos que debe mostrarse por página
const ARTICULOS_POR_PAGINA = 5; //Esta opcion se le podria preguntar al usuario. Rollo iconos que muestren 5, 10 15 articulos por pagina
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>
    <link rel="stylesheet" href="vista/estils/estils_Index.css">

</head>

<body>

    <div class="contenidor">
        <h1>Articles creados por el usuario</h1>
        <section class="articles">
            <ul>

               

                <?php

                if (isset($_SESSION['mensaje_exito'])) {
                    echo "<p style='color: green; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_exito']) . "</p>";
                    unset($_SESSION['mensaje_exito']);
                }

                if (isset($_SESSION['mensaje_error'])) {
                    echo "<p style='color: red; font-size: 28px;'>" . htmlspecialchars($_SESSION['mensaje_error']) . "</p>";
                    unset($_SESSION['mensaje_error']);
                }
                $user_id = $_SESSION['usuario_id'];



                // Establecer la página actual

                $pagina = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                // Definir el número de artículos por página


                // Calcular desde qué artículo iniciar
                $start = ($pagina > 1) ? ($pagina * ARTICULOS_POR_PAGINA) - ARTICULOS_POR_PAGINA : 0;

                require_once 'modelo/articuloModel.php';
                $articles = limit_articulos_por_pagina($start, ARTICULOS_POR_PAGINA, $user_id);

                // Mostrar los artículos
                require_once 'vista/articles/Mostrar.php';
                listarArticulos($articles, 'editar');

                ?>
            </ul>
        </section>

        <section class="paginacio">
            <ul>
                <?php


                // Consulta para contar el número total de artículos
                $totalArticles = contarArticulos($user_id);

                // Calcular el número total de páginas
                $totalPages = ceil($totalArticles / ARTICULOS_POR_PAGINA);

                // Botón "Anterior"
                if ($pagina > 1) {
                    echo '<li><a href="?page=' . ($pagina - 1) . '">&laquo;</a></li>';
                } else {
                    echo '<li class="disabled"><a href="#">&laquo;</a></li>';
                }

                // Generar los enlaces para cada página
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($pagina == $i) {
                        echo '<li class="active"><a href="?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                // Botón "Siguiente"
                if ($pagina < $totalPages) {
                    echo '<li><a href="?page=' . ($pagina + 1) . '">&raquo;</a></li>';
                } else {
                    echo '<li class="disabled"><a href="#">&raquo;</a></li>';
                }
                ?>
            </ul>
        </section>
    </div>
</body>

</html>