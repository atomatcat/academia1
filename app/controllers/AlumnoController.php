<?php
namespace app\controllers;
use models\Informacion;
use models\Alumno;

class AlumnoController extends Controller{ 

  public $datos_recurso=[];
  public $datos_horario=[];

    public function listar(){
        $model =new Informacion;
       
         $this->datos_horario = $model->getTodos();
         
         $nombre=$this->datos_horario;
         $this->cargarVariable(compact('nombre'));   
    }
    
    
    public function probar(){
       //echo "Ha llegado a la accion PROBAR";
        if (isset($_GET['dni'])) {
            $dni = $_GET['dni'];
            $alumno = new \models\Alumno();
            $result = $alumno->getAlumnoHorario($dni);
            header('Content-Type: application/json');
            // procesamos el resultado de la consulta y lo devolvemos en formato JSON
            echo json_encode($result);
        } else {
            // dni no especificado
            echo "DNI no especificado";
        }
    }

    public function datos_grafico(){
        
        $dni = $_GET['dni'];
        $alumno = new \models\Alumno();
        $result = $alumno->getDatosGrafico($dni);
        header('Content-Type: application/json');
        // procesamos el resultado de la consulta y lo devolvemos en formato JSON
        echo json_encode($result);
    }

//------------------eliminar-----------------
    public function numero_graficos(){
        
        $dni = $_GET['dni'];
        $alumno = new \models\Alumno();
        $result = $alumno->getNumeroGraficos($dni);
        header('Content-Type: application/json');
        $cantidad_asignaturas = $result[0]['cantidad_asignaturas'];
        $contenedores = '';
        //for ($i = 0; $i < $cantidad_asignaturas; $i++) {
           // $asignatura = $result[$i]['asignatura_nombre'];
           // $contenedores .= '<div class="contenedor">1<canvas id="grafo-' . $asignatura . '"></canvas></div>';
       // }
        
        // procesamos el resultado de la consulta y lo devolvemos en formato JSON
        echo json_encode(['contenedores' => $contenedores]);
    }

//_-------------

   public function get_recurso(){
    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];
        
        $model = new \models\Alumno();
        $res =$model->getDatoRecursos($dni);
        //$res=$this->datos_recurso;
        //$this->cargarVariable(compact('res'));  
        header('Content-Type: application/json');
        // procesamos el resultado de la consulta y lo devolvemos en formato JSON
        echo json_encode($res);



        /*  $json_recurso = json_encode($res);
        include_once 'views/alumno/listar.php'; */  
    }else {
        // email no especificado
        echo "email no especificado";
    }
       
    }   
    public function add_horario(){
        
    }  
    
    public function logout(){
        session_destroy();
    }
    
}

?>




