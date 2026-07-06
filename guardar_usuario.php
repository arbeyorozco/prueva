<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capturamos solo los dos campos que dejamos en el formulario visual
    $usuario   = mysqli_real_escape_string($conexion, $_POST['usuario']);         
    $password  = $_POST['contrasena'];                                            

    // Encriptamos la contraseña de forma segura
    $password_encriptada = password_hash($password, PASSWORD_DEFAULT);

    // Verificamos si el nombre de usuario ya existe para no duplicarlo
    $verificar_usuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $resultado_verificar = mysqli_query($conexion, $verificar_usuario);

    if (mysqli_num_rows($resultado_verificar) > 0) {
        echo "<script>
                alert('El nombre de usuario ya se encuentra registrado. Inténtalo de nuevo.');
                window.location.href='registro.php';
              </script>";
    } else {
        // Insertamos únicamente en las columnas de usuario y password
        $insertar_usuario = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$password_encriptada')";
        
        $ejecutar = mysqli_query($conexion, $insertar_usuario);

        if ($ejecutar) {
            echo "<script>
                    alert('¡Registro exitoso! Ya puedes iniciar sesión.');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Hubo un error al registrar. Inténtalo de nuevo.');
                    window.location.href='registro.php';
                  </script>";
        }
    }
}
?>