<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {

    public static function crear(Router $router) {
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor = new Vendedor($_POST);
            $errores = $vendedor->validar();
    
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $errores = Vendedor::getErrores();

        $idVendedor = $_GET['id'] ?? '';
        $idVendedor = filter_var($idVendedor, FILTER_VALIDATE_INT);
        verificarVariable($idVendedor, '/admin');
    
        $vendedor = Vendedor::find($idVendedor);
        verificarVariable($vendedor, '/admin');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vendedor->sincronizar($_POST);    
            $errores = $vendedor->validar();
    
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $id = filter_var($id, FILTER_VALIDATE_INT);
            verificarVariable($id, '/admin');

            $vendedor = Vendedor::find($id);
            verificarVariable($vendedor, '/admin');
            $vendedor->eliminar();
        }
    }
}