<?php
    include "conexionbbdd/conexionbbdd.php";
    session_start();

    //Verifico si la sesión del carrito existe, si no la crea
    if(!isset($_SESSION['agregarcarrito'])){
        $_SESSION['agregarcarrito'] = array();
    }

    //Verifico si se ha enviado un formulario de compra
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Recupero la información del producto desde el formulario
        $id = $_POST['id'];
        $imagen = $_POST['imagen'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];

        //Agrego el producto al carrito
        $item = array('id' => $id, 'imagen' => $imagen, 'nombre' => $nombre, 'precio' => $precio);
        array_push($_SESSION['agregarcarrito'], $item);

        //Redirijo al usuario de vuelta a la pagina principal
        header('Location: principal.php');
        exit();
    }
?>
<?php
    include "header.php";
?>
<div class="compracarrito">
    <h1>Mi carrito de la compra</h1>
    <table class="tablacarrito">
        <?php
            // Guardo el listado de ids
            $listadoId = array();

            //Inicio la variable total
            $total = 0;

            //Muestro los productos en el carrito
            foreach($_SESSION['agregarcarrito'] as $indice => $item){
                echo "<tr>";
                    echo "<td><img src='{$item['imagen']}' class='imgcarrito'></td>";
                    echo "<td>{$item['nombre']}</td>";
                    echo "<td>{$item['precio']} €</td>";
                    echo "<td style='background-color: orange;'>";
                    echo "<form action='eliminarproductocarrito.php' method='post'>";
                    echo "<input type='hidden' name='indice' value='$indice'>";
                    echo "<input type='submit' name='eliminar' value='Eliminar' class='botoneliminar'>";
                    echo "</form>";
                    echo "</td>";
                echo "</tr>";

                //Sumo el precio al total
                $total += $item['precio'];

                //Añado el ID al listado que luego enviare
                $listadoId[] = $item['id'];
            }
            echo "<tr>";
            echo "<td colspan='4' style='text-align: center; padding: 15px; background-color: #00D561; font-weight: bold;'>
            TOTAL: $total €</td>";
            echo "</tr>";
        ?>   
    </table>
    <div class="formcontainer">
    <form action="vaciarcarrito.php" method="post" class="formvaciar">
        <input type="submit" name="vaciar" value="Vaciar">
    </form>
<?php
    $listadoEnviar = implode('-',$listadoId);
?>
    <form action="sesion_cliente.php" method="post" class="formcomprar">
        <input type="hidden" name="carro_id" value="<?php echo $listadoEnviar;?>">
        <input type="hidden" name="carro_total" value="<?php echo $total;?>">
        <input type="submit" name="comprar" value="Comprar">
    </form>
    </div>
</div>
<style>
    .compracarrito {
        background-color: #ccc;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-bottom: 20px;
    }
    .formcontainer {
        display: flex;
        margin: 40px;
    }
    .tablacarrito td {
        padding-left: 30px;
        padding-right: 30px;
    }
    .formvaciar, 
    .formcomprar {
        margin-right: 30px;
    }
    .formvaciar input {
        color: white;
        padding: 15px 32px;
        text-align: center;
        background-color: #19171A;
        border: 2px solid red;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
        font-size: 15px;
    }
    .formcomprar input {
        color: white;
        padding: 15px 28px;
        text-align: center;
        background-color: #19171A;
        border: 2px solid #81DC0D;
        font-weight: bold;
        cursor: pointer;
        border-radius: 4px;
        font-size: 15px;
    }
    .botoneliminar {
        border: none;
        background-color: orange;
        text-decoration: none;
        color: white;
        font-weight: bold;
        cursor: pointer;
        font-size: 15px;
    }
    .imgcarrito {
        height: 100px;
        width: 200px;
    }
</style>
<?php
    include "footer.php";
?>