<?php
$anonac = $_POST["anonac"];
$anoactual=date("Y");
$edad = $anoactual - $anonac;
echo '<h3> Hola '.$_POST["nombre"].'<h3>';
echo 'Tienes '.$edad.' años';
?>