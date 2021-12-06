<!-- Autor: Thiago de Moura Machado -->
<?php
require_once '../controller/cLogin.php';
$login = new cLogin();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Login</h1>
    <form action="<?php $login->login(); ?>" method="post">
        <label>E-mail:
        <input type="email" name="email" placeholder="E-mail aqui..." required /></label>
        <br>
        <br>
        <label>Senha:
        <input type="password" name="pas" placeholder="Senha aqui..." required /></label>
        <br>
        <br>
        <input type="submit" name="logar" value="Logar"/>
        <br>
        <br>
        <input type="reset" name="limpar" value="Limpar"/>
    </form>
</body>
</html>