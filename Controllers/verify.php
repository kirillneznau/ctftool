<?php # Подтверждение регистрации пользователя
    session_start();
    require_once '../functions.php';

    $userid = $_GET['userid']; # Получение id пользователя

    queryMysql("UPDATE `members` SET verify = '1' WHERE id = '$userid'");

    header("Location: /?verify=1"); # Редирект на главную страницу подтверждение регистрации