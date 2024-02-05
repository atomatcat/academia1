<?php
namespace app\controllers;
use models\Informacion;
use models\Model;
use models\Admin;

class AdminController extends Controller{ 
   
    public function agregar(){
        
    }
    public function logout(){
        session_destroy();
    }
    
    public function todos_alumnos(){
        $model=new Admin();
      $array_alumnos=$model->getTodosAlumnos();
      header('Content-Type: application/json');
// el resultado de la consulta devolvemos en formato JSON
echo json_encode($array_alumnos);   
exit(); 
    }

    public function todos_profesores(){
        $model=new Admin();
      $array_profesores=$model->getTodosProfesores();
      header('Content-Type: application/json');
// el resultado de la consulta devolvemos en formato JSON
echo json_encode($array_profesores);   
exit(); 
    }

    public function tipo_usuario(){
        $dni = $_GET['dni'];
        $model=new Admin();
      $dato_dni=$model->checkDni($dni);
      header('Content-Type: application/json');
// el resultado de la consulta devolvemos en formato JSON
echo json_encode($dato_dni);   
exit(); 
    }
// borrar Alumno
    public function borrar_usuario(){
        $dni = $_GET['dni'];
        $model=new Admin();
       $res = $model->delAlumno($dni);
    echo json_encode(array('success' => $res));
   //---------------------------------------------------
        //$model->delAlumno($dni);
       // $res= $model->delAlumno($dni);
        //if ($res) {
           // $_SESSION['success_message']= "El alumno ha sido borrado";
   // header('Location: admin/agregar');
       // } else {
            
           // $_SESSION['error_message'] ='Error al borrar alumno';
           // header('Location: admin/agregar');
       // }
    }

    public function add_alumno(){
        $dni = $_GET['dni'];
        $nombre= $_GET['nombre'];
        $apellidos= $_GET['apellidos'];
        $email= $_GET['email'];
        $centro= $_GET['centro'];
        $asignatura= $_GET['asignatura'];
        $hora= $_GET['hora'];
        $model=new Admin();
        $res= $model->newAlumno($dni, $nombre, $apellidos, $email, $centro, $asignatura, $hora);
        header('Content-Type: application/json');
        echo json_encode(array('success' => $res));
}
public function add_horario(){
    $dni = $_GET['dni'];
    $asignatura= $_GET['asignatura'];
    $hora= $_GET['hora'];
    $model=new Admin();
    $res= $model->nuevaHora($dni,$asignatura, $hora);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
}
public function horario_clases(){
    // creamos una instancia de la clase Admin
    $model = new Admin();
    // llamamos al método horarioClases de la instancia Admin 
    // guardamos el resultado en la variable $array_clases
    $array_clases = $model->horarioClases();
    // creamos encabezado de la respuesta HTTP que será un json
    header('Content-Type: application/json');
    // convertimos el array a formato JSON que será enviado como respuesta http
    echo json_encode($array_clases);   

    exit(); 
}


public function modEmailAlumno(){
    $dni = $_GET['dni'];
    $email= $_GET['email']; 
    $model=new Admin();
    $res= $model->modificarEmailAlumno($dni, $email);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
    
}

public function modificarCentro(){
    $dni = $_GET['dni'];
    $centro= $_GET['centro'];
    $model=new Admin();
    $res= $model->modCentro($dni, $centro);
   
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
    

}
public function add_prof(){
    $dni = $_GET['dni'];
    $nombre= $_GET['nombre'];
    $apellidos= $_GET['apellidos'];
    $email= $_GET['email'];
    $tipo= $_GET['tipo'];
    $model=new Admin();
    $res= $model->newProf($dni, $nombre, $apellidos, $email, $tipo);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
}
//--------Alumno añadir más horas para una clase 
public function add_horas(){

}
public function modificar_prof(){
    $dni = $_GET['dni'];
    $dniAnt = $_GET['dniAnt'];
    $model=new Admin();
    $res= $model->modificarProf($dniAnt,$dni);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
    
}

public function add_hora_clase(){
    $dni = $_GET['dniClase'];
    $dia = $_GET['diaClase'];
    $hora = $_GET['horaClase'];
    $model=new Admin();
    $res= $model->addClaseHorario($dni,$dia,$hora);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
}

public function select_prof(){
    
    $model = new Admin();
    $array_clases = $model->selectProf();
    header('Content-Type: application/json');
    echo json_encode($array_clases);   

    exit(); 
}

public function alta_imparte(){
    $id = $_GET['id'];
    $dniProf = $_GET['dniProf'];
    $model=new Admin();
    $res= $model->addClaseImparte($id,$dniProf);
    header('Content-Type: application/json');
    echo json_encode(array('success' => $res));
}
}
?>