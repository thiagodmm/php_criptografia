<!-- Autor: Thiago de Moura Machado -->
<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true) {
    echo $_SESSION['usuarioN'] . " | " . $_SESSION['emailN'];
    echo " | <button onclick=" . "location.href='../controller/logout.php'" . ">Sair</button>";

} else {
    header("Location: login.php");

}

 require_once '../controller/cUsuario.php';
 $cadUser = new cUsuario();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Cadastro de Usuário - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>



    <h1>Cadastro de Usuário</h1>

    <form method="post" action="<?php $cadUser->inserir(); ?>">
        <label>Nome:
        <input type="text" name="nome" placeholder="Nome aqui..." required /></label>
        <br>
        <br>
        <label>E-mail:
        <input type="email" name="email" placeholder="E-mail aqui..." required /></label>
        <br>
        <br>
        <label>Senha:
        <input type="password" name="pas" placeholder="Senha aqui..." required /></label>
        <br>
        <br>
        <input type="submit" name="salvar" value="Salvar" style="background-color: brown; color: white;"/>
        <br>
        <br>
        <input type="reset" name="limpar" value="Limpar" style="background-color: brown; color: white;"/>
        <br>
        <br>
        <input type="button" value="Voltar" onclick="location.href='../index.php'" style="background-color: brown; color: white;"/>
        <br>
        <br>
        <input type="button" value="Lista de Usuários" onclick="location.href='listaUsuarios.php'" style="background-color: brown; color: white;"/>
    </form>

</body>
</html>