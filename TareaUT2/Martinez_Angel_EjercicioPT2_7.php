<!-- Martínez_Ángel_EjercicioPT2_7 -->
<?php
// Definición de función
function concatenarTexto(...$textos){
    // Une todos los elementos de $textos con un espacio entre ellos
    return implode(' ',$textos);
}

echo concatenarTexto('Hola','Soy','Angel');
echo '<br>';
echo concatenarTexto('tengo','21');
?>