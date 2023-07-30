<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://cdn.lordicon.com/bhenfmcm.js"></script> 
  <style>
 body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0px;
}
/* Navbar styles */
.navbar {
  background-color: #121331;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 2px;

}
.navbar ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
}
.navbar li {
  margin: 0 10px;
}
.navbar a {
  text-decoration: none;
  color: #ffffff;
  padding: 0px 10px;
  display: block;
}
.search-container {
  position: relative;
}
.search-container input[type="text"] {
  display: none;
  border: none;
  background-color: transparent;
  color: #ffffff;
  font-size: 14px;
  padding: 5px;
  border-bottom: 1px solid #ffffff;
  width: 120px;
  outline: none;
}

.search-container .lord-icon {
  position: absolute;
  top: 50%;
  right: 5px;
  transform: translateY(-50%);
  cursor: pointer;
  opacity: 0.5;
}

.search-container.active input[type="text"] {
  display: block;
}

/* Marquee styles */
.marq {
  background-color: #ff9800;
  color: #ffffff;
  text-align: center;
  padding: 0px;
}

.marq marquee {
  margin: 0;
  padding: 0px;
  font-size: 10px;;
}

.lord-icon {
  cursor: pointer;
}

.lord-icon:hover {
  opacity: 0.8;
}

.navbar ul {
  display: flex;
  align-items: center;
}

.navbar li {
  margin: 0 10px;
}

.navbar li:first-child {
  margin-right: auto;
}
.nav-icon{
  display: flex;
}
.navbar li:nth-last-child(-n+3) {
  margin-left: auto;
}
</style>
</head>
<body>
  <div class="marq"><marquee>Free Delivery all over Nepal</marquee></div>
  <div class="navbar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">New Arrivals</a></li>
      <li><a href="#">Categories</a></li>
      <li><a href="#">Gift Card</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Help</a></li>
      
    </ul>
    <div class="nav-icon">
      <a><lord-icon
        src="https://cdn.lordicon.com/xfftupfv.json"
        trigger="hover"
        colors="primary:#ffffff"></a>
    </lord-icon><input type="text" placeholder="Search..." id="search">
      <a href="#account"><lord-icon
        src="https://cdn.lordicon.com/bhfjfgqz.json"
        trigger="hover"
        colors="primary:#ffffff">
      </lord-icon></a>
      <a href="#wishlist"><lord-icon
        src="https://cdn.lordicon.com/pnhskdva.json"
        trigger="hover"
        colors="primary:#ffffff">
    </lord-icon></a>
        <a>
      <lord-icon
          src="https://cdn.lordicon.com/hyhnpiza.json"
          trigger="hover"
          colors="primary:#ffffff">
        </lord-icon></a>
    </div>
  </div>
</body>
</html>
