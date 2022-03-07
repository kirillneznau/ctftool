<?php # Отмена и удаление всех тренировок пользователя
    session_start();
    require_once '../functions.php';

    $userid = $_GET['userid']; # Получение id пользователя
    
    queryMysql("DELETE FROM `tasks` WHERE userID = '$userid'");

    header("Location: /?id=$userid"); # Редирект на главную страницу для админки с сохранением страницы пользователя
