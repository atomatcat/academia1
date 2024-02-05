<?php
namespace models;
use models\Model;
use vendor\core\Db;
class Admin extends Model{

    public function getTodosAlumnos(){
        $sql = "SELECT persona.dni, persona.nombre, persona.apellidos, persona.email, alumno.centro 
        FROM persona 
        JOIN alumno ON alumno.dni = persona.dni ";
        return $this->pdo->consultaTodo($sql);
    }
    public function getTodosProfesores(){
        $sql = "SELECT persona.dni, persona.nombre, persona.apellidos, persona.email, profesor.tipo
        FROM persona 
        JOIN profesor ON profesor.dni = persona.dni ";
        return $this->pdo->consultaTodo($sql);
    }
public function delAlumno($dni){
    $sql = "DELETE FROM Matricula WHERE dni_alumno = '$dni'";
    $res1 =  $this->pdo->ejecutar($sql);
    $sql = "DELETE FROM Alumno WHERE dni = '$dni'";
    $res2 =  $this->pdo->ejecutar($sql);
    $sql = "DELETE FROM Persona WHERE dni = '$dni'";
    $res3 =  $this->pdo->ejecutar($sql);

    return  $res1 && $res2 && $res3;
}

    public function newAlumno($dni, $nombre, $apellidos, $email, $centro, $asignatura, $hora){
        
            // insertamos en la tabla Persona
            $sql = "INSERT INTO Persona (dni, nombre, apellidos, email) VALUES ('$dni', '$nombre', '$apellidos', '$email')";
            $res1 =  $this->pdo->ejecutar($sql);
            
            // insertamos en la tabla Alumno
            $sql = "INSERT INTO Alumno (dni, centro) VALUES ('$dni', '$centro')";
        
            $res2 =  $this->pdo->ejecutar($sql);
        
            // insertamos en la tabla Matricula
            $sql = "INSERT INTO Matricula (dni_alumno, id_asignatura, id_horario) VALUES ('$dni', '$asignatura', '$hora')";
        
            $res3 =  $this->pdo->ejecutar($sql);
           
            return  $res1 && $res2 && $res3;
        
    } 
    public function nuevaHora($dni,$asignatura, $hora){
       // insertamos más horas al Alumno
       $sql = "INSERT INTO Matricula (dni_alumno, id_asignatura, id_horario) VALUES ('$dni', '$asignatura', '$hora')";
        
       $res =  $this->pdo->ejecutar($sql);
      
       return  $res;
    }

    public function horarioClases(){
        $sql = "SELECT * FROM VistaHorarioClases;";
        return $this->pdo->consultaTodo($sql);
    }

    public function modificarEmailAlumno($dni, $email){
       
            $sql = "UPDATE persona SET email = '$email' WHERE dni = '$dni' ";
            $res =  $this->pdo->ejecutar($sql);
            return $res;
        
    }

    public function modCentro($dni, $centro){
       
        $sql = "UPDATE alumno SET centro = '$centro' WHERE dni = '$dni' ";
        $res =  $this->pdo->ejecutar($sql);
        return  $res;
    
}
    public function modificarHoraAlumno($dni, $asignatura, $hora){
        $sql = "DELETE FROM Matricula WHERE id_alumno = '$dni' AND id_asignatura = '$asignatura' AND id_horario = '$hora'";
        
        $res =  $this->pdo->ejecutar($sql);
       
        return  $res;

    }
   public function  newProf($dni, $nombre, $apellidos, $email, $tipo){
      // insertamos en la tabla Persona
      $sql = "INSERT INTO Persona (dni, nombre, apellidos, email) VALUES ('$dni', '$nombre', '$apellidos', '$email')";
      $res1 =  $this->pdo->ejecutar($sql);
      
      // insertamos en la tabla Profesor
      $sql = "INSERT INTO Profesor (dni, tipo) VALUES ('$dni', '$tipo')";
  
      $res2 =  $this->pdo->ejecutar($sql);
      return  $res1 && $res2;
   }
   public function modificarProf($dniActual, $dniNuevo){
    $this->pdo->modProfesor($dniActual, $dniNuevo);
}

public function addClaseHorario($dni,$dia,$hora){
// insertamos en la tabla Horario de Profesor
$sql = "INSERT INTO `horario` (`dni_profesor`, `dia`, `hora`) VALUES ('$dni', '$dia', '$hora')";
        
$res =  $this->pdo->ejecutar($sql);

return  $res;

}

public function selectProf(){
    $sql = "SELECT Horario.*
    FROM Horario
    LEFT JOIN Imparte ON Horario.id = Imparte.id_horario
    WHERE Imparte.id_horario IS NULL";

    return $this->pdo->consultaTodo($sql);
}


public function addClaseImparte($id,$dni){
// insertamos en la tabla Imparte
$sql = "INSERT INTO `imparte` (`dni_profesor`,`id_horario`) VALUES ('$dni', '$id')";
        
$res =  $this->pdo->ejecutar($sql);

return  $res;
}
   }
?>