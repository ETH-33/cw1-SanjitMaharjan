<?php 
include 'admin/admin_connection.php';
include 'navigationbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
/* Nav ko tala ko */
*{
  margin :0px;
  padding: 0px;
}
.slider{
	width: 100%;
	height: 450px;
}
.slider>.slide-1,.slide-2,.slide-3{
	display: block;
	position: absolute;
	width: 100%;
	height: 450px;
}
.slide-1{
	animation: fade1 10s infinite;
}
.slide-2{
	animation: fade2 10s infinite;
}
.slide-3{
	animation: fade3 10s infinite;
}
@keyframes fade1{
	0%{
		opacity: 1;
	}
	25%{
		opacity: 0;
	}
	50%{
		opacity: 0;
	}
	75%{
		opacity: 0;
	}
	100%{
		opacity: 1;
	}
}
@keyframes fade2{
	0%{
		opacity: 0;
	}
	25%{
		opacity: 1;
	}
	50%{
		opacity: 0;
	}
	75%{
		opacity: 0;
	}
	100%{
		opacity: 0;
	}
}
@keyframes fade3{
	0%{
		opacity: 0;
	}
	25%{
		opacity: 0;
	}
	50%{
		opacity: 1;
	}
	75%{
		opacity: 0;
	}
	100%{
		opacity: 0;
	}
}
.trending{
  background-color: black;
}
</style>
</head>
<body>
    <div class="slider">
      <img src="Images/marvel-wanda-maximoff-scarlet-witch-unisex-tshirt72301.jpg" class="slide-1">
        <img src="Images/Wanda-Maximoff-T-Shirt.jpg" class="slide-2">
        <img src="Images/Make a logo wit 0.png" class="slide-3">
</div>

<style>
.trending-1{
  width: 100%;
  display: flex;
  background-color: #121331;
  justify-content: center;
}
  .trending{
    height: 350px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    width: 75%;
    background-color: #121331;
    
        }
    .trending div img{
      width: 250px;
      height: 300px;
     
    }
</style>


<div class="trending-1">
<div class="trending">
<?php
$display = "SELECT product_id, MIN(image_path) AS image_path FROM product_images GROUP BY product_id LIMIT 4";
$result = mysqli_query($conn, $display);
   while ($row = mysqli_fetch_assoc($result)) {
    ?>
   <div>
    <img src="Images/<?php echo $row['image_path'] ?>" alt="" >
    </div>
  
    <?php
   }

  ?>
 </div>
  </div>
</body>
</html>
