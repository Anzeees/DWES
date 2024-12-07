<?php 
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclub\VideoclubException;

class SoporteYaAlquiladoException extends VideoclubException {
    public function __construct($soporte){
        parent::setError("<br>El Soporte ".$soporte." ya está alquilado.<br>");
    }
}
?>