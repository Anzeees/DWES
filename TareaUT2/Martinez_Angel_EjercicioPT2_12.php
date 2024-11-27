<!-- Martínez_Ángel_EjercicioPT2_12 -->
<?php
// Inventario inicial
$GLOBALS['inventario'] = array(
    array(
        'nombre' => 'Zapatillas',
        'cantidad' => 23,
        'precio' => 33.5
    ),
    array(
        'nombre' => 'Camisa',
        'cantidad' => 11,
        'precio' => 45
    ),
    array(
        'nombre' => 'Pantalones',
        'cantidad' => 54,
        'precio' => 15.3
    )
);
// Agregar un nuevo producto
function agregarProducto($nombre, $cantidad, $precio) {
    $nuevoProducto = array('nombre' => $nombre, 'cantidad' => $cantidad, 'precio' => $precio);
    $GLOBALS['inventario'][] = $nuevoProducto;
}
// Actualizar la cantidad de un producto
function actualizarCantidad($nombre, $nuevaCantidad) {
    foreach($GLOBALS['inventario'] as &$producto) {
        if ($producto['nombre'] == $nombre) {
            $producto['cantidad'] = $nuevaCantidad;
        }
    }
}
// Mostrar inventario
function mostrarInventario() {
    foreach($GLOBALS['inventario'] as $producto) {
        echo '<br>Nombre: ' . $producto['nombre'] . '<br>';
        echo 'Cantidad: ' . $producto['cantidad'] . '<br>';
        echo 'Precio: ' . $producto['precio'] . '<br>';
        echo '-------------------------------------';
    }
}
echo '<h3>Inventario Inicial</h3>';
mostrarInventario();

// Agregar producto y actualizar cantidad
agregarProducto('Calcetines', 25, 3.5);
actualizarCantidad('Camisa', 44);

echo '<h3>Inventario Final</h3>';
mostrarInventario();
?>