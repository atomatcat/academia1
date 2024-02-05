<?php
namespace models;
use models\Model;

class Profesor extends Model{
    public $tabla ='horario';
    public function getAlumnos($dia,$hora,$dni){
        // buscamos qué alumnos están matriculados para un día concreto, una hora concreta y un profesor concreto
        $sql = "SELECT p.nombre AS nombre, p.apellidos AS apellidos, p.email AS email
        FROM Matricula m
        JOIN Asignatura a ON m.id_asignatura = a.id
        JOIN Horario h ON m.id_horario = h.id
        JOIN Profesor pr ON h.dni_profesor = pr.dni
        JOIN Persona p ON m.dni_alumno = p.dni
        WHERE h.hora = '$hora' AND h.dia = '$dia' AND pr.dni = '$dni'";
        return $this->pdo->consultaTodo($sql);
    }

    public function getHorario($dni){
        $sql = "
        SELECT * FROM horario WHERE dni_profesor='{$dni}';
        ";
           return $this->pdo->consultaTodo($sql);
    }
    
}


?>