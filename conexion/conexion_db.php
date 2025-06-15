<?php
$host = "localhost";
$usuario = "root";
$password = "1234";
$nombre_bd = "sistema_escolar";
$port = 3306;

// Creamos la conexion
$conn = new mysqli($host, $usuario, $password, $nombre_bd, $port);

// Verificamos la conexion
if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}