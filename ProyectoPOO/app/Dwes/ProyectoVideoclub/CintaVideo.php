<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;

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