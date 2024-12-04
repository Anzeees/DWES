<?php
namespace Dwes\ProyectoVideoclub;
require_once "Soporte.php";
class Dvd extends Soporte {
    public string $idiomas;
    private string $formatoPantalla;

    public function __construct($titulo,$numero,$precio,$idiomas,$formatoPantalla){
        parent::__construct($titulo,$numero,$precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(){
        parent::muestraResumen();
        echo "Idiomas: ".$this->idiomas."<br>";
        echo "Formato de Pantalla: ".$this->formatoPantalla."<br>";
    }
}
?>