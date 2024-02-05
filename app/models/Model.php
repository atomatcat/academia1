<?php
    namespace models;

    use vendor\core\Db;

    abstract class Model{
          protected $pdo;//para guardar la conexión
          protected $tabla; // nombre de la tabla con la que vamos a trabajar
          protected $dni;// dni de la persona alumno o profesor

          public function __construct(){//
            $this->pdo = Db::getInstancia();//guardamos la conexión a la base de datos
          }

         public function insertar($sql){ //"envoltorio" para el método ejecutar de Db
                  return $this->pdo->ejecutar($sql);
      
         }
         public function getTodos(){//devuelve todos los datos de una tabla
          $sql = "SELECT * FROM {$this->tabla}";
         return $this->pdo->consultaTodo($sql); // devolvemos los datos con el mètodo consulta de Db

      }

         public function addRecurso($email_alumno, $dni_prof, $tipo_prof,$ruta) {
          // Primero, obtén el 'dni' del alumno usando el 'email'
          $sql = "SELECT dni FROM Persona WHERE email ='$email_alumno'";
          $dni_alumno = $this->pdo->consulta($sql)['dni'];
      
          // Luego, obtén el 'id' de la asignatura usando el 'dni' del profesor y el 'tipo' del profesor
          $sql = "SELECT id FROM Asignatura WHERE dni_profesor ='$dni_prof' AND nombre ='$tipo_prof'";
          $id_asignatura = $this->pdo->consulta($sql)['id'];
      
          // Ahora, puedes insertar un nuevo registro en la tabla 'Recursos'
          $sql = "INSERT INTO Recursos (dni_alumno, id_asignatura, ruta_recurso) VALUES ('$dni_alumno', '$id_asignatura', '$ruta')";
          return $this->pdo->ejecutar($sql);
      
         }


         public function getAccount($dni){
          $sql = "SELECT p.dni,p.nombre,p.apellidos,p.email,pr.dni AS dni_profesor,pr.tipo,a.dni AS dni_alumno,a.centro, ad.dni AS dni_admin,ad.rol 
           FROM persona p 
           LEFT JOIN profesor pr ON p.dni = pr.dni 
           LEFT JOIN alumno a ON p.dni = a.dni 
           LEFT JOIN administrador ad ON p.dni = ad.dni 
          WHERE p.dni = '$dni'
          ";
          return $this->pdo->consulta($sql);
         }
         
         public function checkDni($dni){
          $sql = "SELECT 'profesor' as tipo FROM Profesor WHERE dni = '$dni'
          UNION ALL 
                  SELECT 'administrador' as tipo FROM administrador WHERE dni = '$dni'
          UNION ALL  
                  SELECT 'alumno' as tipo FROM Alumno WHERE dni = '$dni'";
          return $this->pdo->consulta($sql);
         }
    }
?>