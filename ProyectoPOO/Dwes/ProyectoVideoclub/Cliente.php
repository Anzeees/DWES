<?php
// Definimos el namespace
namespace Dwes\ProyectoVideoclub;
// Clase Cliente
class Cliente {
    // Atributos
    public string $nombre;
    private int $numero;
    private $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    private int $maxAlquilerConcurrente;

    // Constructor
    public function __construct($nombre,$numero,$maxAlquilerConcurrente = 3){
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    // Getters / Setters
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(){
        return count($this->soportesAlquilados);
    }

    /**
     * Función tieneAlquilado
     * Comprobamos si un Cliente ya tiene alquilado un Soporte
     */
    public function tieneAlquilado(Soporte $s):bool{
        foreach($this->soportesAlquilados as $soporte){
            if ($soporte->getNumero() == $s->getNumero()){
                return true;
            }
        }
        return false;
    }

    /**
     * Función alquilar
     * Alquila un Soporte si no está alquilado y el Cliente no ha alcanzado el limite
     */
    public function alquilar(Soporte $s) {
        if((!$this->tieneAlquilado($s))&&($this->numSoportesAlquilados<$this->maxAlquilerConcurrente)){
            array_push($this->soportesAlquilados,$s);
            $this->numSoportesAlquilados++;
            echo "<br>Alquiler ".$s->titulo. " ACEPTADO para ".$this->nombre;
        } else if($this->tieneAlquilado($s)){
            echo "<br>El usuario ".$this->nombre." ya tiene ".$s->titulo." alquilado";
        } else if($this->numSoportesAlquilados > $this->maxAlquilerConcurrente){
            echo "<br>El usuario ".$this->nombre." no puede hacer más alquileres";
        }
        return $this;
    }

    /**
     * Función devolver
     * Devuelve un Soporte si el Cliente lo tiene alquilado
     */
    public function devolver(int $numSoporte):bool {
        foreach($this->soportesAlquilados as $id => $soporte){
            if ($id == $numSoporte-1){
                unset($this->soportesAlquilados[$id]);
                $this->numSoportesAlquilados=count($this->soportesAlquilados);
                echo "<br>El producto con numero ".$numSoporte." ha sido eliminado de la lista de alquiles";
                return true;
            }
        }
        echo "<br>En la lista de alquileres del cliente: ".$this->nombre." no se ha encontrado este Soporte";
        return false;
    }

    /**
     * Función listaAlquileres
     * Muestra la lista de Soportes que tiene alquilados un Cliente
     */
    public function listaAlquileres():void{
        if ($this->numSoportesAlquilados > 0){
            echo "<br>El usuario: ".$this->nombre." tiene alquilados ".$this->numSoportesAlquilados." soportes";
            echo "<br><strong>La lista de Soportes alquilados son:</strong>";
            foreach($this->soportesAlquilados as $soporte){
                echo "<br>".$soporte->muestraResumen();
            }
        } else {
            echo "<br>El usuario: ".$this->nombre." tiene alquilados ".$this->numSoportesAlquilados." soportes";
        }
    }

    /**
     * Función muestraResumen
     * Resumen: Nombre Cliente y Número de Soportes alquilados
     */
    public function muestraResumen(){
        echo "--------------------------------------------<br>";
        echo "<strong>Nombre: ".$this->nombre."<strong><br>";
        echo "Cantidad de Alquileres: ".count($this->soportesAlquilados)."<br>";
    }
}
?>