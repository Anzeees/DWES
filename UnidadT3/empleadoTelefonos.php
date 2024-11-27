<?php
declare(strict_types=1);
class Empleado {
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getApellidos(){
        return $this->nombre;
    }

    public function setApellidos(string $apellidos){
        $this->apellidos = $apellidos;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo(string $sueldo){
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

    public function agregarTelefono(int $telefono):void {
        array_push($this->telefonos,$telefono);
    }

    public function obtenerTelefonos():string{
        $cadenaTelefonos='';
        for ($i=0;$i<$count($this->telefonos);$i++){
            $cadenaTelefonos = $cadenaTelefonos.' '.$this->telefonos[$i];
        }
        return $cadenaTelefonos;
    }

    public function eliminarTelefonos():void{
        unset($this->telefonos);
    }
}
?>