<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'sistema_academia';

    $conexao = new mysqli($host, $user, $password, $db);

    if ($conexao -> connect_error) {
        die("Erro na conexão: ") . $conexao -> connect_error;
    }

    
?>