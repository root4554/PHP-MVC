<?php

namespace Model;

require_once 'Conexion.php';
require_once 'Model/Usuario.php';

class M_Usuario extends Conexion
{
    public function getUsers()
    {
        $query = parent::con()->query('SELECT * FROM usuarios');

        $retorno = [];

        while ($fila = $query->fetch_assoc()) {
            $retorno[] = $fila;
        }

        return  $retorno;
    }

    public function insertUsuario(Usuario $usuario)
    {
        $sentencia = parent::con()->prepare("INSERT INTO usuarios(username, password, nombre) VALUES (?,?,?)");

        $sentencia->bind_param("sss", $usuario->getUsername(), $usuario->getPassword(), $usuario->getNombre());

        $sentencia->execute();
        $sentencia->close();
    }

    public function modficarUsuario(Usuario $usuario)
    {
        $sentencia = parent::con()->prepare("UPDATE USER SET USERNAME ='?', PASSWORD = '?', NOMBRE = '?' WHERE USERNAME = '?'");

        $sentencia->bind_param("ssss", $usuario->getUsername(), $usuario->getPassword(), $usuario->getNombre(), $usuario->getUsername());

        $sentencia->execute();
        $sentencia->close();
    }

    public function eliminarUsuario(Usuario $usuario)
    {
        $sentencia = parent::con()->prepare("DELETE FROM USER WHERE USERNAME = '?'");

        $sentencia->bind_param("s", $usuario->getUsername());

        $sentencia->execute();
        $sentencia->close();
    }
}