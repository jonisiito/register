<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
    <?php
    include("conexion.php");
    ?>
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
            <h2 class="titulo">REGISTRO</h2>

            <div class="lista">
                <div class="nombre">
                    <label for="">Introduce tu nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre de usuario" required>
                </div>
                <div class="correo">
                    <label for="">Introduce tu correo</label>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                </div>
                <div class="password">
                    <label for="">Introduce tu contraseña</label>
                    <input type="password" name="clave" placeholder="Contraseña" required>
                </div>
                <div class="cuenta">
                    <input id="registrarsee" class="boton" type="submit" value="Registrarse" name="registro">
                    <div class="button-container">
                        <a class="salir" href="https://google.es">Salir</a>
                        <a class="login" href="http://localhost/putojoni/proyectoregistro/login.php">Iniciar Sesion</a>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <?php
    if (isset($_POST["registro"])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $password = $_POST['clave'];
        $sesion="";
        $sql="INSERT INTO registro (nombre, correo, clave, sesion) values ('$nombre','$correo','$password','$sesion')";
        if(mysqli_query($conn, $sql)){
            echo '<div class="centrar">Te has registrado correctamente</div>';
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>

