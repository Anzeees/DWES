<?php 
namespace app\Dwes\ProyectoVideoclub;

use \Exception;

class VideoclubException extends Exception {
    private string $mensaje="";

    public function getError(){
        return $this->mensaje;   
    }

    public function setError($mensaje){
        $this->mensaje = $mensaje;
    }
};
?>