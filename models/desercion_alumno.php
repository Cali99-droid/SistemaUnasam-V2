<?php

namespace Model;

class Desercion_alumno extends ActiveRecord
{
    //base datos
    protected static $tabla = 'desercion_alumno'; //vista
    protected static $columnasDB = ['id', 'fecha', 'alumno_id', 'desercion_id'];

    public $id;
    public $fecha;
    public $alumno_id;
    public $desercion_id;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->alumno_id = $args['alumno_id'] ?? '';
        $this->desercion_id = $args['desercion_id'] ?? '';
    }
    public  function getSemestre()
    {
        $query = "SELECT func_semestre(" . $this->id . ") valor;";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['valor'];
    }
    public  function getDesercion()
    {
        //$query = "SELECT  descripcion from vista_desercion_alumno where id_desercion_alumno='" . $this->id . "' valor;";
        $query = "SELECT descripcion from vista_desercion_alumno where id_desercion_alumno=$this->id";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['descripcion'];
    }
    public function setDescripcion()
    {
        $id = $this->desercion_id;
        $desercion = Desercion::find($id);
        $this->descripcion = $desercion->descripcion;
    }
    public function validarRepeticion()
    {
        $query = "SELECT if(count(desercion_id)>0,'existe','no existe') resultado from desercion_alumno where fecha= '" . $this->fecha . "' and alumno_id=" . $this->alumno_id . " and desercion_id=" . $this->desercion_id . ";";
        $resultado = self::consulta($query)->fetch_assoc();
        return $resultado['resultado'];

        /*
        $nombreS = $this->descripcion;
        $sem = Desercion::where('descripcion', $nombreS);
        if ($sem) {
            if ($sem->id == $this->id) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }*/
    }
}
