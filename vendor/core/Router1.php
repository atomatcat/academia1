<?php


class Router1 {
    protected static $tabla_rutas = [];
    protected static $ruta = [];//la ruta actual

public function __construct()
{
    $arr = require 'vendor/libs/rutas.php';
    foreach ($arr as $key => $value) {
       $this->aniadir($key,$value);   
    }
}
public static function aniadir($cadena,$ruta=[]){// reenamos array de rutas
    
     self::$tabla_rutas[$cadena]=$ruta;
}

public static function verRutas(){
    return self::$tabla_rutas;
}
public static function veruta(){
    return self::$ruta;
}

public static function buscaruta(){
    $url = trim($_SERVER['REQUEST_URI'], "/");
    $parts = parse_url($url);
    $path = explode("/", $parts["path"]);
    // eliminamos los primeros segmentos de la ruta que corresponden a /app/app/index.php
$path = array_slice($path, 3);

$url_sin_index_php = implode("/", $path);
foreach(self::$tabla_rutas as $pattern => $ruta) {
    if(preg_match("#$pattern#", $url_sin_index_php, $matches)){
        self::$ruta = $ruta;
       
       
        return true;  
    }
}

return false;
    
}

public static function run(){
   
    if (self::buscaruta()) {
        $controller=self::$ruta['controller'];
        
            $patch_controller='app\\controllers\\'.ucfirst($controller).'Controller';
        
        
        if (class_exists($patch_controller)) {
           
            $clase_obj=new $patch_controller(self::$ruta);//creamos el objeto xxxController y le pasamos por parámetro carpeta y vista
            $action=self::$ruta['action'];
 
            if (method_exists($patch_controller,$action)) {
                $clase_obj->$action();
                $clase_obj->getView();
               // echo "MÉTODO  existe".$action;
            }else{
               // echo "MÉTODO NO existe".$action;
            }
        } else {
           // echo "controlador NO existe".$patch_controller;
        }
        
// echo "accion: ".self::$ruta['action']."<br>";

    }else{
       include 'public/error-404.html';
    }
}
}


?>