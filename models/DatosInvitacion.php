<?php

namespace Model;

class DatosInvitacion extends ActiveRecord
{
    //base datos
    protected static $tabla = 'vta_datosinvitacion';
    protected static $columnasDB = ['id', 'idbeneficio', 'Beneficio', 'idTipoGrupo', 'TipoGrupo', 'estado'];

    public $id;
    public $idbeneficio;
    public $Beneficio;
    public $idTipoGrupo;
    public $TipoGrupo;
    public $estado;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idbeneficio = $args['idbeneficio'] ?? '';
        $this->Beneficio = $args['Beneficio'] ?? '';
        $this->idTipoGrupo = $args['idTipoGrupo'] ?? '';
        $this->TipoGrupo = $args['TipoGrupo'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }
}
