<?php
require_once('component.php');
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- JQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
	<title>Shopping Cart</title>

</head>
<body>
	<div class="container">
		<div class="row text-center py-5">
			<?php 
			$conn = dbconnect();
			$sql = "SELECT * FROM product";
			if($result = mysqli_query($conn,$sql)){
				while ($row = mysqli_fetch_array($result)) {
					component($row['product_name'],$row['product_price'],$row['product_image'],$row['pro_discount'],$row['id']);
					// echo $row['id'];
				}
			}
		

			?>
		</div>
	</div>
</body>
</html>
<?php
function dbconnect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "shopping";
	$conn = mysqli_connect($servername, $username, $password, $dbname); 
	return $conn;
} 

?>