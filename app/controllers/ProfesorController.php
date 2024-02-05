<?php
namespace app\controllers;
use models\Informacion;
use models\Profesor;

class ProfesorController extends Controller{ 

  public $datos_horario=[];

    public function ver(){
        $model =new Profesor;
        $dni_prof = $_SESSION['dni'];
         $this->datos_horario = $model->getHorario($dni_prof);
         // $horario_profesor = $model->getTodos();
         $nombre=$this->datos_horario;
         $this->cargarVariable(compact('nombre'));
        
         //debug($horario_profesor);
    }
    

    public function tabla_alumnos(){
// recojemos los parámetros enviados en fetch
$dia = $_GET['dia'];
$hora = $_GET['hora'];
//$dni = $_GET['dni_prof'];


  $dni_prof = $_GET['dni_prof'];


// obtenemos los datos de los alumnos 
$model = new Profesor();
$alumnos = $model->getAlumnos($dia, $hora, $dni_prof);
header('Content-Type: application/json');
// procesamos el resultado de la consulta y lo devolvemos en formato JSON
echo json_encode($alumnos);        
    }

    public function logout(){
      session_destroy();
  }
  


  public function moveFile(){
   
    if (isset($_POST['enviar'])) {
     // si se ha seleccionado un archivo
     if(empty($_POST['email'])){
     
      $_SESSION['error_message'] = 'Debes ingresar un email';
  header('Location: profesor/ver');
      exit;
     }
 if (!isset($_FILES['archivo'])||empty($_FILES['archivo']) || $_FILES['archivo']['error'] === UPLOAD_ERR_NO_FILE) {
  // usuario no ha seleccionado ningún archivo o código de error asociado con la carga del archivo es UPLOAD_ERR_NO_FILE
  $_SESSION['error_message'] = 'Debes seleccionar un archivo ';
 
  header('Location: profesor/ver');
  exit;

}

//  si el archivo cumple con las restricciones de tamaño
$max_size = 1048576; // establecemos el tamaño  máximo permitido en bytes 1 MB
if ($_FILES['archivo']['size'] > $max_size) {
  //si el archivo excede el tamaño máximo permitido
  $_SESSION['error_message'] = 'El archivo es demasiado grande, el tamaño máximo permitido es 1 MB';
  header('Location: profesor/ver');
}

//  si el archivo cumple con las restricciones de tipo de archivo
$tipos_permitidos = array('pdf', 'doc', 'docx','txt'); // tipos permitidos
$file_tipo = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION);
if (!in_array($file_tipo, $tipos_permitidos)) {
  // El tipo de archivo no está permitido
  $_SESSION['error_message'] = 'Este tipo de archivo no está permitido, solo se permiten archivos PDF, DOC, TXT y DOCX';
  header('Location: profesor/ver');
}

// el archivo cumple con todas las restricciones y se puede subir al servidor
$file_tmp = $_FILES['archivo']['tmp_name'];
    $file_name = $_FILES['archivo']['name'];
    $file_destination = 'app/views/alumno/' . $file_name;
    if (move_uploaded_file($file_tmp, $file_destination)) {
        // archivo se ha movido correctamente
        //  guardamos la ubicación del archivo en la base de datos
        //------------------
        
// $file_todo_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $file_destination;
        //------------------
        $email_alumno = $_POST['email'];
        $asignatura = $_SESSION['tipo'];
        $dni_prof= $_SESSION['dni'];
$recurso=new Profesor;
$rec=$recurso->addRecurso($email_alumno,$dni_prof,$asignatura,$file_name);
$_SESSION['success_message']= "archivo se ha movido correctamente";
header('Location: profesor/ver');
    } else {
        // no se ha podido mover el archivo
        $_SESSION['error_message'] ='Error al subir el archivo ...';
        header('Location: profesor/ver');
    }
    }
}
}

?>