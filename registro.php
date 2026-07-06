<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Nexowear</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 5px;
            font-size: 24px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .login-container p {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .input-group input:focus {
            border-color: #000;
            outline: none;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #11141a;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background 0.3s;
            font-size: 14px;
        }
        .btn-submit:hover {
            background: #2c313c;
        }
        .link-back {
            margin-top: 25px;
            font-size: 14px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>NEXOWEAR</h1>
    <p>Crea tu cuenta para comprar</p>
    
    <form action="guardar_usuario.php" method="POST">
        <div class="input-group">
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        </div>
        
        <div class="input-group">
            <input type="password" name="contrasena" placeholder="Contraseña" required>
        </div>
        
        <button type="submit" class="btn-submit">REGISTRARSE</button>
    </form>

    <div class="link-back">
        ¿Ya tienes cuenta? 
        <a href="login.php" style="color: #ff6600; text-decoration: none; font-weight: bold; transition: color 0.3s;" onmouseover="this.style.color='#cc5200'; this.style.textDecoration='underline';" onmouseout="this.style.color='#ff6600'; this.style.textDecoration='none';">
            Inicia sesión aquí
        </a>
    </div>
</div>

</body>
</html>