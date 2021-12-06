<?php

// Inicializando a sessão
session_start();

// Renova todas as variáveis da sessão
$_SESSION = array();

// Destruir sessão
session_destroy();

// Redirecionar para tela de login
header("Location: ../view/login.php");
exit;