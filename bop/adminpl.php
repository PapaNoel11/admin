<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "products_db";
$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Админ панель</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Маскорад</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="adminpl.php">Товары</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Админ панель</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Выход</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-4">
    <h2>Товары</h2>
    <ul class="list-group">
      <?php
      $sql = "SELECT * FROM products";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class='list-group-item'><a href='product.php?id={$row['id']}'>{$row['name']}</a></li>";
      }
      ?>
    </ul>
  </div>

