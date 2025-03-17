<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Blog;
use Model\Blogger;

class PaginasController {
    public static function index(Router $router) {
        $propiedades = Propiedad::take(3, 'DESC');
        $blogs = Blog::take(2, 'DESC');

        $bloggers = [];
        $allBloggers = Blogger::all();
        
        foreach($allBloggers as $blogger) {
            $bloggers[$blogger->getId()] = $blogger;
        }

        $router->render('paginas/index', [
            'blogs' => $blogs,
            'bloggers' => $bloggers,
            'propiedades' => $propiedades,
            'inicio' => true
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }

    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router) {
        $id = $_GET['id'] ?? '';
        $id = filter_var($id, FILTER_VALIDATE_INT);
        verificarVariable($id, '/propiedades');
    
        $propiedad = Propiedad::find($id);
        verificarVariable($propiedad, '/propiedades');

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {
        $blogs = Blog::all();

        $bloggers = [];
        $allBloggers = Blogger::all();
        
        foreach($allBloggers as $blogger) {
            $bloggers[$blogger->getId()] = $blogger;
        }

        $router->render('paginas/blog', [
            'blogs' => $blogs,
            'bloggers' => $bloggers
        ]);
    }

    public static function entrada(Router $router) {
        $id = $_GET['id'] ?? '';
        $id = filter_var($id, FILTER_VALIDATE_INT);
        verificarVariable($id, '/blog');
    
        $blog = Blog::find($id);
        verificarVariable($blog, '/blog');
        $blogger = Blogger::find($blog->getBloggerId());

        $router->render('paginas/entrada', [
            'blog' => $blog,
            'blogger' => $blogger
        ]);
    }

    public static function contacto(Router $router) {
        $router->render('paginas/contacto', []);
    }
}