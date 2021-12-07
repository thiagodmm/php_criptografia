<?php

/*
Author: Thiago de Moura Machado
*/

class cUsuario {

    // Função Inserir

    public function inserir(){
        if(isset($_POST['salvar'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            
            $pdo = require '../pdo/connection.php';
            $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            // $sth->execute([$nome,$email,$pas]);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $password, PDO::PARAM_STR);
            $password = password_hash($pas, PASSWORD_DEFAULT);
            $sth->execute();
            unset($pdo);
            unset($sth);
        }
    }

    public function getUsuarios() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

    /*
        - - Revisar este método - Não está deletando - -
        - - Feito em arquivo separado, está OK agora - -
        - - Solução foi criar um PHP File e copiar todo o IF para lá - -
    */
    public function deletar() {
        if(isset($_POST['deletar'])){
            $id = (int)$_POST['idUser'];
            $pdo = require_once'../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }
    }

    // Método quase igual ao getUsuarios() acima, a diferença é que recebe um ID como parâmetro
    public function getUsuarioById($id){
        
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();  // Atribui todas as informações ao result
        unset($sth);
        unset($pdo);
        return $result;
    } 

    public function updateUser(){
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
    }

    

}