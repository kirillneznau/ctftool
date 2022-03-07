<?php # Авторизация
    session_start();
    require_once '../functions.php';
    $error = $Login = $Password = "";

    if(isset($_POST['Login'])){
        $Login = sanitizeString($_POST['Login']);
        $Password = sanitizeString($_POST['Password']);

        if ($Login == "" || $Password == "")
            $error = 'Вы не заполнили все поля.';
        else{
            $result = queryMysql("SELECT id, Login, Password, verify FROM members WHERE Login='$Login'"); # Выборка по логину из БД
            if($result->num_rows == 0)
                $error = "Неверный логин.";
            else{
                $user = $result->fetch_assoc();
                if( $user['verify'] ) {
                    if(password_verify($Password, $user['Password'])){ # Проверка хеша
                        $_SESSION['Login'] = $Login;
                        $_SESSION['Password'] = $Password;
                        $_SESSION['id'] = $user['id'];
                    }
                    else $error = "Неверный пароль.";
                }
                else $error = "Регистрация ещё не подтверждена.";
            }
        }
    }
    echo $error; # Возвращает ошибку