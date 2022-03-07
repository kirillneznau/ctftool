<body id="lk">
<?php 
require_once 'navbar.php';

if (isset($_GET['id'])){
    $userid = $_GET['id'];
}

$result = queryMysql("SELECT Name, Login, id FROM `members` WHERE verify = '1'"); # Выборка всех пользователей
?>

<div class="container">
    <h1 class="my-4">Панель администратора</h1>
    <div class="row">
        <div class="col col-lg-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Пользователи:
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($user = $result->fetch_assoc()){
                        if($user['Login'] == "admin"){
                            continue;
                        }
                        echo <<<_TEXT
                            <tr>
                                <td><a href="/?id=$user[id]">$user[Name]</a></td>
                            </tr>
                        _TEXT;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col col-lg-10">
            <?php 
                $result = queryMysql("SELECT Name FROM `members` WHERE id='$userid'"); # Выборка имени пользователя по id
                $name = $result->fetch_assoc();
                $result = queryMysql("SELECT * FROM `tasks` WHERE userID='$userid' ORDER BY id DESC"); # Выборка всех тренировок пользователя
            ?>
            <div class="row">
                <div class="col-4">
                    <h3 class="mb-4"><?php echo $name['Name'];?></h3>
                </div>
                <?php 
                if (isset($_GET['id'])){
                    echo <<<_TEXT
                        <div class="col-8">
                            <div class="d-flex justify-content-end">
                                <a href="Controllers/reset_password.php?userid=$userid" class="btn mx-2 btn-outline-primary">Сбросить пароль</a>
                                <a href="Controllers/reset_tasks.php?userid=$userid" class="btn mx-2 btn-outline-danger">Сбросить статистику</a>
                                <a href="Controllers/delete_accaunt.php?userid=$userid" class="btn ms-2 btn-danger">Удалить аккаунт</a>
                            </div>
                        </div>
                _TEXT;
                }
                ?>
            </div>
            <?php 
                if ($result->num_rows > 0){
                    echo <<<_TEXT
                        <h5 class="mb-3">Тренировки:</h5>
                        <table class="table table-hover align-middle">
                            <thead class="table-primary align-middle">
                                <tr>
                                    <th scope="col">
                                        № п/п
                                    </th>
                                    <th scope="col">
                                        Время начала
                                    </th>
                                    <th scope="col">
                                        Время тренировки
                                    </th>
                                    <th scope="col">
                                        Тема
                                    </th>
                                    <th scope="col">
                                        Описание
                                    </th>
                                    <th scope="col">
                                        Файл
                                    </th>
                                    <th scope="col">
                                        Удалить
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                    _TEXT;
                    $k = 1;
                    while($task = $result->fetch_assoc()){
                        $time = strtotime($task['startTime']);
                        $st = date("d.m.y H:i", $time);
                        echo <<<_TEXT
                            <tr>
                                <td>$k</td>
                                <td>$st</td>
                                <td>$task[taskTime]</td>
                                <td>$task[thema]</td>
                                <td>$task[AboutThema]</td>
                                <td><a href="users/$task[Login]/$task[id]/$task[file]">$task[file]</a></td>
                                <td><a href="Controllers/cancel_task.php?taskid=$task[id]&userid=$task[userID]" class="btn btn-outline-danger">Удалить</a></td>
                            </tr>
                        _TEXT; 
                        $k++;   
                    }
                    echo "</tbody></table>";
                }
            ?>
        </div>
    </div>