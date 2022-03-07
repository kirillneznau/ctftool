<?php # Удаление аккаунта
    session_start();
    require_once '../functions.php';

    $userid = $_GET['userid']; # Получение id пользователя

    $result = queryMysql("SELECT Login FROM `members` WHERE id='$userid'"); 
    $x = $result->fetch_assoc();
    $Login = $x["Login"];
    $dir = "../users/$Login";
    removeDirectory($dir);
    
    queryMysql("DELETE FROM `tasks` WHERE userID = '$userid'");
    queryMysql("DELETE FROM `members` WHERE id = '$userid'");

    header("Location: /"); # Редирект на главную страницу