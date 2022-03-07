<?php
require_once 'navbar.php';

$taskid = $_GET['taskid']; # Получение id таска
$result = queryMysql("SELECT * FROM `tasks` WHERE id = '$taskid'");
$task = $result -> fetch_assoc();
?>
<div class="container">
    <h1 class="my-4">Текущая тренировка</h1>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">Сведения о тренировке</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Тема: </th>
                        <th scope="col"><?php echo $task['thema']?></th>
                    </tr>
                    <tr>
                        <th scope="col">Описание: </th>
                        <th scope="col"><?php echo $task['AboutThema']?></th>
                    </tr>
                    <tr>
                        <th scope="col">Время начала выполнения: </th>
                        <th scope="col">
                            <?php 
                                $time = strtotime($task['startTime']);
                                $st = date("d.m.y H:i", $time); 
                                echo $st;
                            ?>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data" action="Controllers/finish_task.php?taskid=<?php echo $taskid;?>">
        <div class="row my-4">
            <div class="col d-flex justify-content-start">
                <input type="file" name='fileTask' id='fileTask'>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="Controllers/cancel_task.php?taskid=<?php echo $taskid;?>" class="btn btn-danger px-5 mx-4">Отменить</a>
                <button type="submit" class="btn btn-primary px-5">Закончить</button>
            </div>
        </div>
    </form>
    <div class="row my-5"></div>
</div>