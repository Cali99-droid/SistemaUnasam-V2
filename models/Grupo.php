<?php

namespace Model;

class Grupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'GRUPO_UNIVERSITARIO';
    protected static $columnasDB = ['id', 'nombre', 'fecha_creacion', 'resolución_creacion', 'imagen', 'tipo_grupo_id'];

    public $id;
    public $nombre;
    public $fecha_creacion;
    public $resolución_creacion;
    public $imagen;
    public $tipo_grupo_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha_inicio = $args['fecha_creacion'] ?? '';
        $this->fecha_fin = $args['resolución_creacion'] ?? '';
        $this->organizador_id = $args['imagen'] ?? '';
        $this->organizador_id = $args['tipo_grupo_id'] ?? '';
    }
    //revisa si un nombre en un grupo ya existe
    public function existeEvento()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Grupo ya esta registrado';
        }

        return $resultado;
    }
}
