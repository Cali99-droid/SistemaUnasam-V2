<?php

namespace Model;

class Resolucion_x_beneficio extends ActiveRecord
{
    //base datos
    protected static $tabla = 'resolucion_x_beneficio';
    protected static $columnasDB = ['id', 'numero', 'fecha_emision', 'estado', 'beneficio_id'];

    public $id;
    public $numero;
    public $fecha_emision;
    public $estado;
    public $beneficio_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->numero = $args['numero'] ?? '';
        $this->fecha_emision = $args['fecha_emision'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->beneficio_id = $args['beneficio_id'] ?? '';
    }


    /**
     * Mensajes de validacion
     */

    //revisa si un numero ya existe
    public function existeResolucion()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE numero = '" . $this->numero . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El numero ya esta registrado';
        }

        return $resultado;
    }
}
