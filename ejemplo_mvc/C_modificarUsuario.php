<?php

use Model\M_Usuario;
use Model\Usuario;

require_once 'Model/Usuario.php';
require_once 'Model/M_Usuario.php';


$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];

echo $username . "<br>";
echo $password . "<br>";
echo $nombre;

$con = new M_Usuario();

$con->modficarUsuario($username, $password, $nombre);
$con->close();

header("Location: C_verUsuarios.php");
exit();