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

	<title>Cart</title>
</head>
<body class="bg-light">
	<?php
	require_once('header.php');
	require_once('component.php');
	function dbconnect(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "shopping";
		$conn = mysqli_connect($servername, $username, $password, $dbname); 
		return $conn;
	} 
	if(isset($_POST['remove'])){
		if($_GET['action']=='remove'){
			foreach ($_SESSION['cart'] as $key => $value) {
				if($value['proid']== $_GET['id']){
					unset($_SESSION['cart'][$key]);
					echo "<script>alert('Product has been Removed...')</script>";
					echo "<script>window.location='cart.php'</script>";
				}
			}
		}
	}
	?>
	<div class="container-fluid">
		<div class="row px-5">
			<div class="col-md-7">
				<div class="shopping-cart" style="padding: 3% 0;">
					<h6>My Cart</h6>
					<hr>
					<?php
					$total =0;

					if(isset($_SESSION['cart'])){
						$conn = dbconnect();
						$proid = array_column($_SESSION['cart'],"proid");
						$sql = "SELECT * FROM product";
						if($result = mysqli_query($conn,$sql)){
							while ($row = mysqli_fetch_array($result)) {
								foreach ($proid as $id) {
									if ($row['id']==$id) {
										cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
										$total = $total + (int)$row['product_price'];
									}
								}

					// echo $row['id'];
							}
						}
					}
					else{
						echo "<h5>Card is empty..</h5>";
					} 
					?>
					
				</div>
			</div>
			<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
				<div class="pt-4">
					<h6>PRICE DETAIL</h6>
					<hr>
					<div class="row price-details">
						<div class="col-md-6">
							<?php 
							if(isset($_SESSION['cart'])){
								$count= count($_SESSION['cart']);
								echo "<h6>Price $count Items</h6>";
							}else
							echo "<h6>Price 0 Items</h6>";

							?>
							<h6>Delivery Charges</h6>
							<hr>
							<h6>Amount Payable</h6>
						</div>
						<div class="col-md-6">
							<h6>$<?php echo $total; ?></h6>
							<h6 class="text-success">FREE</h6>
							<hr>
							<h6>$<?php echo $total; ?></h6>
						</div>

					</div>
				</div>	
				<div class="row-md-4" align="center">
					<a href="index.php" class="btn btn-primary" style="">CONTINUE TO SHOPPING</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>