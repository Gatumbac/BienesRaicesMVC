<?php
namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        if (in_array($urlActual, RUTAS_PROTEGIDAS)) {
            self::verificarAuth();
        }

        $fn = $this->rutasGET[$urlActual] ?? null;
        if ($metodo === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        $this->ejecutarFuncion($fn);
    }


    public static function verificarAuth() {
        session_start();
        $auth = $_SESSION['login'] ?? false;

        if (!$auth) {
            header('Location: /');
            exit;
        }
    }

    public function ejecutarFuncion($fn) {
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header("HTTP/1.0 404 Not Found");
            $this->render('paginas/default');
        }
    }

    public function render($view, $datos = []) {
        foreach($datos as $key=>$value) {
            $$key = $value;
        }
        
        ob_start();
        include_once __DIR__ . '/views/' . $view . '.php';
        $contenido = ob_get_clean();
        include __DIR__ . '/views/layout.php';
    }
}