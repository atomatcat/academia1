<?php 
namespace vendor\core;

class View{

 public $ruta=[];//para recojer los nombres de accion(vista) y controller(carpeta) para poder localizar la vista
 public $view;

 public function __construct($ruta,$view=''){
    $this->ruta = $ruta;
    $this->view = $view;
 }
 public function render($vars){//aqui conectamos la vista y pasamos parámetros que vamos a usar de controllador a view
    if(is_array($vars)){
        extract($vars);//extraemos datos y creamos los variables con el mismo nombre para estos datos
    } 
    $ruta_vista = APP . "\\".$this->ruta['controller']."\\".$this->view.".php";
     if (is_file($ruta_vista) ) {
        require $ruta_vista;
     } else {
      // echo "la vista no encontrada ...";
     }
     
 }
}
?>