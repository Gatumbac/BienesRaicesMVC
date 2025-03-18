<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES URL', __DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
define('RUTAS_PROTEGIDAS', [
    '/admin',
    '/propiedades/crear',
    '/propiedades/actualizar',
    '/propiedades/eliminar',
    '/vendedores/crear',
    '/vendedores/actualizar',
    '/vendedores/eliminar',
    '/admin-blog',
    '/blogs/crear',
    '/blogs/actualizar',
    '/blogs/eliminar',
    '/bloggers/crear',
    '/bloggers/actualizar',
    '/bloggers/eliminar',
]);

function debugear($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//Escapar el html
function s($html) {
    return htmlspecialchars($html);
}

function verificarVariable($variable, $header) {
    if (!$variable) {
        header('Location: ' . $header);
        exit;
    }
}

function getMensaje($resultado) {
    $resultados = [
        '0' => 'Error al ejecutar la operación',
        '1' => 'Registro creado correctamente',
        '2' => 'Registro actualizado correctamente',
        '3' => 'Registro eliminado correctamente',
        '4' => 'Restricción de integridad: Este registro es referenciado por otros datos en el sistema'
    ];
    return $resultados[$resultado] ?? '';
}
