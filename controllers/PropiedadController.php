<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\ImagenHandler;

class PropiedadController {
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET["resultado"] ?? null;
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $propiedad = new Propiedad($_POST);
    
            if($_FILES["imagen"]["tmp_name"]) {
                $propiedad->setImagen(ImagenHandler::getNombreAleatorio());
            }
    
            $errores = $propiedad->validar();
    
            if (empty($errores)) {
                ImagenHandler::procesarImagen($_FILES["imagen"], $propiedad->getImagen());
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();
    
        $idPropiedad = $_GET['id'] ?? '';
        $idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);
        verificarVariable($idPropiedad, '/admin');
    
        $propiedad = Propiedad::find($idPropiedad);
        verificarVariable($propiedad, '/admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad->sincronizar($_POST);    
            $errores = $propiedad->validar();
    
            if (empty($errores)) {
    
                if ($_FILES["imagen"]["tmp_name"]) {
                    ImagenHandler::borrarImagen(CARPETA_IMAGENES . $propiedad->getImagen());
                    $propiedad->setImagen(ImagenHandler::getNombreAleatorio());
                    ImagenHandler::procesarImagen($_FILES["imagen"], $propiedad->getImagen());
                }
    
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $id = filter_var($id, FILTER_VALIDATE_INT);
            verificarVariable($id, '/admin');

            $propiedad = Propiedad::find($id);
            verificarVariable($propiedad, '/admin');
            ImagenHandler::borrarImagen(CARPETA_IMAGENES . $propiedad->getImagen());
            $propiedad->eliminar();
        }
    }
}