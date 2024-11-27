<!-- Martínez_Ángel_EjercicioPT2_18 -->
<?php
$cadenaHTML='<p>Bienvenido al <strong>curso de PHP</strong>!</p>';
echo 'Cadena con Entities: '.htmlentities($cadenaHTML);
echo '<br>Cadena con SpecialChars: '.htmlspecialchars($cadenaHTML);
echo '<br>Cadena sin Etiquetas: '.strip_tags($cadenaHTML);
?>