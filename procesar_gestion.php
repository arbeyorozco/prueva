<?php
// Incluye tu archivo de conexión real
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos y limpiamos los 4 datos del formulario (Tal cual los tienes en tu video)
    $usuario_actual     = mysqli_real_escape_string($conexion, $_POST['usuario_actual']);
    $contrasena_actual  = $_POST['contrasena_actual']; // No se escapa para poder verificar el hash puro
    $nuevo_usuario      = mysqli_real_escape_string($conexion, $_POST['nuevo_usuario']);
    $nueva_contrasena   = $_POST['nueva_contrasena'];

    // 1. Buscamos primero al usuario por su nombre actual en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario_actual'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // Extraemos los datos del usuario encontrado en la DB
        $fila = mysqli_fetch_assoc($resultado);
        
        // 2. Usamos password_verify para comparar la contraseña actual (limpia) con el password encriptado (hash) de la BD
        if (password_verify($contrasena_actual, $fila['password'])) {
            
            // 3. Si es correcta, encriptamos la NUEVA contraseña antes de hacer el UPDATE
            $nueva_contrasena_encriptada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
            
            // 4. Procedemos a actualizar ambos campos usando tus columnas reales: 'usuario' y 'password'
            $actualizar = "UPDATE usuarios SET usuario = '$nuevo_usuario', password = '$nueva_contrasena_encriptada' WHERE usuario = '$usuario_actual'";
            
            if (mysqli_query($conexion, $actualizar)) {
                echo "<script>
                        alert('Datos actualizados con éxito. Inicia sesión con tus nuevas credenciales.');
                        window.location.href='login.php';
                      </script>";
            } else {
                echo "Error al guardar los cambios: " . mysqli_error($conexion);
            }
            
        } else {
            // Si la contraseña actual no coincide con el hash guardado
            echo "<script>
                    alert('La contraseña actual es incorrecta.');
                    window.location.href='gestionar_cuentas.php';
                  </script>";
        }
    } else {
        // Si el usuario actual no existe en tu sistema
        echo "<script>
                alert('El usuario actual no existe.');
                window.location.href='gestionar_cuentas.php';
              </script>";
    }
}

// Cerramos la conexión de forma limpia
mysqli_close($conexion);
?>