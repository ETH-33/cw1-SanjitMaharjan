<?php
include 'admin_connection.php';
include 'admin_nav.php';
require_once('start_session.php');
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
    echo '<p style="position: absolute; top: 10px; left: 10px; padding: 5px;">Product ID:' . $productId . '</p>';

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

