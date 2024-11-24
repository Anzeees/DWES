<!-- Martínez_Ángel_EjercicioPT2_17 -->
<?php
$cadenaNumero='123.45abs';
$entero=intval($cadenaNumero);
$decimal=floatval($cadenaNumero);
$cadena=strval($decimal);
echo 'La cadena de tipo '.gettype($entero).': '.$entero;
echo '<br>La cadena de tipo '.gettype($decimal).': '.$decimal;
echo '<br>La cadena de tipo '.gettype($cadena).': '.$cadena;
?>