<body id="lk">
<?php 
require_once 'navbar.php';
$result = queryMysql("SELECT Name, Login, id FROM `members` WHERE verify = '0'"); # Выборка неподтверженных пользователей
?>
<div class="container">
    <h1 class="my-4">Подтверждение регистрации пользователей</h1>
    <?php 
    if ($result->num_rows == 0) {
        echo "<h3 class='my-4'>Неподтвержденных пользователей нет</h3>";
    }
    while($user = $result->fetch_assoc()){
        echo <<<_TEXT
            <div class="card mb-2 rounded-3 shadow-sm border-info">
                <div class="card-body d-flex flex-wrap align-items-center">
                    <div class="d-flex me-auto">
                        <h4 class="m-0">$user[Name] - $user[Login]</h4>
                    </div>
                    <div class="d-flex justify-content-end">
                            <a href="Controllers/verify.php?userid=$user[id]" type="button" class="btn btn-outline-primary mx-4">Подтвердить</a>
                            <a href="Controllers/delete_accaunt.php?userid=$user[id]" type="button" class="btn btn-outline-danger">Удалить</a>
                    </div>
                </div>
            </div> 
        _TEXT;
    }
    ?>
</div>