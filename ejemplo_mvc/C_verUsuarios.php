<?php

use Model\M_Usuario;
require('Model/M_Usuario.php');

$con = new M_Usuario();

$usuarios = $con->getUsers();
$con->close();

require ('Views/V_verUsuarios.php');

?>