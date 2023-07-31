<?php
include 'admin_connection.php';
include 'admin_nav.php';
require_once('start_session.php');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  
  header('Location: admin_login.php');
  exit(); 
}

if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $stmt = "SELECT * FROM products WHERE product_id = '$product_id'";
  $result = mysqli_query($conn, $stmt);
  $product = mysqli_fetch_assoc($result);

  $stmt_images = "SELECT * FROM product_images WHERE product_id = '$product_id'";
  $result_images = mysqli_query($conn, $stmt_images);
  $images = array();
  while ($row = mysqli_fetch_assoc($result_images)) {
    $images[] = $row['image_path'];
  }
}

if (isset($_POST['Update'])) {
  $name = $_POST['name'];
  $details = $_POST['details'];
  $price = $_POST['price'];
  $stmt = "UPDATE products SET name='$name', details='$details', price='$price' WHERE product_id='$product_id'";
  mysqli_query($conn, $stmt);

  if (isset($_FILES['image'])) {
    $imagecount = count($_FILES['image']['name']);

    $delete_stmt = "DELETE FROM product_images WHERE product_id = '$product_id'";
    mysqli_query($conn, $delete_stmt);

    for ($i = 0; $i < $imagecount; $i++) {
      $filename = $_FILES['image']['name'][$i];
      $tmpname = $_FILES["image"]["tmp_name"][$i];
      $folder = "../Images/" . $filename;
      move_uploaded_file($tmpname, $folder);

      $stmt = "INSERT INTO `product_images` (product_id, image_path) VALUES ('$product_id', '$folder')";
      mysqli_query($conn, $stmt);
    }
  }

  header('Location: admin_products.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Product Details</title>
</head>

<body>
  <h2>Edit Product Details</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required value="<?php echo $product['name']; ?>"><br><br>

    <label for="details">Product Details:</label>
    <textarea name="details" rows="5" required><?php echo $product['details']; ?></textarea><br><br>

    <label for="price">Price:</label>
    <input type="number" name="price" required value="<?php echo $product['price']; ?>"><br><br>

    <label for="image">Update Images:</label>
    <input type="file" name="image[]" multiple><br><br>

    <input type="submit" value="Update" name="Update">
  </form>
</body>
</html>
