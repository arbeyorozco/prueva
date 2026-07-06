<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexowear - Gestionar Cuenta</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial", sans-serif;
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            outline: none;
            border-color: #ff6600;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #333;
        }

        .link-back {
            margin-top: 25px;
            font-size: 14px;
            color: #555;
            text-align: center;
        }

        .link-back a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.2s ease;
        }

        .link-back a:hover {
            color: #ff3300;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>NEXOWEAR</h1>
        <p>Gestionar Cuenta de Usuario</p>

        <form action="procesar_gestion.php" method="POST">
            
            <div class="input-group">
                <input type="text" name="usuario_actual" placeholder="Nombre de usuario actual" required>
            </div>

            <div class="input-group">
                <input type="password" name="contrasena_actual" placeholder="Contraseña actual" required>
            </div>

            <div class="input-group">
                <input type="text" name="nuevo_usuario" placeholder="Nuevo nombre de usuario" required>
            </div>

            <div class="input-group">
                <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña" required>
            </div>

            <button type="submit" class="btn-submit">GUARDAR CAMBIOS</button>
        </form>

       <div class="link-back" style="margin-top: 25px; text-align: center;">
        <p><a href="login.php" class="lnk-interactivo">Volver al Inicio de Sesión</a></p>
        <p style="margin-top: 15px; margin-bottom: 5px; color: #666; font-size: 14px;">¿Ya no deseas usar tu cuenta?</p>
        <p><a href="eliminar_cuenta.php" class="lnk-interactivo">Eliminar cuenta</a></p>
    </div>

    <style>
        .lnk-interactivo {
            color: #ff6600;
            text-decoration: none; 
            font-weight: bold;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .lnk-interactivo:hover {
            color: #cc5200;
            text-decoration: underline;
            transform: scale(1.05);
        }
    </style>
    </div>

</body>
</html>