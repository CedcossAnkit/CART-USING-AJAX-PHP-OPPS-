<?php

require_once("classes/Profunction.php");
// require_once("classes/cart.php");

$obj=new functions();

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link href="style.css" type="text/css" rel="stylesheet">
	<script src="script.js"></script>
	

</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div id="main">
		<div id="products">
			<?php echo $obj->DisplayItem() ?>
		</div>
	</div>
	<h2>ADD TO CART</h2>
        <table id="tb">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>Quantity</th>
                <th>Remove</th>
            </tr>
			
            <tbody id="tbdy">

			
			</tbody>
			
		



        </table>
		<button id="clrcrt">Clear Cart</button>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Declaimers</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>