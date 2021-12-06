<?php

/*
Author: Thiago de Moura Machado
Data: 06/12/2021
*/

class cLogin {

    // Função Logar
    public function login() {
        if(isset($_POST['logar'])){
            $email = $_POST['email'];
            $pas = $_POST['pas'];

            $pdo = require '../pdo/connection.php';
            $sql = "select * from usuario where email = ?";
            $sth = $pdo->prepare($sql);
            $sth->execute([$email]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $count = $sth->rowCount();

            if($count > 0){
                if(password_verify($pas, $result['pas'])){
                    session_start();
                    $_SESSION['usuarioN'] = $result['nomeUser'];
                    $_SESSION['emailN'] = $result['email'];
                    $_SESSION['logadoN'] = true;
                    header("Location: cadUsuario.php");
                }
            }else {
                header("Location: login.php");
            }
            unset($sth);
            unset($pdo);
        }
    }



}