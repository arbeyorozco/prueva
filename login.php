<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexowear - Iniciar Sesión</title>
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

        /* Contenedor principal de los enlaces de abajo */
        .link-back {
            margin-top: 25px;
            font-size: 14px;
            color: #555; /* Texto normal, no negrita */
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 12px; /* Espacio uniforme entre ambas líneas */
            align-items: center;
            justify-content: center;
        }

        /* Estilo para cada línea asegurando el centrado perfecto */
        .link-line {
            display: block;
            width: 100%;
            text-align: center;
        }

        /* Estilo base para los enlaces en naranja */
        .link-back a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.2s ease;
        }

        /* Efecto reactivo al pasar el mouse por encima (Naranja encendido) */
        .link-back a:hover {
            color: #ff3300;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>NEXOWEAR</h1>
        <p>Inicia sesión para comprar</p>

        <form action="validar.php" method="POST">
            <div class="input-group">
                <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            </div>

            <div class="input-group">
                <input type="password" name="contrasena" placeholder="Contraseña" required>
            </div>

            <button type="submit" class="btn-submit">ENTRAR</button>
        </form>

        <div class="link-back">
            <span class="link-line">
                ¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>
            </span>
            
            <span class="link-line">
                Gestionar  cuentas: <a href="gestionar_cuentas.php">Cambiar usuario o contraseña</a>
            </span>
        </div>
    </div>

</body>
</html>