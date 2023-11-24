<?php
    //Incluyo el archivo header y el de conexión a la base de datos.
    include "header.php";
    include 'conexionbbdd/conexionbbdd.php';

    //Inicio la sesión.
    session_start();
    
    //Creo una consulta para mostrar todos los productos disponibles de mi base de datos.
    $consulta = "select * from productos";

    //Ejecuto la consulta.
    $guardar = $conn->query($consulta);
?>
    <div class="producto_disponible">
        <table>
        <tbody>
            <?php
                while($fila = $guardar->fetch_assoc()){
            ?> 
            <tr>
                <th rowspan="3">
                    <?php 
                    //Construyo la ruta de la imágen del producto.
                        $id = $fila['id'];
                        $imagen = "imagenes/productos/" . $id . "/coche.png";
                    ?>
                    <img src="<?php echo $imagen; ?>" alt="">
                </th>
                <td class="nombre_producto"><?php echo $fila['nombre'];?></td>
            </tr>
            <tr>
                <td><?php echo $fila['descripcion'];?></td>
            </tr>
            <tr class="comprar" style="background-color: #19171A;">
                <td>
                    <form action="agregarcarrito.php" method="post">
                        <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">
                        <input type="hidden" name="id" value="<?php echo $fila['id'];?>">
                        <input type="hidden" name="nombre" value="<?php echo $fila['nombre'];?>">
                        <input type="hidden" name="precio" value="<?php echo $fila['precio'];?>">
                        <button style="background-color: #19171A; color: white; border: none; text-decoration: none; 
                        cursor: pointer; font-weight: bold;" type="submit">Comprar <?php echo $fila['precio'];?> €</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
<?php
    include "footer.php";
?>