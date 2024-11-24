<!-- Martínez_Ángel_EjercicioPT2_15 -->
<?php
$cadena1='PHP,JavaScript,Python,Java,C++';
$arrayLenguajes = explode(',',$cadena1);
foreach($arrayLenguajes as $lenguaje){
    echo $lenguaje;
}
echo '<br>';
echo count($arrayLenguajes);
echo '<br>';
$cadenaLenguajes = implode('-',$arrayLenguajes);
echo $cadenaLenguajes;
?>