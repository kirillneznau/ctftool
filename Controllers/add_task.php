<?php # Добавление новой тренировки
    session_start();
    require_once '../functions.php';
    # Подготовка данных для вставки в таблицу tasks
    $Login = $_SESSION['Login']; 
    $id = $_SESSION['id']; 

    $result = queryMysql("SELECT Name FROM `members` WHERE login = '$Login'"); # Выборка ФИО по логину
    $user = $result->fetch_assoc();
    $Name = $user['Name'];

    $error = $thema = $AboutThema = "";

    $AboutThema = sanitizeString($_POST['AboutThema']); # Получение данных из текстовой области

    $thema = $_POST['thema']; # Получение данных из радиобаттанов

    # Вставка данных в таблицу tasks
    queryMysql("INSERT INTO `tasks` VALUES (NULL, '$id', '$Login', '$Name', '$thema', '$AboutThema', NULL, NULL, NULL, 0, NULL)");
    $taskid = mysqli_insert_id($connection); # Определение id текущего таска

    header("Location: /?taskid=$taskid"); # Редирект на страницу текущего таска, метод GET
?>
