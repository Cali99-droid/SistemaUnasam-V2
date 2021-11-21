<?php

namespace Model;

class Beneficio extends ActiveRecord
{
    //base datos
    protected static $tabla = 'beneficio';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }


    public function getResolucion()
    {
        $query = 'SELECT b.id, b.nombre, r.id idres, r.numero_resolucion, r.fecha_emision, r.estado, r.beneficio_id 
        FROM beneficio b left JOIN resolucion_x_beneficio r on b.id = r.beneficio_id WHERE b.id = ' . $this->id;
        $resultado = self::consulta($query);
        return $resultado;
    }

    /**
     * Mensajes de validacion
     */

    //revisa si un nombre ya existe
    public function existeBeneficio()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El nombre ya esta registrado';
        }

        return $resultado;
    }
}
