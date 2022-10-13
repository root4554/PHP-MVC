<?php

use Model\M_Usuario;
use Model\Usuario;

require_once 'Model/Usuario.php';
require_once 'Model/M_Usuario.php';

$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];

$con = new M_Usuario();

$usuario = new Usuario($username, $password, $nombre);

$con->modficarUsuario($usuario);
$con->close();

exit();