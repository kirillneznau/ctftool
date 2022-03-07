<body id="auth" class="text-center">
<main class="form-signin">
  <form method="post" action="Controllers/signin.php">
  <img  src="logo1.png" alt="логотип bootstrap" width="70%">
    <h1 class="h3 mb-3 fw-normal">Пожалуйста войдите</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="Login" placeholder="Логин">
      <label for="floatingInput">Логин</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <div class="badge bg-danger mb-3" id="error"></div>
    <p>У вас ещё нет аккаунта? <a href="reg_page.php">Зарегистрируйтесь</a></p>
    <button class="w-100 btn btn-lg btn-primary" type="button" onclick="sendpostauth()">Войти</button>
  </form>
</main>