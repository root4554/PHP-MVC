<?php

use Model\M_Usuario;

require_once 'Model/Usuario.php';
require_once 'Model/M_Usuario.php';
$username = $_GET['username'];

$con = new M_Usuario();

// $usuario = new Usuario($username, $password, $nombre);

$con->eliminarUsuario($username);
$con->close();

header("Location: C_verUsuarios.php");
exit();