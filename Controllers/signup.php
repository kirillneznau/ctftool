<?php # Регистрация и хеширование пароля
    require_once '../functions.php';  

    $error = $Name = $Login = $Password = "";
    if(isset($_SESSION['Login'])) destroySession();

    if(isset($_POST['Login'])){
        $Name = sanitizeString($_POST['Name']);
        $Login = sanitizeString($_POST['Login']);
        $Password = sanitizeString($_POST['Password']);
        
        # Проверка возможности регистрации
        if ($Name == "" || $Login == "" || $Password == "")
            $error = 'Вы не заполнили все поля.';
        else{
            $result = queryMysql("SELECT * FROM members WHERE Login='$Login'");

            if($result->num_rows)
                $error = "Этот логин уже занят.";
            else{
                $hashpass = password_hash($Password, PASSWORD_DEFAULT); # Хеширование пароля
                queryMysql("INSERT INTO members VALUES(NULL,'$Name','$Login','$hashpass', NULL, 0)"); # Добавление данных в БД в случае успешной регистрации
            }
        }
    }
    echo $error; # Возвращение ошибки
