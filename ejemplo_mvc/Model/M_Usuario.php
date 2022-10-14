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

    public function modficarUsuario($username, $password, $nombre)
    {
        $sentencia = parent::con()->prepare("UPDATE `usuarios` SET `password`=?,`nombre`=? WHERE username = ?");
        

        echo $username . "<br>";
        echo $nombre ."<br>";
        echo $password . "<br>";
        
        $sentencia->bind_param("sss", $password, $nombre, $username);

        $sentencia->execute();
        $sentencia->close();
    }

    public function eliminarUsuario($username)
    {
        $sentencia = parent::con()->prepare("DELETE FROM usuarios WHERE username = ?");

        $sentencia->bind_param("s", $username);
        $sentencia->execute();
        $sentencia->close();
    }

    public function BuscarUsuario($username)
    {
        $sentencia = parent::con()->prepare("SELECT * FROM usuarios WHERE username = ?");

        $sentencia->bind_param("s", $username);
        $sentencia->execute();
        $sentencia->close();
    }
}