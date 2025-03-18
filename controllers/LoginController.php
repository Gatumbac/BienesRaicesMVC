<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function mostrarLogin(Router $router) {
        $router->render('auth/login', [
            'errores' => []
        ]);
    }

    public static function autenticar(Router $router) {
        $autenticado = false;
        $admin = new Admin($_POST);
        $errores = $admin->validar();
        if(empty($errores)) {
            $user = $admin->getUsuario();
            if(Admin::validarUsuario($user)) {
                $autenticado = $admin->comprobarPassword($user);
            } 
            if ($autenticado) {
                $admin->autenticar();
            }
            $errores = Admin::getErrores();
        }

        $router->render('auth/login', [
            'errores' => $errores,
        ]);
    }


    public static function logout() {
        session_start();
        $_SESSION = [];
        verificarVariable($_SESSION, '/');
    }
}