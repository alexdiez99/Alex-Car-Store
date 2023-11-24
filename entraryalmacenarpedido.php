<?php
    //Inicio la sesión.
    session_start();

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

                    //Iniciar la variable total.
                    $total = 0;

                    //Obtener la fecha actual.
                    $fechaPedido = date('Y-m-d');

                    //Estdo predeterminado al realizar el pedido.
                    $estadoPedido = 'En preparación';

                    //Recuperar el total y la id del producto desde el formulario.
                    $idProducto = $_POST['id'];
                    $total = $_POST['total'];

                    //Creo una consulta para insertar el pedido en la tabla pedidos.
                    $consultaPedido = "INSERT INTO pedidos (usuario_id, producto_id, fecha_pedido, total, estado) 
                    VALUES ('$idUsuario', '$idProducto', '$fechaPedido', '$total', '$estadoPedido')";

                    //Ejecuto la consulta.
                    $resultado = mysqli_query($conn, $consultaPedido);

                    //Compruebo de la insercción mediante un mensaje.
                    if($resultado){
                        echo "<script language='JavaScript'>alert('Enhorabuena, tu pedido se ha realizdo correctamente.'); location.assign('principal.php'); </script>";
                    } else {
                        echo "<script language='JavaScript'>alert('Hubo un error, vuelve a intentarlo.: " . mysqli_error($conn) ."'); location.assign('principal.php'); </script>";
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