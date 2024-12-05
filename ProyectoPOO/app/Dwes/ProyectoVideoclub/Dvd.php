<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;

// Definicion clase Dvd extiende Soporte
class Dvd extends Soporte {
    // ATRIBUTOS
    public string $idiomas;
    private string $formatoPantalla;

    // CONSTRUCTOR
    public function __construct($titulo,$numero,$precio,$idiomas,$formatoPantalla){
        parent::__construct($titulo,$numero,$precio);   // // Constructor clase "Padre"
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    /**
     * Función muestraResumen
     * Resumen: muestraResumen():"Padre + Idiomas + Formato Pantalla
     */
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Idiomas: ".$this->idiomas."<br>";
        echo "Formato de Pantalla: ".$this->formatoPantalla."<br>";
    }
}
?>