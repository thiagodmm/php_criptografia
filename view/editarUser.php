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
$id = null;
if(isset($_POST['editar'])){
    $id = $_POST['idUser'];
}
$user = $cadUser->getUsuarioById($id);
?>

<html>
<head>
<meta charset="UTF-8">
<title>Editar Usuário - Trabalhando com BD e PDO</title>
<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>
    <h1>Editar Usuário</h1>
    <h3>Formulário</h3>

    <form action="../controller/updateUser.php" method="post">
        <input type="hidden" required value="<?php echo $user[0]['idUser']; ?>" name="idUser"/>
        <input type="text" required value="<?php echo $user[0]['nomeUser']; ?>" name="nomeUser"/>
        <br>
        <br>
        <input type="email" disabled value="<?php echo $user[0]['email']; ?>" name="email"/>
        <br>
        <br>
        <input type="submit" value="Salvar" name="update" style="background-color: darkslateblue; color: white; cursor: pointer; width:140px;"/>
        <br>
        <br>
        <input type="button" onclick="location.href='listaUsuarios.php'" value="Cancelar" style="background-color: darkslateblue; color: white; cursor: pointer; width:140px;"/>

    </form>


</body>
</html>