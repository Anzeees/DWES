<?php
// Definimos Namespace
namespace app\Dwes\ProyectoVideoclub;

use app\Dwes\ProyectoVideoclub\SoporteNoEncontradoException;
// Definicion clase Cliente
class Cliente {
    // ATRIBUTOS
    public string $nombre;
    private int $numero;
    private $soportesAlquilados = [];
    private int $numSoportesAlquilados = 0;
    private int $maxAlquilerConcurrente;

    // CONSTRUCTOR
    public function __construct($nombre,$numero,$maxAlquilerConcurrente = 3){
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }
    
    // GETTERS Y SETTERS
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(){
        return count($this->soportesAlquilados);
    }

    public function getSoportesAlquilados(){
        return $this->soportesAlquilados;
    }
    /**
     * Función tieneAlquilado
     * Comprueba si un cliente tiene alquilado un Soporte
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
     * Su función es comprobar si:
     *  - El Cliente tiene alquilado un Soporte
     *  - El Cliente puede alquilar más Soportes
     *  - Alquiler de un Soporte por el Cliente
     */
    public function alquilar(Soporte $s) {
        if((!$this->tieneAlquilado($s))&&($this->numSoportesAlquilados<$this->maxAlquilerConcurrente)&&(!$s->alquilado)){
            array_push($this->soportesAlquilados,$s);
            $this->numSoportesAlquilados++;
            echo "<br>Alquiler ".$s->titulo. " ACEPTADO para ".$this->nombre;
            $s->alquilado=true;
        } else if(($this->tieneAlquilado($s))||($s->alquilado)){
            throw new SoporteYaAlquiladoException($s->titulo);
            // echo "<br>El usuario ".$this->nombre." ya tiene ".$s->titulo." alquilado";
        } else if($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente){
            throw new CupoSuperadoException();
            // echo "<br>El usuario ".$this->nombre." no puede hacer más alquileres";
        }
        return $this;
    }

    /**
     * Función devolver
     * Comprueba si el Cliente tiene en alquiler el Soporte
     *  - Sí: Lo devuelve
     *  - No: Indica que no tiene ese Soporte alquilado
     */
    public function devolver(int $numSoporte) {
        $id = 0;
        foreach($this->soportesAlquilados as $soporte){
            if ($soporte->getNumero() == $numSoporte){
                unset($this->soportesAlquilados[$id]);
                $this->numSoportesAlquilados=count($this->soportesAlquilados);
                echo "<br>El producto con numero ".$numSoporte." ha sido eliminado de la lista de alquileres";
                return true;
            }
            $id++;
        }
        echo "<br>En la lista de alquileres del cliente: ".$this->nombre." no se ha encontrado este Soporte";
        return false;
    }

    // Función Lista los Soportes alquilados por el Cliente
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
     * Resumen: Nombre + Alquileres Cliente
     */
    public function muestraResumen(){
        echo "--------------------------------------------<br>";
        echo "<strong>Nombre: ".$this->nombre."</strong><br>";
        echo "Cantidad de Alquileres: ".count($this->soportesAlquilados)."<br>";
    }
}
?>