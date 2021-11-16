<?php

namespace Model;

class Evento extends ActiveRecord
{
    //base datos
    protected static $tabla = 'EVENTO';
    protected static $columnasDB = ['id', 'nombre','fecha_inicio', 'fecha_fin', 'organizador_id'];

    public $id;
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    public $organizador_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha_inicio = $args['fecha_inicio'] ?? '';
        $this->fecha_fin = $args['fecha_fin'] ?? '';
        $this->organizador_id = $args['organizador_id'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Alumno en un grupo ya existe
    public function existeEvento()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Evento ya esta registrado';
        }

        return $resultado;
    }
   
 
}