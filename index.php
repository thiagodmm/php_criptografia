<!-- Autor: Thiago de Moura Machado -->
<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true) {
    echo $_SESSION['usuarioN'] . " | " . $_SESSION['emailN'];
    echo " | <button onclick=" . "location.href='controller/logout.php'" . ">Sair</button>";

} else {
    header("Location: view/login.php");

}
?>

<html>
<head>
<meta charset="UTF-8">
<title>Página Inicial - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Página Inicial</h1>
    <h2>index.php</h2>
    <br>
    <br>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Utilize o botão abaixo para se cadastrar.</p>
    <button onclick="location.href='view/cadUsuario.php'" style="padding:10px; border-radius:5px; border: 1px solid; background-color: brown; color: white;">Cadastro de Usuário</button>
    <br>
    <br>
    <input type="button" value="Lista de Usuários" onclick="location.href='view/listaUsuarios.php'" style="background-color: brown; color: white;"/>

</body>
</html>