<?php
// Iniciamos la sesión obligatoria para el sistema de seguridad
session_start();

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Capturamos el usuario y limpiamos texto malicioso
    $usuario  = mysqli_real_escape_string($conexion, $_POST['usuario']);
    
    // 2. CORRECCIÓN: Recibimos 'contrasena' tal cual viene de tu formulario login.php
    $password = $_POST['contrasena']; 

    // 3. CORRECCIÓN: El SELECT solo debe buscar por el NOMBRE de usuario.
    // Quitamos el 'AND password' de aquí porque las claves están encriptadas en la BD.
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Extraemos los datos del usuario encontrado en la BD
        $fila = mysqli_fetch_assoc($resultado);
        
        // 4. ¡AQUÍ SE VALIDA DE VERDAD! password_verify compara la clave limpia con el hash de la BD
        if (password_verify($password, $fila['password'])) {
            
            // Si la clave coincide, creamos la sesión y directo al index.php
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php");
            exit();

        } else {
            // Si el usuario existe pero la contraseña no coincide con el hash
            echo "<script>
                    alert('Contraseña incorrecta. Inténtalo de nuevo.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } else {
        // Si el nombre de usuario no existe en la base de datos
        echo "<script>
                alert('El usuario no existe. Regístrate primero.');
                window.location.href = 'login.php';
              </script>";
    }
}

mysqli_close($conexion);
?>