<?php 
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclub\VideoclubException;

class CupoSuperadoException extends VideoclubException {
    public function __construct(){
        parent::setError("<br>Has superado el cupo de alquileres.<br>");
    }
}
?>