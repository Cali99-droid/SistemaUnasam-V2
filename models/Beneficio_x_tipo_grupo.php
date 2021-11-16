<?php

namespace Model;

class Beneficio_x_tipo_grupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'BENEFICIO_X_TIPO_GRUPO';
    protected static $columnasDB = ['id', 'estado', 'beneficio_id', 'tipo_grupo_id'];

    public $id;
    public $estado;
    public $beneficio_id;
    public $tipo_grupo_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
        $this->beneficio_id = $args['beneficio_id'] ?? '';
        $this->tipo_grupo_id = $args['tipo_grupo_id'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un estado ya existe
    public function existeBeneficio_tipo_grupo()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE id = '" . $this->id . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El estado ya esta registrado';
        }

        return $resultado;
    }
}
