<?php
namespace Controllers;
use MVC\Router;
use Model\Blog;
use Model\Blogger;
use Model\ImagenHandler;

class BlogController {
    public static function index(Router $router) {
        $entradas = Blog::all();
        $bloggers = Blogger::all();
        $resultado = $_GET["resultado"] ?? null;
        
        $router->render('blogs/admin', [
            'entradas' => $entradas,
            'bloggers' => $bloggers,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {
        $blog = new Blog();
        $bloggers = Blogger::all();
        $errores = Blog::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $blog = new Blog($_POST);
    
            if($_FILES["imagen"]["tmp_name"]) {
                $blog->setImagen(ImagenHandler::getNombreAleatorio());
            }
    
            $errores = $blog->validar();
    
            if (empty($errores)) {
                ImagenHandler::procesarImagen($_FILES["imagen"], $blog->getImagen());
                $blog->guardar();
            } else {
                $blog->setImagen('');
            }
        }

        $router->render('blogs/crear', [
            'blog' => $blog,
            'bloggers' => $bloggers,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $bloggers = Blogger::all();

        $errores = Blog::getErrores();
    
        $id = $_GET['id'] ?? '';
        $id = filter_var($id, FILTER_VALIDATE_INT);
        verificarVariable($id, '/admin-blog');
    
        $blog = Blog::find($id);
        verificarVariable($blog, '/admin-blog');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $blog->sincronizar($_POST);    
            $errores = $blog->validar();
    
            if (empty($errores)) {
    
                if ($_FILES["imagen"]["tmp_name"]) {
                    ImagenHandler::borrarImagen(CARPETA_IMAGENES . $blog->getImagen());
                    $blog->setImagen(ImagenHandler::getNombreAleatorio());
                    ImagenHandler::procesarImagen($_FILES["imagen"], $blog->getImagen());
                }
    
                $blog->guardar();
            }
        }

        $router->render('blogs/actualizar', [
            'blog' => $blog,
            'bloggers' => $bloggers,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $id = filter_var($id, FILTER_VALIDATE_INT);
            verificarVariable($id, '/admin');

            $blog = Blog::find($id);
            verificarVariable($blog, '/admin-blog');
            ImagenHandler::borrarImagen(CARPETA_IMAGENES . $blog->getImagen());
            $blog->eliminar();
        }
    }
}
