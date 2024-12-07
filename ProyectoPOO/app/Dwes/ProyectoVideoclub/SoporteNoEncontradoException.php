<?php
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclub\VideoclubException;

class SoporteNoEncontradoException extends VideoclubException {
    public function __construct($soporte){
        parent::setError("<br>El Soporte '".$soporte."' no existe.<br>");
    }
}
?>