<?php
    //Incluyo el archivo header y el de conexión a la base de datos.
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";

    //Inicio la sesión.
    session_start();

    //Creo una consulta para mostrar todos los productos registrados en mi base de datos.
    $consulta = "select * from productos";

    //Ejecuto la consulta.
    $guardar = $conn->query($consulta);
?>
<div class="administracionbbdd">
    <div class="menu-vertical">
        <ul>
            <li><a href="productosadmin.php">Productos</a></li>
            <li><a href="pedidosadmin.php">Pedidos</a></li>
            <li><a href="cerrarsesionadmin.php">Cerrar sesión</a></li>  
        </ul>    
        <div class="table-container">
        <table class="tablaproductosadmin">
            <tbody>
                <tr style="background-color: #00D561;">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>STOCK</th>
                    <th>IMAGEN</th>
                    <th>PRECIO</th>
                    <th>FECHA CREACIÓN</th>
                    <th>FECHA MODIFICACIÓN</th>
                    <th colspan="2" style="text-align: center;">ACCIONES</th>
                </tr>
                <?php
                    while($fila = $guardar->fetch_assoc()){
                ?> 
                <tr>
                    <td><?php echo $fila['id'];?></td>
                    <td><?php echo $fila['nombre'];?></td>
                    <td><?php echo $fila['descripcion'];?></td>
                    <td><?php echo $fila['stock'];?></td>
                    <td>
                        <?php 
                            $id = $fila['id'];
                            $imagen = "imagenes/productos/" . $id . "/coche.png";
                        ?>
                        <img src="<?php echo $imagen; ?>" alt="" class="imagenproductosadmin">
                    </td>
                    <td><?php echo $fila['precio'];?> €</td>
                    <td><?php echo $fila['fecha_creacion'];?></td>
                    <td><?php echo $fila['fecha_modificacion'];?></td>
                    <td style="background-color: orange;"><?php echo "<a style='color: white; font-weight: bold; font-size: 20px' href='eliminarproductoadmin.php?id=".$fila['id']."'>Eliminar</a>";?></td>
                    <td style="background-color: orange;"><?php echo "<a style='color: white; font-weight: bold; font-size: 20px' href='editarproductoadmin.php?id=".$fila['id']."'>Editar</a>";?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <form action="agregarproductoadmin.php" method="post">
            <input type="submit" value="Agregar nuevo producto" name="crearproducto" style="background-color: #19171A; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; border: 2px solid #E8BE00;">
        </form>
    </div>   
    </div>
</div>
<?php
    include "footer.php";
?>