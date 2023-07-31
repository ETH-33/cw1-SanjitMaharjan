<?php
include 'admin_connection.php';
include 'admin_nav.php';
require_once('start_session.php');

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

  header('Location: admin_login.php');
  exit(); 
}


if (isset($_POST['Upload'])) {
  $name = $_POST['name'];
  $details = $_POST['details'];
  $price = $_POST['price'];

  $stmt = "INSERT INTO products (name, details, price) VALUES ('$name', '$details', '$price')";
  mysqli_query($conn, $stmt);

  $product_id = mysqli_insert_id($conn);

  $imagecount = count($_FILES['image']['name']);

  for ($i = 0; $i < $imagecount; $i++) {
      $filename = $_FILES['image']['name'][$i];
      $tmpname = $_FILES["image"]["tmp_name"][$i];
      $folder = "../Images/" . $filename;
      move_uploaded_file($tmpname, $folder);

      $stmt = "INSERT INTO `product_images` (Product_Id, image_path) VALUES ('$product_id', '$folder')";
      mysqli_query($conn, $stmt);
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Details Upload</title>
  <script src="https://cdn.lordicon.com/bhenfmcm.js"></script> 
</head>

<body>
  <h2>Upload Product Details</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br><br>
    
    <label for="details">Product Details:</label>
    <textarea name="details" rows="5" required></textarea><br><br>
    
    <label for="price">Price:</label>
    <input type="number" name="price" required><br><br>
    
    <label for="image1">Image 1:</label>
    <input type="file" name="image[]" multiple><br><br>
    
    <input type="submit" value="Upload" name="Upload">
  </form>
  <?php
$display = "SELECT product_id, MIN(image_path) AS image_path FROM product_images GROUP BY product_id";
$display2 = "SELECT * from `products`";
$result = mysqli_query($conn, $display);
$result2 = mysqli_query($conn, $display2);

$products = array();
while ($row2 = mysqli_fetch_assoc($result2)) {
    $products[] = $row2;
}

$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $imagePath = '../Images/' . $row['image_path'];
    $productId = $row['product_id'];
    echo '<div style="position: relative; display: inline-block; border: 2px solid red; margin: 35px;"> <div>';
    echo '<a href="admin_editproduct.php?product_id=' . $productId . '"> <img src="' . $imagePath . '" alt="Image not found" width="300px" height="300px"></a>';
    echo '<p style="position: absolute; top: 10px; left: 10px; padding: 5px;">Product ID:' . $productId . '<lord-icon
        src="https://cdn.lordicon.com/pnhskdva.json"
        trigger="hover"
        colors="primary:red">
        </lord-icon></p>';

    if (isset($products[$i]['details'])) {
        echo '</div>Rs.' . $products[$i]['price'] . '</div>';
    } else {
        echo '</div>Price not available</div>';
    }

    $i++;
}

mysqli_close($conn);
?>

</body>
</html>
