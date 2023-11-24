<?php
    //Incluyo los archivos de header y conexión a la base de datos.
    include "header.php";
    include "conexionbbdd/conexionbbdd.php";
?>
<?php
    //Inicio sesión.
    session_start();

    //Verifico se se ha enviado el formulario.
    if(isset($_POST['entrar'])){
        //Obtengo y escapo los datos del formulario.
        $ruser = $conn->real_escape_string($_POST['usuario_administracion']);
        $rpass = $conn->real_escape_string($_POST['contra_administracion']);
            
            //Hago una consulta a la basede datos para el usuario administrador. 
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$ruser' AND contraseña = '$rpass' AND tipo_usuario = 'admin'";
            if($resultado = $conn->query($consulta)){
                //Verifico si se encontraron resultados
                if($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_array()){
                        $userok = $fila['usuario'];
                        $passwordok = $fila['contraseña'];
                    }
                $resultado->close();
                
                //Verifico si los datos coinciden.
                if(isset($ruser) && isset($rpass)){
                    if($ruser == $userok && $rpass == $passwordok){
                        //Inicio la sesión y redirijo a la página de administración de productos.
                        $_SESSION['login'] = true;
                        $_SESSION['usuario'] = $usuario;
                        header("Location:productosadmin.php");
                    } 
                } 
            }
        } 

        //Cierro la conexión a la base de datos.
        $conn->close();
    }
?>
    <div class="administracion">
        <h2>Acceso zona administración</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form_administracion" method="POST">
            <input type="text" name="usuario_administracion" placeholder="Usuario"><br>
            <input type="password" name="contra_administracion" placeholder="Contraseña"><br>
            <button type="submit" name="entrar" style="color: white; text-align: center; background-color: #19171A; border: 2px solid #E8BE00;
            font-weight: bold; cursor: pointer; border-radius: 4px; font-size: 15px; padding: 10px 28px;">Acceder</button>
        </form>
    </div>
<?php
    include "footer.php";
?>