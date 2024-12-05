<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;

// Definicion clase Juego extiende Soporte
class Juego extends Soporte {
    // ATRIBUTOS
    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    // CONSTRUCTOR
    public function __construct($titulo,$numero,$precio,$consola,$minNumJugadores,$maxNumJugadores){
        parent::__construct($titulo,$numero,$precio);   // Constructor clase "Padre"
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    /**
     * Función muestraJugadoresPosibles
     * Comprueba el número de jugadores de un Juego:
     *  - Un solo jugador
     *  - X jugadores
     *  - De X a Y jugadores 
     */
    public function muestraJugadoresPosibles(){
        if(($this->minNumJugadores == 1)&&($this->maxNumJugadores == 1)){
            echo "Para un Jugador<br>";
        } else if ($this->minNumJugadores == $this->maxNumJugadores){
            echo "Para ".$this->minNumJugadores." jugadores<br>";
        } else {
            echo "De ".$this->minNumJugadores." a ".$this->maxNumJugadores." jugadores<br>";
        }
    }

    /**
     * Función muestraResumen
     * Resumen: muestraResumen():"Padre + Consola + Numero Jugadores
     */
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Consola: ".$this->consola."<br>";
        $this->muestraJugadoresPosibles();
    }
}
?>