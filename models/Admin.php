<?php
namespace Model;

class Admin extends ActiveRecord {
    protected static $columnasDB = ['id', 'email', 'password'];

    protected static $tabla = 'USUARIOS';

    protected $id;
    protected $email;
    protected $password;

    public function __construct(array $args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '{$this->email}'";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function validarUsuario($resultado) {
        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
        }
        return $resultado->num_rows > 0;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();
        $auth = password_verify($this->password, $usuario->password);

        if (!$auth) {
            self::$errores[] = 'El password es incorrecto';
        }

        return $auth;
    }

    public function autenticar() {
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        
        header('Location: /admin');
        exit;
    }

    public function validar() {
        self::$errores = [];
        if (!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            self::$errores[] = 'Email con formato inválido';
        }
        if (!$this->password) {
            self::$errores[] = 'La contraseña es obligatoria';
        }
        return self::$errores;
    }
}