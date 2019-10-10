<?php

    $host = "mysql-crud";
    $db_name = "db_dev";
    $username = "user";
    $password = "123.456";

    try {
        $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    
    } catch (PDOException $exp) {
        echo ("ERRO: " . $exp->getMessage());
    }
    
?>