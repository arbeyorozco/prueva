<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexowear - Eliminar Cuenta</title>
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
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #bd2130;
        }

        .link-back {
            margin-top: 25px;
            text-align: center;
        }

        .link-back p {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

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
</head>
<body>
    <div class="login-container">
        <h1>NEXOWEAR</h1>
        <p style="font-size: 14px; color: #666;">Confirmar Cuenta de Usuario</p>
        
        <form action="procesar_eliminacion.php" method="POST" onsubmit="return confirmarEliminacion();">
            <div class="input-group">
                <input type="text" name="usuario_actual" placeholder="Nombre de usuario" required>
            </div>
            
            <div class="input-group">
                <input type="password" name="contrasena_actual" placeholder="Contraseña" required>
            </div>
            
            <button type="submit" class="btn-submit">Eliminar Cuenta</button>
        </form>
        
        <div class="link-back">
            <a href="gestionar_cuentas.php" class="lnk-interactivo">Volver a Gestionar Cuentas</a>
        </div>
    </div>

    <script>
    function confirmarEliminacion() {
        return confirm("¿Estás completamente seguro de eliminar esta cuenta? Esta acción borrará tus datos permanentemente.");
    }
    </script>
</body>
</html>