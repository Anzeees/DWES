<!-- Martínez_Ángel_EjercicioPT2_4 -->
<?php
// Definición de la función y parámetros
function calcularPrecioFinal($pBase,$iva=21,$descuento=0){
    $pconDescuento = $pBase - ($pBase*$descuento/100);
    $pFinal = $pconDescuento + ($pconDescuento*$iva/100);
    return $pFinal;
}

$precio = 100;
$pFinal = calcularPrecioFinal($precio);
// Salida por pantalla
echo 'El precio final del producto es: '.$pFinal;
?>