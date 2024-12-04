<?php
namespace Dwes\ProyectoVideoclub;
include_once "Resumible.php";
abstract class Soporte implements Resumible{
    public string $titulo;
    protected int $numero;
    private float $precio;
    private static $IVA = 21;

    public function __construct($titulo,$numero,$precio){
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getPrecioConIva(){
        return $this->precio + ($this->precio * (self::$IVA/100));
    }

    public function getNumero(){
        return $this->numero;
    }

    public function muestraResumen(){
        echo "<br>------------------------------------------------<br>";
        echo "<strong>Título: ".$this->titulo."</strong><br>";
        echo "Número: ".$this->getNumero()."<br>";
        echo "Precio sin IVA: ".$this->getPrecio()." €<br>";
        echo "Precio con IVA: ".$this->getPrecioConIva()." €<br>";
        echo "IVA: ".self::$IVA."%<br>";
    }
}
?>