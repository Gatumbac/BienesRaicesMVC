<?php
namespace Controllers;
use MVC\Router;
use Model\Blogger;

class BloggerController {

    public static function crear(Router $router) {
        $blogger = new Blogger();
        $errores = Blogger::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $blogger = new Blogger($_POST);
            $errores = $blogger->validar();
    
            if (empty($errores)) {
                $blogger->guardar();
            }
        }

        $router->render('bloggers/crear', [
            'blogger' => $blogger,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $errores = Blogger::getErrores();
 
        $id = $_GET['id'] ?? '';
        $id = filter_var($id, FILTER_VALIDATE_INT);
        verificarVariable($id, '/admin-blog');
    
        $blogger = Blogger::find($id);
        verificarVariable($blogger, '/admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $blogger->sincronizar($_POST);    
            $errores = $blogger->validar();
    
            if (empty($errores)) {
                $blogger->guardar();
            }
        }

        $router->render('bloggers/actualizar', [
            'blogger' => $blogger,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $id = filter_var($id, FILTER_VALIDATE_INT);
            verificarVariable($id, '/admin-blog');

            $blogger = Blogger::find($id);
            verificarVariable($blogger, '/admin-blog');
            $blogger->eliminar();
        }
    }
}