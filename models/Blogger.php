<?php
namespace Model;

class Blogger extends ActiveRecord{
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'correo'];

    protected static $tabla = 'BLOGGERS';

    protected $id;
    protected $nombre;
    protected $apellido;
    protected $telefono;
    protected $correo;
    
    public function __construct(array $args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->correo = $args['correo'] ?? '';
    }

    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function getCorreo() {
        return $this->correo;
    }
    
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getNombreCompleto() {
        return $this->getNombre() . ' ' . $this->getApellido();
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function validar() {
        self::$errores = [];
    
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
    
        if (!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }
    
        if (!$this->telefono) {
            self::$errores[] = "El teléfono es obligatorio";
        } else if (!preg_match('/^09\d{8}$/', $this->telefono)) {
            self::$errores[] = "Formato Inválido de Teléfono";
        }

        if (!filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = "Email con formato inválido";
        }
    
        return self::$errores;
    }

    public static function registrarResultado($numero) {
        header("Location: /admin-blog?resultado={$numero}");
        exit;
    }
}