<!-- Martínez_Ángel_EjercicioPT2_13 -->
<?php
$cadena = 'Bienvenidos a la clase de PHP';
echo 'Cadena con trim: '.trim($cadena);
echo '<br>Cadena con strtolower: '.strtolower($cadena);
echo '<br>Cadena con strtoupper: '.strtoupper($cadena);
echo '<br>Cadena con str_replace: '.str_replace('clase','curso',$cadena);
echo '<br>Cadena con str_pad: '.str_pad($cadena, 40,'*');
?>