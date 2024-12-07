<?php 
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclubVideoclubException;

class SoporteYaAlquiladoException extends VideoclubException {
    public function __construct($soporte){
        parent::setError("<p style='color:red;'>El Soporte ".$soporte." ya está alquilado.<p>");
    }
}
?>