<!-- Martínez_Ángel_EjercicioPT2_8 -->
<?php
function calcularPrecioFinal($precioInicial, $iva, $descuento = 0, $envio = 0) {
    // Calcular el precio con descuento
    $precioDescuento = $precioInicial - ($precioInicial * ($descuento / 100));
    // Calcular el precio con IVA
    $precioIva = $precioDescuento + ($precioDescuento * ($iva / 100));
    // Sumar el costo de envío
    $precioFinal = $precioIva + $envio;
    return $precioFinal;
}
// Llamada a la función con argumentos con nombre
echo calcularPrecioFinal(100,14,descuento:5,envio:4.99);
?>