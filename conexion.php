<?php
$conexion = mysqli_connect("sql311.infinityfree.com", "if0_42237220", "tkQzxw1h6gHBq1", "if0_42237220_nexowear");

if (!$conexion) {
    die("Fallo la conexión: " . mysqli_connect_error());
}
?>