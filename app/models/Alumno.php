<?php
namespace models;
use models\Model;

class Alumno extends Model{


    public function getAlumnoHorario($dni){
        $sql = "SELECT Horario.dia AS dia, Horario.hora AS hora, Asignatura.nombre AS nombre
        FROM Matricula
        JOIN Horario ON Matricula.id_horario = Horario.id
        JOIN Asignatura ON Matricula.id_asignatura = Asignatura.id
        WHERE Matricula.dni_alumno = '{$dni}'";
        return $this->pdo->consultaTodo($sql);
    }

    public function getDatosGrafico($dni){
        $sql = "SELECT asignatura.nombre AS id_asignatura, calificaciones.calificacion AS calificacion, calificaciones.fecha AS fecha
        FROM calificaciones 
        JOIN asignatura ON calificaciones.id_asignatura = asignatura.id 
        WHERE calificaciones.dni_alumno = '{$dni}' 
        ORDER BY STR_TO_DATE(calificaciones.fecha, '%d.%m') ASC";
        return $this->pdo->consultaTodo($sql);

    }
    public function getDatoRecursos($dni){//devuelve todos los recursos
        $sql = "SELECT * FROM `recursos` WHERE dni_alumno = '{$dni}' ";
       return $this->pdo->consultaTodo($sql); // devolvemos los datos con el mètodo consulta de Db

    }
//----------Inicio ELIMINAR
   public function getNumeroGraficos($dni){
    $sql = "SELECT COUNT(DISTINCT Asignatura.id) AS cantidad_asignaturas, Asignatura.nombre AS asignatura_nombre
    FROM Matricula
    JOIN Asignatura ON Matricula.id_asignatura = Asignatura.id
    WHERE Matricula.dni_alumno = '{$dni}'
    GROUP BY Asignatura.nombre";
    return $this->pdo->consultaTodo($sql);

}
//------------Fin ELIMINAR
}


?>