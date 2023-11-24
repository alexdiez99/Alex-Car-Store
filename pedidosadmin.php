<?php
    //Incluyo el archivo header y el de conexión a la base de datos.
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";
?>
<?php
    //Creo una consulta para ver todos los pedidos de la base de datos.
    $consulta = "select * from pedidos";
    
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
                    <th>ID USUARIO</th>
                    <th>ID PRODUCTO</th>
                    <th>FECHA PEDIDO</th>
                    <th>TOTAL</th>
                    <th>ESTADO</th>
                </tr>
                <?php
                    while($fila = $guardar->fetch_assoc()){
                ?> 
                <tr>
                    <td><?php echo $fila['id'];?></td>
                    <td><?php echo $fila['usuario_id'];?></td>
                    <td><?php echo $fila['producto_id'];?></td>
                    <td><?php echo $fila['fecha_pedido'];?></td>
                    <td><?php echo $fila['total'];?></td>
                    <td><?php echo $fila['estado'];?> €</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>   
    </div>
</div>
<?php
    //Cierro la conexión a la base de datos.
    $conn->close();
    include "footer.php";
?>