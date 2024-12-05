<?php
// Definimos el namespace
namespace Dwes\ProyectoVideoclub;
// Incluimos la clase Soporte
include_once "Soporte.php";
// Clase CintaVideo que extiende Soporte
class CintaVideo extends Soporte {
    // Atributos
    private int $duracion;
    
    // Constructor
    public function __construct($titulo,$numero,$precio,$duracion){
        parent::__construct($titulo,$numero,$precio);   // Llama al constructor de la clase "Padre"
        $this->duracion = $duracion;
    }

    /**
     * Función muestraResumen
     * Resumen: muestraResumen():Padre y Duración
     */
    public function muestraResumen(){
        parent::muestraResumen();   // Llama al método de la clase "Padre"
        echo "Duración: ".$this->duracion." minutos<br>";
    }
}
?>