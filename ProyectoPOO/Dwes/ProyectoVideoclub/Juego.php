<?php
// Definimos el namespace
namespace Dwes\ProyectoVideoclub;
// Incluimos la clase Soporte
include_once "Soporte.php";
// Clase Juego que extiende Soporte
class Juego extends Soporte {
    // Atributos
    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    // Constructor
    public function __construct($titulo,$numero,$precio,$consola,$minNumJugadores,$maxNumJugadores){
        parent::__construct($titulo,$numero,$precio);   // Llama al constructor de la clase "Padre"
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    /**
     * Función muestraJugadoresPosible
     * Indica el número de jugadores que pueden jugar a un juego
     */
    public function muestraJugadoresPosibles(){
        if(($this->minNumJugadores == 1)&&($this->maxNumJugadores == 1)){
            echo "Para un Jugador<br>"; // Si es un solo juegor
        } else if ($this->minNumJugadores == $this->maxNumJugadores){
            echo "Para ".$this->minNumJugadores." jugadores<br>"; // Si es solo para un número concreto de jugadores
        } else {
            echo "De ".$this->minNumJugadores." a ".$this->maxNumJugadores." jugadores<br>"; // Si el juego es para un rango de jugadores
        }
    }

    /**
     * Función muestra Resumen
     * Resumen: muestraResumen():Padre y Número de Jugadores
     */
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Consola: ".$this->consola."<br>";
        $this->muestraJugadoresPosibles();
    }
}
?>