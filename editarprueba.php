<?php
include "header.php";
include "conexionbbdd/conexionbbdd.php";

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar el formulario de edición
        $nuevo_nombre = $_POST['nombre'];
        $nueva_descripcion = $_POST['descripcion'];
        $nuevo_stock = $_POST['stock'];
        $nuevo_precio = $_POST['precio'];

        $actualizar_producto = "UPDATE productos SET nombre='$nuevo_nombre', descripcion='$nueva_descripcion', stock=$nuevo_stock, precio=$nuevo_precio WHERE id=$producto_id";

        if ($conn->query($actualizar_producto) === TRUE) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . $conn->error;
        }
    }

    // Consultar la información del producto
    $consulta_producto = "SELECT * FROM productos WHERE id = $producto_id";
    $resultado_producto = $conn->query($consulta_producto);

    if ($resultado_producto->num_rows == 1) {
        $producto = $resultado_producto->fetch_assoc();
?>
        <!-- Formulario de edición -->
        <form action="" method="post">
            <label for="nuevo_nombre">Nuevo Nombre:</label>
            <input type="text" name="nuevo_nombre" value="<?php echo $producto['nombre']; ?>"><br>

            <label for="nueva_descripcion">Nueva Descripción:</label>
            <textarea name="nueva_descripcion"><?php echo $producto['descripcion']; ?></textarea><br>

            <label for="nuevo_stock">Nuevo Stock:</label>
            <input type="number" name="nuevo_stock" value="<?php echo $producto['stock']; ?>"><br>

            <label for="nuevo_precio">Nuevo Precio:</label>
            <input type="text" name="nuevo_precio" value="<?php echo $producto['precio']; ?>"><br>

            <input type="submit" value="Guardar cambios" name="editar_producto">
        </form>
<?php
    } else {
        echo "No se encontró el producto.";
    }
} else {
    echo "ID de producto no válido.";
}

include "footer.php";
?>
