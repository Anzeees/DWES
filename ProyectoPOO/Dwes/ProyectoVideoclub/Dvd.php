<?php
// Definimos el namespace
namespace Dwes\ProyectoVideoclub;
// Incluimos la clase Soporte
include_once "Soporte.php";
// Clase Dvd que extiende Soporte
class Dvd extends Soporte {
    // Atributos
    public string $idiomas;
    private string $formatoPantalla;
    // Constructor
    public function __construct($titulo,$numero,$precio,$idiomas,$formatoPantalla){
        parent::__construct($titulo,$numero,$precio);   // Llama al constructor de la clase "Padre"
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    /**
     * Función muestraResumen
     * Resumen: muestraResumen():Padre y Formato de Pantalla
     */
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Idiomas: ".$this->idiomas."<br>"; // Llama al método de la clase "Padre"
        echo "Formato de Pantalla: ".$this->formatoPantalla."<br>";
    }
}
?>