<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;
// Incluimos Clases/Interfaces
include_once "Soporte.php";
// include_once "..\autoload.php";

// Definición clase CintaVideo extiende Soporte
class CintaVideo extends Soporte {
    // ATRIBUTOS
    private int $duracion;

    // CONSTRUCTOR
    public function __construct($titulo,$numero,$precio,$duracion){
        parent::__construct($titulo,$numero,$precio);   // Constructor clase "Padre"
        $this->duracion = $duracion;
    }

    /**
     * Función muestraResumen
     * Resumen: muestraResumen():"Padre + Duración
     */
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Duración: ".$this->duracion." minutos<br>";
    }
}
?>