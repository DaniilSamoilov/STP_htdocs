<?php
    $mysql = new mysqli("localhost", "root", "", "site");
    if($mysql->connect_error){
        die("Ошибка:".$mysql->connect_error);
    }
?>