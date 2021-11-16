<?php

namespace Model;

class ParticipacionAlumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'PARTICIPACION_ALUMNO';
    protected static $columnasDB = ['id', 'tipo', 'alumno_x_grupo_id', 'usuario_id', 'semestre_id', 'invitacion_id'];

    public $id;
    public $tipo;
    public $alumno_x_grupo_id;
    public $usuario_id;
    public $semestre_id;
    public $invitacion_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->alumno_x_grupo_id = $args['alumno_x_grupo_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->semestre_id = $args['semestre_id'] ?? '';
        $this->invitacion_id = $args['invitacion_id'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un alumno ya participò en una invitacion en un grupo
    public function existeEvento()
    {
        $query = " SELECT * FROM " . self::$tabla . " alumno_x_grupo_id = '" . $this->alumno_x_grupo_id . "' invitacion_id='" . $this->invitacion_id . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El participante ya participó en la invitación';
        }

        return $resultado;
    }
}
