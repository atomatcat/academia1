<?php
namespace app\controllers;

use models\Account;

class AccountController extends Controller{

    public function login(){
  
        if (isset($_POST['enviar'])) {
        $dni = filter_input(INPUT_POST, 'dni');
        $model=new Account;
        $res_login=$model->getAccount($dni);

       if(!empty($res_login)){ // comprobamos si el usuario profesor || alumno || admin existe 

        // hacemos la comprobacion si el usuario es profesor
        if (isset($res_login['dni_profesor'])) {//Si la variable dni no está vacía
            $_SESSION['nombre'] = $res_login['nombre'];
            $_SESSION['email'] = $res_login['email'];
            $_SESSION['dni'] = $res_login['dni_profesor'];
            $_SESSION['tipo'] = $res_login['tipo'];
            $_SESSION['rol'] ="profesor";
            
            header("Location: views/profesor/ver.php");
          
          
        } else if (isset($res_login['dni_alumno'])){ // si el usuario existe y es alumno 
            if (isset($res_login['nombre'])) {
                $_SESSION['nombre'] = $res_login['nombre'];
            }else{
            $_SESSION['nombre'] = 'nombre';
        }
            $_SESSION['apellidos'] = $res_login['apellidos'];
            $_SESSION['email'] = $res_login['email'];
            $_SESSION['dni'] = $res_login['dni_alumno'];
            $_SESSION['tipo'] = $res_login['centro'];
            $_SESSION['rol'] = "alumno";
            header("Location: views/alumno/listar.php");
        }else { // si el usuario existe y es admin
            $_SESSION['nombre'] = $res_login['nombre'];
            $_SESSION['dni'] = $res_login['dni_admin'];
            $_SESSION['rol'] = $res_login['rol'];
            
            header("Location: views/admin/agregar.php");
        }
               
    
}else{
    $_SESSION['error'] = "No estás registrado";
    
}
        }

}
    public function inicio(){
        
    }
    public function mapa(){
       
       
    }

}
?>