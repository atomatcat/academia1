<?php


define('WWW',__DIR__);// La C:\xampp\htdocs\app
define('CORE',dirname(__DIR__) . 'vendor/core');
define('ROOT',dirname(__DIR__) . '\\app');
define('APP',__DIR__ . '\\app\\views');

require 'vendor/core/Router1.php';
require 'vendor/libs/funcion.php';

require 'app/models/Model.php';
require 'app/models/Account.php';
require 'app/models/Informacion.php';
require 'app/models/Alumno.php';
require 'app/models/Profesor.php';
require 'app/models/Recurso.php';
////////////////////
require 'app/models/Admin.php';
/////////////////////
spl_autoload_register(function($class){
  
     $file = WWW . "\\".$class.".php";
    
     if (is_file($file)) { 
      require_once $file;
     }
});

 //Router1::aniadir();
$rut=new Router1();
$rut::run();
?>
