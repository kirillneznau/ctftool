<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signup.css">
    <title>Регистрация в CTFtool</title>
  </head>
  <body class="text-center">   
<main class="form-signin">
  <form method="post" action="Controllers/signup.php">
    <img  src="logo1.png" alt="логотип bootstrap" width="70%">
    <h1 class="h3 mb-3 fw-normal">Пожалуйста зарегистрируйтесь</h1>
    <div class="form-floating">
      <input type="text" class="form-control" name="Name" id="Name" placeholder="Фамилия И.О.">
      <label for="Name">Фанилия И.О.</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="Login" id="Login" placeholder="Логин">
      <label for="Login">Логин</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="Password" id="Password" placeholder="Пароль">
      <label for="Password">Пароль</label>
    </div>
    <div class="badge bg-danger mb-3" id="error"></div>
    <p>У вас уже есть аккаунт? <a href="/">Войдите</a></p>
    <button class="w-100 btn btn-lg btn-primary" type="button" onclick="sendpostreg()">Зарегистрироваться</button>
    <p class="mt-5 mb-3 text-muted">© created by kirillneznau 2022</p>
  </form>
</main>

<script src="js/script.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.min.js"></script>
    
  </body>
</html>