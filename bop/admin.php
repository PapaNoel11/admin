<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <p><a href="adminpl.php">Назад</a></p>
  <title>Администрирование магазина</title>
  <!-- Подключение стилей Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="mt-5 mb-3">Администрирование магазина</h1>

    <?php
    session_start();

    
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {

    header('Location: index.php');
    exit();
}
    // Подключение к базе данных
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "products_db";
    $conn = mysqli_connect($host, $user, $password, $dbname);

    // Обработка добавления нового товара
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $photo = $_FILES['photo']['name'];
      $price = $_POST['price'];
      $age_rating = $_POST['age_rating'];

      // Загрузка фотографии
      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["photo"]["name"]);
      move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

      $sql = "INSERT INTO products (name, photo, price, age_rating) VALUES ('$name', '$photo', '$price', '$age_rating')";
      mysqli_query($conn, $sql);
    }

    // Обработка удаления товара
    if (isset($_POST['delete'])) {
      $id = $_POST['id'];
      $sql = "DELETE FROM products WHERE id='$id'";
      mysqli_query($conn, $sql);
    }

    // Вывод списка товаров
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Форма для добавления нового товара -->
<form method="post" enctype="multipart/form-data">
  <h2>Добавить товар</h2>
  <div class="form-group">
    <label for="name">Название:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="photo">Фото:</label>
    <input type="file" class="form-control-file" id="photo" name="photo" required>
  </div>
  <div class="form-group">
    <label for="price">Цена:</label>
    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
  </div>
  <div class="form-group">
    <label for="age_rating">Возрастной ценз:</label>
    <input type="text" class="form-control" id="age_rating" name="age_rating" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Добавить</button>
</form>

<!-- Список товаров -->
<h2>Список товаров</h2>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Название</th>
      <th>Фото</th>
      <th>Цена</th>
      <th>Возрастной ценз</th>
      <th>Удалить</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><img src="images/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="100"></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['age_rating']; ?></td>
        <td>
          <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>