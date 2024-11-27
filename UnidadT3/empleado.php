<?php
declare(strict_types=1);
class Empleado {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellidos(){
        return $this->nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;
    }

    public function obtenerNombreCompleto():string{
        $nombreCompleto = $this->nombre.' '.$this->apellidos;
        return $nombreCompleto;
    }

    public function debePagarImpuestos():bool{
        if($this->sueldo > 3000){
            return true;
        } else {
            return false;
        }
    }
}
?>