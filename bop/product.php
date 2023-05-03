<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "products_db";
$conn = mysqli_connect($host, $user, $password, $dbname);

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
?>
<p><a href="adminpl.php">Назад</a></p>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<h2><?php echo $row['name']; ?></h2>
<img src="/images/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="300">
<p>Цена: <?php echo $row['price']; ?></p>
<p>Возрастной ценз: <?php echo $row['age_rating']; ?></p>