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
$result = mysqli_query($conn, $display);

while ($row = mysqli_fetch_assoc($result)) {
   $imagePath = '../Images/' . $row['image_path'];
   $productId = $row['product_id'];
   echo '<img src="' . $imagePath . '" alt="Image not found" width="300px" height="300px">';
}
 mysqli_close($conn);
  ?>
  
  <div>
  
  </div>
</body>
</html>

