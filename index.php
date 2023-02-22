<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1{
            text-align: center;
            font-size: 36px;
            margin: 30px 0;
        }
        form{
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        form label{
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        form input[type="email"], form input[type="password"]{
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        form button{
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        form button:hover{
            background-color: #0062cc;
        }
    </style>
    <?php
    include("config.php");
    ?>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <form action="" method="POST">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Escribe tu direccion de email" required>
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Escribe tu contraseña" required>
        </div>
        <button type="submit" name="submit">Registrar</button>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql = "INSERT INTO usuarios (email,password)
        VALUES ('$email', '$password')";
        if (mysqli_query($conn, $sql)) {        
        } else {
        }   
    }
    ?>
</body>
</html>