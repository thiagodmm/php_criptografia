<!-- Autor: Thiago de Moura Machado -->
<?php

session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true) {
    header("Location: ../index.php");
}

require_once '../controller/cLogin.php';
$login = new cLogin();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="../estilos.css">
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
        <input type="submit" name="logar" value="Logar" style="background-color: darkslateblue; color: white; cursor: pointer;"/>
        <br>
        <br>
        <input type="reset" name="limpar" value="Limpar" style="background-color: darkslateblue; color: white; cursor: pointer;"/>
    </form>
</body>
</html>