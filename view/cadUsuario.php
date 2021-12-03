<!-- Autor: Thiago de Moura Machado -->
<!DOCTYPE html>

<?php
 require_once '../controller/cUsuario.php';
 $cadUser = new cUsuario();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
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
        <input type="submit" name="salvar" value="Salvar"/>
        <br>
        <br>
        <input type="reset" name="limpar" value="Limpar"/>
    </form>

</body>
</html>