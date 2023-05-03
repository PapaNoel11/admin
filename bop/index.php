<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];

  // Проверяем правильность логина и пароля
  if ($login == 'admin' && $password == 'admin88') {
    // Если логин и пароль правильные, создаем сессию
    $_SESSION['admin'] = true;

    // Перенаправляем на страницу администратора
    header('Location: adminpl.php');
    exit();
  } else {
    // Если логин и пароль неправильные, выводим сообщение об ошибке
    $error = 'Неправильный логин или пароль';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Вход в админ панель</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Вход в админ панель</h3>
          </div>
          <div class="card-body">
            <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post">
              <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" class="form-control" id="login" name="login" required>
              </div>
              <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Войти</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>