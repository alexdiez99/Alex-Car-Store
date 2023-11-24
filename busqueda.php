<?php
    //Incluyo el archivo de header.
    include "header.php";
?>
<?php
    //Incluyo el archivo de conexión a la base de datos.
    include "conexionbbdd/conexionbbdd.php";

    //Verifico si se ha enviado el formulario de búsqueda.
    if(isset($_GET['enviar'])) {
        //Obtengo el término de busqueda.
        $busqueda = $_GET['busqueda'];

        //Realizo una consulta a la base de datos utilizando el término de búsqueda.
        $consultaproductos = "SELECT * FROM productos WHERE imagen LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR precio LIKE '%$busqueda%'";
        
        //Ejecuto la consulta.
        $resultadoproductos = $conn->query($consultaproductos);
    }
?>
<div class="producto_disponible">
    <table>
        <tbody>
            <?php
                while($fila = $resultadoproductos->fetch_assoc()){
            ?> 
            <tr>
                <th rowspan="3">
                    <?php 
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
                <td><a href="">Comprar <?php echo $fila['precio'];?> €</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
    include "footer.php";
?>