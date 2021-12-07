<?php

if(isset($_POST['update'])){
            $id = $_POST['idUser'];
            $nome = $_POST['nomeUser'];
            $pdo = require_once '../pdo/connection.php';
            $sql = "update usuario set nomeUser = ? where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Location: ../view/listaUsuarios.php");
        }