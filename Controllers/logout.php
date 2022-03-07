<?php # Выход и прерывание сессии
    session_start();
    require_once '../functions.php';
    if(isset($_SESSION['Login'])){
        destroySession();
    }
    header('Location: /');