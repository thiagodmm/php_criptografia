<!-- Autor: Thiago de Moura Machado -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trabalhando com Criptografia em PHP</title>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Login - Teste de Criptografia</h1>
    <h2 class="txt-cinzaescuro">Criptografias mais conhecidas: MD5 e Shal</h2>
    <h3 class="txt-cinzaescuro">Mas vamos ver outras como: Sha256, Sha512, base64 e password_hash</h3>
    <br>
    <br>
    <h4 class="txt-cinzaescuro">Cadastro de Novo Usuário</h4>
    <br>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome aqui..."/>
        <br>
        <br>
        <input type="email" name="email" placeholder="E-mail aqui..."/>
        <br>
        <br>
        <input type="password" name="pas" placeholder="Senha aqui..."/>
        <br>
        <br>
        <input type="submit" name="salvar" value="Salvar"/>
        <br>
        <br>
        <input type="reset" name="limpar" value="Limpar"/>
    </form>

    <?php
        // Código PHP aqui
        if(isset($_POST['salvar'])){

            echo "<br>.: Dados do usuário :.";
            echo "<br> Nome: " . $_POST['nome'];
            echo "<br> E-mail: " . $_POST['email'];
            echo "<br> Senha: " . $_POST['pas'];

            $pas = $_POST['pas'];
            $criptoMD5 = md5($pas);
            $criptoSha1 = Sha1($pas);
            $criptoSha256 = hash("sha256",$pas);
            $criptoSha512 = hash("sha512",$pas);
            $criptoBase64 = base64_encode($pas);
            $criptoPassword_hash = password_hash($pas, PASSWORD_DEFAULT);

            echo "<br>.: Padrões de Criptografia :. ";
            echo "<br> MD5: " . $criptoMD5;
            echo "<br> Sha1: " . $criptoSha1;
            echo "<br> Sha256: " . $criptoSha256;
            echo "<br> Sha512: " . $criptoSha512;
            echo "<br> Base64: " . $criptoBase64;
            echo "<br> Base64-Decode: " . base64_decode($criptoBase64);
            echo "<br> Password_hash: " . $criptoPassword_hash;
            $pas2 = "admin";
            $pasBD = '$2y$10$cJgLa.BqM6SrZbMy9ZOGdepEWOMMOm7zaFH5s.pTOz3zBE7FW7oQe';
            if(password_verify($pas2, $pasBD)){
                echo "<br>Senha Válida!";
            }else{
                echo "<br>Senha Inválida!";
            }
        }
    ?>

</body>
</html>