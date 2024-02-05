<?php
namespace app\controllers;

use vendor\core\View;

 abstract class Controller {  
    
    public $ruta=[];//parámetros carpeta-vista para views
    public $view;
    public $vars = [];// datos del usuario

    public function __construct($ruta) {
        // iniciamos la sesión
       session_start();
     
       $this->ruta = $ruta;// cuando creamos clase_obj reenamos array ruta con lo que pasamos por parametro 
       $this->view = $ruta['action'];
    }
public function getView(){
    $vObj = new View($this->ruta,$this->view);
    $vObj->render($this->vars);
}

public function cargarVariable($vars){
$this->vars = $vars;
}
 
}
?>