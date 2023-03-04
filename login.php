<?php
    include("conexion.php");
?>
<?php
if (isset($_COOKIE['sesion'])) {
    $cookie = $_COOKIE['sesion'];
    $sql = "SELECT * FROM registro WHERE sesion='$cookie'";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        header('Location: https://google.com');
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-image: url('https://w.wallhaven.cc/full/3z/wallhaven-3z2j2d.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div>

        <form action="" method="POST" class="formulario">
            <h2 class="titulo">LOGIN</h2>

            <div class="lista">
                <div class="correo">
                    <label for="">Introduce tu correo</label>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="password">
                    <label for="">Introduce tu contraseña</label>
                    <input type="password" name="clave" placeholder="Contraseña" required>
                </div>
                <div class="cuenta">
                    <input id="registrarsee" class="boton" type="submit" value="Iniciar sesion" name="login">
                    <div class="button-container">
                        <a class="salir" href="https://google.es">Salir</a>
                        <a class="login" href="http://localhost/putojoni/proyectoregistro/registro.php">Registrarse</a>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php
    $existe = FALSE;
    if (isset($_POST["login"])) {
        $correo = $_POST['correo'];
        $password = $_POST['clave'];

        $sql = "SELECT * FROM registro";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['correo'] == $correo && $row['clave'] == $password) {
                    $existe = TRUE;
                    $id = $row['id'];
                    echo $id;
                }
            }
        }

        //echo $sesion;


        if ($existe == TRUE) {
            $temp = $correo . strval(rand(1000000, 9999999));
            $sesion = openssl_encrypt($temp, "AES-128-ECB", $password);
            //echo $temp . " " .$sesion;
            //echo openssl_decrypt($sesion,"AES-128-ECB",$password);
            $sql = "UPDATE registro SET sesion='$sesion' WHERE id='$id'";
            if ($conexion->query($sql) === TRUE) {
                setcookie('sesion', $sesion, time() + 60 * 60 * 2);
                header('Location: https://google.com');
            } else {
                echo "Error updating record: " . $conn->$error; //si hay un error de mysql
            }

            die();
        } else {
            echo "<script>alert('El usuario o la contraseña son incorrectos');</script>";
        }
    }


    /*
if (isset($_POST["registro"])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['clave'];
    $existe=FALSE;
    $sql = "SELECT * FROM registro";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row['nombre'] == $nombre || $row['correo'] == $correo) {
                $existe=TRUE;
            } else {
                //echo $row['id'] . $row['nombre'] . $row['correo'];
                //echo '<script>alert("Este usuario ya existe");</script>';
            }
        }
    }
    if($existe==FALSE){
    $sql = $conexion->query("INSERT INTO registro (nombre, correo, clave) values ('$nombre','$correo','$password')");
    echo "Usuario creado correctamente";
    }else{
        echo "<script>alert('El usuario ya existe')</script>";
    }
}
*/
    ?>
</body>

</html>