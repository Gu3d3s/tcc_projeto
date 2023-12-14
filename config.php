<?php

    // $dbLocalHoost_0 = 'LocalHoost';
    // $dbUserName_0 = 'root';
    // $dbPassword_0 = '';
    // $dbName_0 = 'mercado';

    // $conexao_0 = new mysqli($dbLocalHoost_0, $dbUserName_0, $dbPassword_0, $dbName_0);

    // if ($conexao_0 -> connect_error){
    //     echo 'conexão deu erro';
    // }else {
    //     echo 'conexão foi um sucesso';
    // };

    // $dbLocalHost_1 = 'LocalHost';
    // $dbUserName_1 = 'root';
    // $dbPassword_1 = '';
    // $dbName_1 = 'ong';

    // $conexao_1 = new mysqli($dbLocalHost_1, $dbUserName_1, $dbPassword_1, $dbName_1);

    // if ($conexao_1 -> connect_error){
    //     echo 'conexão deu erro';
    // }else {
    //     echo 'conexão foi um sucesso';
    // }

    
    $dbHost = 'LocalHost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'foodcare';

    $conexao = new mysqli($dbHost, $dbUserName, $dbPassword, $dbName);

    // if ($conexao -> connect_error){
    //     echo 'conexão deu erro';
    // }else {
    //     echo 'conexão foi um sucesso';
    // };

?>