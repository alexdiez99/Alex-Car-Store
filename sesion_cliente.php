<?php 
    include "header.php";

    //Inicio la sesión.
    session_start();

    // Recupero el listado de ID y el precio
    $listadoEnviar = $_REQUEST['carro_id'];
    $total = $_REQUEST['carro_total'];

    //Verifico si se ha enviado el formulario de inicio de sesión.
    if(isset($_POST['entrar'])){
        //Incluyo el archivo de conexión a la base de datos.
        include "conexionbbdd/conexionbbdd.php";

        //Obtengo y escapo los datos del formulario de inicio de sesión.
        $ruser = $conn->real_escape_string($_POST['usuario_cliente']);
        $rpass = $conn->real_escape_string($_POST['contra_cliente']);

        //Consulto la base de datos para el usuario cliente.
        $consulta = "SELECT * FROM usuarios WHERE usuario = '$ruser' AND contraseña = '$rpass' AND tipo_usuario = 'cliente'";

        if($resultado = $conn->query($consulta)){
            //Verifico si se econtraron resultados.
            if($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_array()){
                    $userok = $fila['usuario'];
                    $passwordok = $fila['contraseña'];
                    $idUsuario = $fila['id'];
                }
                $resultado->close();
            
            //Verifico si los datos coinciden.
            if(isset($ruser) && isset($rpass)){
                if($ruser == $userok && $rpass == $passwordok){
                    //Inicio sesón y obtengo información adicional del formulario 
                    $_SESSION['login'] = true;
                    $_SESSION['usuario'] = $ruser;

                    //Obtengo la fecha actual.
                    $fechaPedido = date('Y-m-d');

                    //Estdo predeterminado al realizar el pedido.
                    $estadoPedido = 'En preparación';

                    //Recupero el total y la id del producto desde el formulario.
                    $idProducto = $_POST['carro_id'];
                    $total = $_POST['carro_total'];

                    //Creo una consulta para insertar el pedido en la tabla pedidos.
                    $consultaPedido = "INSERT INTO pedidos (usuario_id, producto_id, fecha_pedido, total, estado) 
                    VALUES ('$idUsuario', '$idProducto', '$fechaPedido', '$total', '$estadoPedido')";

                    //Ejecuto la consulta.
                    $resultado = mysqli_query($conn, $consultaPedido);

                    //Compruebo de la insercción mediante un mensaje.
                    if($resultado){
                        echo "<script language='JavaScript'>alert('Enhorabuena, tu pedido se ha realizdo correctamente.'); location.assign('principal.php'); </script>";
                    } else {
                        echo "<script language='JavaScript'>alert('Hubo un error, vuelve a intentarlo.'); location.assign('principal.php'); </script>";
                    }

                    //Limpio el carrito después de realizar la compra.
                    unset($_SESSION['agregarcarrito']);
                  
                } 
            }
        }
    }

    //Cierro la conexión a la base de datos.
    $conn->close();
}
?>
<div class="cliente">
        <h2>Iniciar sesión</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form_cliente" method="post">
            <input type="text" name="usuario_cliente" placeholder="Usuario"><br>
            <input type="password" name="contra_cliente" placeholder="Contraseña"><br>
            <input type="hidden" name="carro_id" value="<?php echo $listadoEnviar;?>">
            <input type="hidden" name="carro_total" value="<?php echo $total;?>">
            <button type="submit" name="entrar" style="color: white; text-align: center; background-color: #19171A; border: 2px solid #E8BE00;
            font-weight: bold; cursor: pointer; border-radius: 4px; font-size: 15px; padding: 10px 28px;">Acceder</button>
        </form>
    </div>
<?php
    include "footer.php";
?>