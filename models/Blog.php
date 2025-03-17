<?php
namespace Model;

class Blog extends ActiveRecord{
    protected static $columnasDB = ['id', 'titulo', 'extracto', 'contenido', 'imagen', 'fecha_publicacion', 'blogger_id'];

    protected static $tabla = 'ENTRADAS';

    protected $id;
    protected $titulo;
    protected $extracto;
    protected $contenido;
    protected $imagen;
    protected $fecha_publicacion;
    protected $blogger_id;

    public function __construct(array $args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->extracto = $args['extracto'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->imagen = $args['imagen'] ?? ''; 
        $this->fecha_publicacion = date('Y-m-d');
        $this->blogger_id = $args['blogger_id'] ?? '';
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getExtracto() {
        return $this->extracto;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }

    public function getBloggerId() {
        return $this->blogger_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setExtracto($extracto) {
        $this->extracto = $extracto;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function setFechaPublicacion($fecha) {
        $this->fecha_publicacion = $fecha;
    }

    public function setBloggerId($id) {
        $this->blogger_id = $id;
    }

    public function validar() {
        self::$errores = [];
    
        if (!$this->titulo) {
            self::$errores[] = 'El título de la entrada de blog es obligatorio';
        }
    
        if (strlen($this->extracto) < 50) {
            self::$errores[] = 'El extracto es obligatorio y debe tener al menos 50 caracteres';
        }
    
        if (strlen($this->contenido) < 100) {
            self::$errores[] = 'El contenido es obligatorio y debe tener al menos 100 caracteres';
        }
    
        if (!$this->imagen) {
            self::$errores[] = 'La imagen de la entrada es obligatoria';
        }
    
        if (!$this->blogger_id) {
            self::$errores[] = 'Selecciona un autor para esta entrada';
        }
    
        return self::$errores;
    }

    public static function registrarResultado($numero) {
        header("Location: /admin-blog?resultado={$numero}");
        exit;
    }
}