<?php
session_start();
require_once 'functions.php';
if (isset($_SESSION['Login'])){
    $Login = $_SESSION['Login'];
    $loggedin = TRUE;
}
else $loggedin = FALSE;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>CTFtool</title>
</head>
<?php 
if ($loggedin){ 
    if ($Login == "admin"){
        if (isset($_GET['verify']) && $_GET['verify'] == '1'){
            require_once 'Interfaces/verify.php'; # Для администратора подтверждение регистрации
        }
        else{
            require_once 'Interfaces/admin.php'; # Для администратора
        }
    }
    else{
        $result = queryMysql("SELECT id FROM tasks WHERE Login='$Login' AND finished='0'"); # Выборка для проверки на наличие незавершенной тренировки
        $taskid = $result->fetch_assoc();
        if ($result->num_rows){
            if (isset($_GET['taskid'])){
                require_once 'Interfaces/task.php'; # Для авторизованного пользователя  
            }
            else{
                header("Location: /?taskid=$taskid[id]"); # Добавление id в URL, если есть незаконченная тренировка
            } 
        }
        else {
            require_once 'Interfaces/lk.php'; # Для авторизованного пользователя
        }
    }
}
else{  
    require_once 'Interfaces/auth.php'; # Для неавторизованного пользователя
}?>

<script src="js/script.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>