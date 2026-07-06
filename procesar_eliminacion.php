<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario_actual = mysqli_real_escape_string($conexion, $_POST['usuario_actual']);
    $contrasena_actual = $_POST['contrasena_actual'];

    $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $consulta->bind_param("s", $usuario_actual);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        if (password_verify($contrasena_actual, $fila['password'])) {

            $stmt = $conexion->prepare("DELETE FROM usuarios WHERE usuario = ?");
            
            if ($stmt) {
                $stmt->bind_param("s", $usuario_actual);
                
                if ($stmt->execute()) {
                    $stmt->close();
                    $consulta->close();
                    mysqli_close($conexion);

                    echo "<script>
                            alert('La cuenta ha sido eliminada con éxito del sistema.');
                            window.location.href='login.php';
                          </script>";
                    exit();
                } else {
                    $stmt->close();
                    $consulta->close();
                    mysqli_close($conexion);

                    echo "<script>
                            alert('Error interno al intentar eliminar la cuenta.');
                            window.location.href='eliminar_cuenta.php';
                          </script>";
                    exit();
                }
            }

        } else {
            $consulta->close();
            mysqli_close($conexion);

            echo "<script>
                    alert('La contraseña proporcionada es incorrecta.');
                    window.location.href='eliminar_cuenta.php';
                  </script>";
            exit();
        }
    } else {
        $consulta->close();
        mysqli_close($conexion);

        echo "<script>
                alert('El nombre de usuario especificado no existe.');
                window.location.href='eliminar_cuenta.php';
              </script>";
        exit();
    }
}

if (isset($conexion)) {
    mysqli_close($conexion);
}
?>