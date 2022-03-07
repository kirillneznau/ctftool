<?php # Завершение тренировки
    session_start();
    require_once '../functions.php';

    $taskid = $_GET['taskid']; # Получение id таска

    queryMysql("UPDATE `tasks` SET endTime = NULL, finished = '1' WHERE id = '$taskid'");

    $result = queryMysql("SELECT Login, startTime, endTime FROM `tasks` WHERE id='$taskid'"); # Выборка времени начала и окончания
    $time = $result->fetch_assoc();
    $taskTime = strtotime($time["endTime"]) - strtotime($time["startTime"]);
    queryMysql("UPDATE `tasks` SET taskTime = '$taskTime' WHERE id = '$taskid'");

    $Login = $time["Login"];
    $dir = '../users/'.$Login.'/'.$taskid;
    if(isset($_FILES['fileTask']['name']) && $_FILES['fileTask']['name'] != ''){
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $tmp_name = $_FILES["fileTask"]["tmp_name"];

        $name = basename($_FILES["fileTask"]["name"]); # basename() может предотвратить атаку на файловую систему
        move_uploaded_file($tmp_name, "$dir/$name");

        move_uploaded_file($_FILES['fileTask']['tmp_name'], $saveto);
        
        queryMysql("UPDATE `tasks` SET file = '$name' WHERE id = '$taskid'");
    }


    header("Location: /"); # Редирект на главную страницу

