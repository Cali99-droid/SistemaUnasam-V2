<?php

namespace Model;

class Invitacion extends ActiveRecord
{
    //base datos
    protected static $tabla = 'INVITACION';
    protected static $columnasDB = ['id', 'fecha_registro', 'fecha_hora', 'estado', 'observación', 'evento_id', 'grupo_universitario_id'];

    public $id;
    public $fecha_registro;
    public $fecha_hora;
    public $estado;
    public $observación;
    public $evento_id;
    public $grupo_universitario_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha_registro = $args['fecha_registro'] ?? '';
        $this->fecha_hora = $args['fecha_hora'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->observación = $args['observación'] ?? null;
        $this->evento_id = $args['evento_id'] ?? '';
        $this->grupo_universitario_id = $args['grupo_universitario_id'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Alumno en un grupo ya existe
    public function existeInvitacion()
    {
        $query = " SELECT * FROM " . self::$tabla . " evento_id = '" . $this->evento_id . "'  grupo_universitario_id = '".$this->grupo_universitario_id."' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'La invitación ya fue registrada para el grupo';
        }

        return $resultado;
    }
   
 
}