<?php

namespace Model;

class Opcion_x_tipo extends ActiveRecord
{
    //base datos
    protected static $tabla = 'OPCION_X_TIPO';
    protected static $columnasDB = ['id', 'opciones_id', 'tipo_usuario_id'];

    public $id;
    public $opciones_id;
    public $tipo_usuario_id;
    


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->opciones_id = $args['opciones_id'] ?? '';
        $this->tipo_usuario_id = $args['tipo_usuario_id'] ?? '';
    }


    /*
           Mensajes de validacion
     
*/
    //revisa si un Alumno en un grupo ya existe
    
    /*public function existeTipo_Grupo()
    {
        $query = " SELECT * FROM " . self::$tabla . " nombre = '" . $this->nombre . "' LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El tipo de grupo ya existe';
        }

        return $resultado;
    }*/
   
 
}