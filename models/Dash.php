<?php

namespace Model;

class Dash extends ActiveRecord
{



    public static function getCantidadParticipantes()
    {
        $query = "SELECT nombre_grupo nombre, count(idAlumnoGrupo) cantidad from grupo_universitario gu inner join alumnogrupo ag
         on ag.idgrupo_universitario=gu.idgrupo_universitario group by gu.idgrupo_universitario";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getCantidadInvitaciones()
    {
        $query = "SELECT nombre_grupo, count(*) CantidadInvitaciones
         from grupo_universitario gu inner join invitacion i on i.idgrupo_universitario=gu.idgrupo_universitario
         group by gu.idgrupo_universitario";
        $resultado = self::$db->query($query);
        return $resultado;
    }


    public static function getTop()
    {
        $query = "SELECT f.nombre_facultad,e.nombre_escuela, COUNT(*) cantidad
                   from alumno a inner join persona p on p.idPersona=a.idPersona
                   inner join procedencia pro on pro.idProcedencia=a.idProcedencia
                   inner join escuela e on e.idEscuela=a.idEscuela
                   inner join facultad f on f.idFacultad=e.idFacultad
                   group by e.nombre_escuela order by cantidad desc limit 5;";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getParticipacionesPorFecha()
    {
        $query = "SELECT count(*) Cantidad ,concat(year(a.fecha_inicio),' ',ELT(MONTH(a.fecha_inicio), 'ENERO', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'))Inicio
          FROM eventos_realizados a GROUP BY Inicio order by Inicio";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getEsc()
    {
        $query = " SELECT e.nombre_escuela,date_format(fechaHoraInvitacion,'%Y-%m') Inicio,count(*) Tendencia
         from alumno a 
         inner join escuela e on e.idEscuela=a.idEscuela
         inner join facultad f on f.idFacultad=e.idFacultad
         inner join alumnogrupo ag on ag.idAlumno=a.idAlumno
         inner join participacionalumno pa on pa.idAlumnoGrupo=ag.idAlumnoGrupo
         inner join invitacion i on i.idinvitacion=pa.idinvitacion
         group by e.idEscuela";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getEstadoBeneficios()
    {
        $query = "SELECT b.nombre,count(ba.estado) as cantidad from beneficio b 
                inner join beneficioxtipgrupo bg on b.idBeneficio=bg.idBeneficio
                inner join beneficioalumno ba on ba.idBeneficioxtipGrupo=bg.idBeneficioxtipGrupo
                WHERE ba.estado='PENDIENTE'
                 group by ba.estado, b.idBeneficio order by nombre";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function getBeneficiosPendientes()
    {

        $query = "SELECT b.nombre,count(ba.estado) as cantidad from beneficio b 
 inner join beneficioxtipgrupo bg on b.idBeneficio=bg.idBeneficio
 inner join beneficioalumno ba on ba.idBeneficioxtipGrupo=bg.idBeneficioxtipGrupo
 WHERE ba.estado='CUMPLIDO'
 group by ba.estado, b.idBeneficio order by nombre";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}
