<?php

namespace Model;

class Invitacion extends ActiveRecord
{
    //base datos
    protected static $tabla = 'invitacion';
    protected static $columnasDB = ['id', 'fecha_registro', 'fecha_hora', 'estado', 'observacion', 'evento_id', 'grupo_universitario_id'];

    public $id;
    public $fecha_registro;
    public $fecha_hora;
    public $estado;
    public $observacion;
    public $evento_id;
    public $grupo_universitario_id;
    public $evento;
    public $grupo;

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
        $id = $this->evento_id;
        $evento = Evento::find($id);
        $this->evento = $evento->nombre;
        return $evento;
    }

    public function getGrupo()
    {
        $id = $this->grupo_universitario_id;
        $grupo = Grupo::find($id);
        $this->grupo = $grupo->nombre;
        return $grupo;
    }

    public function getEstado()
    {

        $query = "SELECT func_EstadoInvitacion(" . $this->id . ", " . $this->fecha_hora . ") estado";
        $estado = self::consulta($query)->fetch_object();
        return $estado->estado;
    }

    public function validarInvitacion()
    {
        $query = "SELECT * FROM invitacion WHERE evento_id =  " . $this->evento_id . " AND grupo_universitario_id = " . $this->grupo_universitario_id;
        $invitacion = self::consultarSQL($query);
        if ($invitacion) {
            return true;
        } else {
            return false;
        }
    }
}
