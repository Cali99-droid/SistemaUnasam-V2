<?php

namespace Model;

class Rol extends ActiveRecord
{
    //base datos
    protected static $tabla = 'TIPO_USUARIO';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
    public $permisos;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


    public  function setPermisos()
    {
        $id =  $this->id;
        $this->permisos = Opcion_x_tipo::getPermisos($id);
    }


    public static function permisos()
    {
        $query = 'SELECT * FROM  opciones  ';
        $resultado = self::consulta($query);
        return $resultado;
    }
}
