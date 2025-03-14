<?php
namespace Model;

abstract class ActiveRecord {
    protected static $db;
    protected static $columnasDB = [];
    protected static $errores = [];
    protected static $tabla = '';
    protected $id;

    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar() {
        if(!$this->id) {
            $this->crear();
        } else {
            $this->actualizar();
        }
    }
    
    public function crear() {
        $atributos = $this->sanitizarDatos();
        $stringColumnas = join(", ", array_keys($atributos));
        $stringValores = join("', '", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla ."(" . $stringColumnas . ") VALUES ('" . $stringValores . "')";

        try {
            self::$db->query($query);
            static::registrarResultado('1');
        } catch (\Throwable $th) {
            static::registrarResultado('0');
        }
    }

    public function actualizar() {
        $atributos = $this->sanitizarDatos();
        $valores = [];

        foreach($atributos as $atributo=>$valor) {
            $valores[] = "{$atributo}='{$valor}'";
        }

        $id = self::$db->escape_string($this->id);
        $query = "UPDATE ". static::$tabla ." SET " . join(", ", $valores) . " WHERE id = '{$id}' LIMIT 1";
    
        try {
            self::$db->query($query);
            static::registrarResultado('2');
        } catch (\Throwable $th) {
            static::registrarResultado('0');
        }
    }

    public function getAtributos() {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this->getAtributos();
        $sanitizados = [];

        foreach ($atributos as $columna => $valor) {
            $sanitizados[$columna] = self::$db->escape_string($valor);
        }

        return $sanitizados;
    }

    public static function getErrores() {
        return static::$errores;
    }

    public abstract function validar();

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $array = static::consultarTabla($query);
        return $array;
    }

    public static function take($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$cantidad}";
        $array = static::consultarTabla($query);
        return $array;
    }

    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resultado = static::consultarTabla($query);
        return array_shift($resultado);
    }

    public static function consultarTabla($query) {
        $resultado = self::$db->query($query);
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        return $array;
    }

    public static function crearObjeto(array $registro) {
        $objeto = new static($registro);
        return $objeto;
    }

    public function sincronizar(array $args = []) {
        foreach($args as $atributo=>$valor) {
            if (property_exists($this, $atributo)) {
                $this->$atributo = $valor;
            }
        }
    }

    public function eliminar() {
        $id = self::$db->escape_string($this->id);
        $query = "DELETE FROM " . static::$tabla . " WHERE id={$id} LIMIT 1";

        try {
            self::$db->query($query);
            static::registrarResultado('3');
        } catch (\Throwable $th) {
            if ($th->getCode() == 1451) {
                static::registrarResultado('4');
            } else {
                static::registrarResultado('0');
            }
        }
    }

    public static function registrarResultado($numero) {
        header("Location: /admin?resultado={$numero}");
        exit;
    }
}