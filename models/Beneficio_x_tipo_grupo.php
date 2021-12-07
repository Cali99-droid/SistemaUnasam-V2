<?php

namespace Model;

class Beneficio_x_tipo_grupo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'beneficio_x_tipo_grupo'; //BENEFICIO_X_TIPO_GRUPO
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




    public function getNombreBeneficio()
    {
        $id = $this->beneficio_id;
        $beneficio = Beneficio::find($id);

        return $beneficio->nombre;
    }
}
