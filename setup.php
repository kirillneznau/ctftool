<!-- Страница настройки БД, создает все необходимые таблици, для создания таблиц открыть страницу - имя_домена/setup.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройка базы данных</title>
</head>
<body>
    <h3>Настройка...</h3>
    <?php
    require_once 'functions.php';

    createTable('members','id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(50), Login VARCHAR(30), Password VARCHAR(255), dateReg TIMESTAMP, verify boolean not null default 0, INDEX(Login(6))'); # Таблица пользователей

    createTable('tasks','id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, userID INT UNSIGNED, Login VARCHAR(30), Name VARCHAR(50), thema VARCHAR(50), AboutThema TEXT, startTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    endTime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, taskTime TIME DEFAULT NULL, finished boolean not null default 0, file VARCHAR(200), FOREIGN KEY (userID) REFERENCES members(id)');
    ?>
    <br>...завершена.
</body>
</html>