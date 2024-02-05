<?php
namespace app\controllers;

use models\Informacion;
use models\Model;

class InicioController extends Controller{

    public function principal(){
      
  
    }
    public function mapa(){
     
      header("Location: views/account/mapa.php");
      
      
  }
}?>