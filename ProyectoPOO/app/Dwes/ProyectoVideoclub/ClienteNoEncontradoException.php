<?php
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclub\VideoclubException;

class ClienteNoEncontradoException extends VideoclubException {
    public function __construct($cliente){
        parent::setError("<br>El Cliente '".$cliente."' no está registrado.<br>");
    }
}
?>