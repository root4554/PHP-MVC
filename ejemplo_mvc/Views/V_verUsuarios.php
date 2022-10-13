<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lista de usuarios</title>
</head>

<body>
    <a href="C_mostrarInsertUsuarios.php">Insertar usuario</a>
    <table>
        <thead>
            <tr>
                <td>Usuarios</td>
                <td>Constraseña</td>
                <td>Nombre real</td>
            </tr>
        </thead>
        <tbody>
            <?php
			foreach ($usuarios as $usuario) {
				echo "<tr>";
				echo "<td>" . $usuario['username'] . "</td>";
				echo "<td>" . $usuario['password'] . "</td>";
				echo "<td>" . $usuario['nombre'] . "</td>";
				echo "<td><a href='C_mostrarModificarUsuario.php'>Modificar</a></td>";
				echo "<td><a href='C_eliminarUsuario.php?username=" . $usuario['username'] . "'>Eliminar</a></td>";
				echo "</tr>";
			}

			?>
        </tbody>
    </table>
</body>

</html>