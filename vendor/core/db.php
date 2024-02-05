<?php
namespace vendor\core;

use PDO;
use Exception;
class Db{
 
    protected $pdo;
    protected static $instancia;

        protected function __construct(){
            $db = require WWW ."\\app\\bd\\config_bd.php";
            $this->pdo = new PDO($db['dsn'],$db['user'],$db['pass']);
        }

        public static function getInstancia(){//podemos lamarlo sin instanciar la clase
             if (self::$instancia === null) {// si no hay ninguna instancia de un objeto
                self::$instancia=new self;// creamos la instancia de este clase
                                            }
                        return self::$instancia;
         }

         public function ejecutar($sql){//método para la consulta de tipo inserción/create/update/delete table.por parámetro le pasamos la consulta 
             $stmt = $this->pdo->prepare($sql);
                        return $stmt->execute();//devuelve si ha tenido éxito la consulta(true o false)
         }

        public function consulta($sql){//método para la consulta de tipo SELECT
            $stmt = $this->pdo->prepare($sql);
            $res = $stmt->execute();
            if ($res) {//si hay datos 
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
           return [];//si $res=false, es decir no hay datos entonces devolvemos array vacío 


        }

        public function consultaTodo($sql){//método para la consulta de tipo SELECT *
            $stmt = $this->pdo->prepare($sql);
            $res = $stmt->execute();
            if ($res) {//si hay datos 
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
           return [];//si $res=false, es decir no hay datos entonces devolvemos array vacío 

        }
        public function ejecutarParametros($sql, $params){//método para la consulta de tipo inserción/create/update/delete table.por parámetro le pasamos la consulta 
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($params);//devuelve si ha tenido éxito la consulta(true o false)
        }
           public function modProfesor($dniActual, $dniNuevo){
            try {
                //--- inicio de la transacción
                $this->pdo->beginTransaction();
        
                // actualizamos la tabla Profesor
               // $sql = "UPDATE Profesor SET dni = :dniNuevo WHERE dni = :dniActual";
               // $this->ejecutarParametros($sql, ['dniNuevo' => $dniNuevo, 'dniActual' => $dniActual]);
        
                // actualizamos la tabla Horario
                $sql = "UPDATE Horario SET dni_profesor = :dniNuevo WHERE dni_profesor = :dniActual";
                $this->ejecutarParametros($sql, ['dniNuevo' => $dniNuevo, 'dniActual' => $dniActual]);
        
                // actualizamos la tabla Imparte
                $sql = "UPDATE Imparte SET dni_profesor = :dniNuevo WHERE dni_profesor = :dniActual";
                $this->ejecutarParametros($sql, ['dniNuevo' => $dniNuevo, 'dniActual' => $dniActual]);
        
                // actualizamos la tabla Asignatura
                $sql = "UPDATE Asignatura SET dni_profesor = :dniNuevo WHERE dni_profesor = :dniActual";
                $this->ejecutarParametros($sql, ['dniNuevo' => $dniNuevo, 'dniActual' => $dniActual]);
        
                // Si todo va bien, confirmar los cambios
                $this->pdo->commit();
            } catch (Exception $e) {
                // Si hay algún error, revertir los cambios
                $this->pdo->rollBack();
                throw $e;
            }
        }

}

?>