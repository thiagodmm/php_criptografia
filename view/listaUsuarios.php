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
$listaUser = $cadUser->getUsuarios();
?>

<html>
<head>
<meta charset="UTF-8">
<title>Lista de Usuários - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table style="width: 100%;">
        <thead>
            <tr style="background-color: gray; color: white;">
                <th style="padding: 10px;">Id</th>
                <th style="padding: 10px;">Usuário</th>
                <th style="padding: 10px;">E-mail</th>
                <th style="padding: 10px;">Funções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaUser as $user): ?>
                <tr style="background-color: white;">
                    <td style="padding: 10px;">
                        <?php echo $user['idUser']; ?>
                    </td>
                    <td style="padding: 10px;">
                        <?php echo $user['nomeUser']; ?>
                    </td>
                    <td style="padding: 10px;">
                        <?php echo $user['email']; ?>
                    </td>
                    <td style="padding: 10px;">
                        <?php 
                        if($_SESSION['emailN'] != $user['email']){?>
                        <form action="../controller/deletarUser.php" method="post">
                            <input type="hidden" value="<?php echo $user['idUser']; ?>" name="idUser">
                            <input type="submit" value="deletar" name="deletar" style="background-color: orange; border-color: red; color: white; cursor: pointer;">

                        </form>
                    <?php }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <button onclick="location.href='cadUsuario.php'" style="padding:10px; border-radius:5px; border: 1px solid; background-color: darkslateblue; color: white; cursor: pointer;">Voltar</button>
</body>
</html>