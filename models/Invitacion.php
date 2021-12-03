<?php

namespace Model;

class Invitacion extends ActiveRecord
{
    //base datos
    protected static $tabla = 'INVITACION';
    protected static $columnasDB = ['id', 'fecha_registro', 'fecha_hora', 'estado', 'observacion', 'evento_id', 'grupo_universitario_id'];

    public $id;
    public $fecha_registro;
    public $fecha_hora;
    public $estado;
    public $observacion;
    public $evento_id;
    public $grupo_universitario_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha_registro = $args['fecha_registro'] ?? date('Y-m-d');
        $this->fecha_hora = $args['fecha_hora'] ?? '';
        $this->estado = $args['estado'] ?? 'PENDIENTE';
        $this->observacion = $args['observacion'] ?? '';
        $this->evento_id = $args['evento_id'] ?? '';
        $this->grupo_universitario_id = $args['grupo_universitario_id'] ?? '';
    }


    public function getEvento()
    {
        $evento = Evento::find($this->evento_id);
        return $evento;
    }

    public function getEstado()
    {


        $query = "SELECT func_EstadoInvitacion(" . $this->id . ", " . $this->fecha_hora . ") estado";
        $estado = self::consulta($query)->fetch_object();
        return $estado->estado;
    }
}
