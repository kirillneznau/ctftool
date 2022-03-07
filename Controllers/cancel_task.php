<?php # Отмена и удаление тренировки
    session_start();
    require_once '../functions.php';
    
    if (isset($_GET['taskid'])) {
        $taskid = sanitizeString($_GET['taskid']); # Получение id таска
    }
    
    $result = queryMysql("SELECT Login FROM `tasks` WHERE id='$taskid'"); 
    $x = $result->fetch_assoc();
    $Login = $x["Login"];
    $dir = "../users/$Login/$taskid";
    removeDirectory($dir);
    
    queryMysql("DELETE FROM `tasks` WHERE id = '$taskid'");

    if(isset($_GET['userid'])){
        $userid = $_GET['userid']; # Получение id пользователя
        header("Location: /?id=$userid"); # Редирект на главную страницу для админки с сохранением страницы пользователя
    }
    else{
        header("Location: /"); # Редирект на главную страницу
    }
