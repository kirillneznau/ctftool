<body id="lk">
<?php require_once 'navbar.php';?>

<div class="container">
    <h1 class="my-4">Добавить тренировку</h1>
    <form method="POST" action="Controllers/add_task.php">
        <div class="row mt-5">
            <div class="col col-lg-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Программирование" name="thema" id="thema1" checked>
                    <label class="form-check-label" for="thema1">
                        Программирование
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Веб" name="thema" id="thema2">
                    <label class="form-check-label" for="thema2">
                        Веб
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Реверс-инжинеринг" name="thema" id="thema3">
                    <label class="form-check-label" for="thema3">
                        Реверс-инжинеринг
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Сети" name="thema" id="thema4">
                    <label class="form-check-label" for="thema4">
                        Сети
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="PWN" name="thema" id="thema5">
                    <label class="form-check-label" for="thema5">
                        PWN
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Криптография" name="thema" id="thema6">
                    <label class="form-check-label" for="thema6">
                        Криптография
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Стеганография" name="thema" id="thema7">
                    <label class="form-check-label" for="thema7">
                        Стеганография
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Форензика" name="thema" id="thema8">
                    <label class="form-check-label" for="thema8">
                        Форензика
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="НТВ" name="thema" id="thema9">
                    <label class="form-check-label" for="thema9">
                        НТВ
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Друрое" name="thema" id="thema10">
                    <label class="form-check-label" for="thema10">
                        Друрое
                    </label>
                </div>
            </div>
            <div class="col col-lg-9">
                <div class="mb-3">
                <label for="AboutThema" class="form-label">Описание тренировки</label>
                    <textarea class="form-control" name="AboutThema" id="AboutThema" rows="8"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='d-flex justify-content-end'>
                <button type="submit" class="btn btn-primary px-5">Добавить</button>
            </div>
        </div>
    </form>
</div>
</body>