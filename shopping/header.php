<?php 
require_once('component.php');
// session_start();
session_start();
if(isset($_POST['add'])){
	if(isset($_SESSION['cart'])){
		$item_id =array_column($_SESSION['cart'],"proid");
	// print_r($item_id);

		if(in_array($_POST['id'],$item_id)){
			echo "<script>alert('Product already added in cart..')</script>";
			echo "<script>window.location ='index.php'</script>";
		}else{
			$count = count($_SESSION['cart']);
			$item  = array('proid' => $_POST['id']);
			$_SESSION['cart'][$count] = $item;
		// print_r($_SESSION['cart']);
		}
	}else{
		$item  = array('proid' => $_POST['id']);
		$_SESSION['cart'][0] = $item;
		// print_r($_SESSION['cart']);
	}

}
?>

<header id="header">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="index.php" class="navbar-n=brand">
			<h3 class="px-5">
				<i class="fas fa-shopping-basket" ></i>Shopping Cart
			</h3>
		</a>
		<button class="navbar-toggler" type="button"
		data-toggle= "collapse"
		data-target = "#navbarNavAltMarkup"
		aria-controls = "navbarNavAltMarkup"
		aria-expanded = "false"
		aria-label = "Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="mr-auto"></div>
		<div class="navbar-nav">
			<a href="cart.php" class="nav-item nav-link active">
				<h5 class="px-5 cart">
					<i class="fas fa-shopping-cart"></i>Cart
					<?php
					if(isset($_SESSION['cart'])){
						$count = count($_SESSION['cart']);
						echo "<span id=\"cart_count\" style=\"text-align: center;padding: 0 0.9rem 0.1rem 0.9rem;border-radius: 4rem;\" class=\"text-warning bg-light\">$count</span>";
					}else{
						echo "<span id=\"cart_count\" style=\"text-align: center;padding: 0 0.9rem 0.1rem 0.9rem;border-radius: 4rem;\" class=\"text-warning bg-light\">0</span>";
					}
					?>
				</h5>
			</a>
		</div>
	</div>
	
</nav>
</header>