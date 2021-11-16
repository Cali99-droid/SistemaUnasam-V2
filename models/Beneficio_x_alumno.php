<?php

namespace Model;

class Beneficio_x_alumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'BENEFICIO_X_ALUMNO';
    protected static $columnasDB = ['id', 'estado', 'fecha_efectiva', 'descripcion', 'semestre_id', 'beneficio_x_tipo_grupo_id', 'alumno_x_grupo_id', 'usuario_id'];

    public $id;
    public $estado;
    public $fecha_efectiva;
    public $descripcion;
    public $semestre_id;
    public $beneficio_x_tipo_grupo_id;
    public $alumno_x_grupo_id;
    public $usuario_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->fecha_efectiva = $args['fecha_efectiva'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->semestre_id = $args['semestre_id'] ?? '';
        $this->beneficio_x_tipo_grupo_id = $args['beneficio_x_tipo_grupo_id'] ?? '';
        $this->alumno_x_grupo_id = $args['alumno_x_grupo_id'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un estado ya existe
    public function existeBeneficioAlumno()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE id = '" . $this->id . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El estado ya esta registrado';
        }

        return $resultado;
    }
}
