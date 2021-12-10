<?php

namespace Model;

class Dash extends ActiveRecord
{

    public static function getCantidadParticipantes()
    {
        $query = "SELECT nombre, count(ag.id) cantidad
        FROM grupo_universitario gu inner join alumno_x_grupo ag
        on ag.grupo_universitario_id=gu.id group by gu.id";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getCantidadInvitaciones()
    {
        $query = "SELECT nombre nombre_grupo, count(*) CantidadInvitaciones
        from grupo_universitario gu inner join invitacion i on i.grupo_universitario_id=gu.id
        group by gu.id;";
        $resultado = self::$db->query($query);
        return $resultado;
    }


    public static function getTop()
    {
        $query = "SELECT f.nombre nombre_facultad,e.nombre nombre_escuela, COUNT(*) cantidad
        from alumno a inner join persona p on p.id=a.persona_id
        inner join escuela e on e.id=a.escuela_id
        inner join facultad f on f.id=e.facultad_id
        group by e.nombre order by cantidad desc limit 5;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getParticipacionesPorFecha()
    {
        $query = "SELECT count(*) Cantidad ,concat(year(e.fecha_inicio),' ',
        ELT(MONTH(e.fecha_inicio), 'ENERO', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'))Inicio
        FROM evento e GROUP BY Inicio order by Inicio;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getEsc()
    {
        $query = "SELECT e.nombre nombre_escuela,date_format(fecha_Hora,'%Y-%m') Inicio,count(*) Tendencia
            from alumno a
            inner join escuela e on e.id=a.escuela_id
            inner join facultad f on f.id=e.facultad_id
            inner join alumno_x_grupo ag on ag.alumno_id=a.id
            inner join participacion_alumno pa on pa.alumno_x_grupo_id=ag.id
            inner join invitacion i on i.id=pa.invitacion_id
            group by e.id;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getEstadoBeneficios()
    {
        $query = "SELECT b.nombre,count(ba.estado) as cantidad from beneficio b
        inner join beneficio_x_tipo_grupo bg on b.id=bg.beneficio_id
        inner join beneficio_x_alumno ba on ba.beneficio_x_tipo_grupo_id=bg.id
        WHERE ba.estado='COMPLETADO'
        group by ba.estado, b.id order by nombre;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getBeneficiosPendientes()
    {

        $query = "SELECT b.nombre,count(ba.estado) as cantidad
        from beneficio b
        inner join beneficio_x_tipo_grupo bg on b.id=bg.beneficio_id
        inner join beneficio_x_alumno ba on ba.beneficio_x_tipo_grupo_id=bg.id
        WHERE ba.estado='PENDIENTE'
        group by ba.estado, b.id order by nombre;";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public static function getEscuelas()
    {

        $query = "SELECT e.nombre ,date_format(fecha_Hora,'%Y-%m') Inicio,count(*) Tendencia
        from alumno a 
       inner join escuela e on e.id=a.Escuela_id
       inner join facultad f on f.id=e.Facultad_id
       inner join alumno_x_grupo ag on ag.Alumno_id=a.id
       inner join participacion_alumno pa on pa.alumno_x_grupo_id=ag.id
       inner join invitacion i on i.id=pa.invitacion_id
       group by e.id";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public static function getFechas()
    {

        $query = "SELECT e.nombre ,date_format(fecha_Hora,'%Y-%m') Inicio,count(*) Tendencia
        from alumno a 
       inner join escuela e on e.id=a.Escuela_id
       inner join facultad f on f.id=e.Facultad_id
       inner join alumno_x_grupo ag on ag.Alumno_id=a.id
       inner join participacion_alumno pa on pa.alumno_x_grupo_id=ag.id
       inner join invitacion i on i.id=pa.invitacion_id
       group by Inicio order by Inicio";
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public static function cantidad($fecha, $escuela)
    {

        $query = "SELECT e.nombre ,date_format(fecha_Hora,'%Y-%m') Inicio,count(*) Tendencia
            from alumno a 
            inner join escuela e on e.id=a.Escuela_id
            inner join facultad f on f.id=e.Facultad_id
            inner join alumno_x_grupo ag on ag.Alumno_id=a.id
            inner join participacion_alumno pa on pa.alumno_x_grupo_id=ag.id
            inner join invitacion i on i.id=pa.invitacion_id
            group by Inicio,e.nombre having Inicio='" . $fecha . "' and e.nombre='" . $escuela . "'  order by Inicio";
        $resultado = self::$db->query($query);
        if ($resultado->num_rows > 0)
            while ($fila = $resultado->fetch_assoc()) {
                return $fila["Tendencia"];
            }
        else
            return 0;
    }

    public static function muestraDash()
    {
        $mensaje = "data.addRows([";
        foreach (self::getFechas()->fetch_all() as $fechass) {
            $mensaje .= "['" . $fechass[1] . "'";

            $fila2 = self::getEscuelas()->fetch_all();
            for ($i = 0; $i < self::getEscuelas()->num_rows; $i++) {
                $mensaje .= ", " . self::cantidad($fechass[1], $fila2[$i][0]);
            }
            $mensaje .= "],";
        }
        return $mensaje . ']);';
    }
}
