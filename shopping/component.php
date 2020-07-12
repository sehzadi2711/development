<?php

function component($productname,$productprice,$proimage,$discount,$proid){
	$element = "
	<div class=\"col-md-3 col-sm-6 my-3 my-0\" >
	<form action=\"index.php\" method=\"post\">
	<div class=\"card shadow\" style=\"height:500px;\">
	<div>
	<img src=\"$proimage\" alt=\"image1\" class=\"img-fluid card-img-top\" style=\"height:190px;\">
	</div>
	<div class=\"card-body\">
	<h5 class=\"card-title\">$productname</h5>
	<h6>
	<i class=\"fas fa-star\"></i>
	<i class=\"fas fa-star\"></i>
	<i class=\"fas fa-star\"></i>
	<i class=\"fas fa-star\"></i>
	<i class=\"far fa-star\"></i>
	</h6>
	<p class=\"card-text\">
	Some text
	</p>
	<h5>
	<small><s class=\"text-secondary\">$$discount</s></small>
	<span class=\"price\">$$productprice</span>
	</h5>
	<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart<i class=\"fas fa-shopping-cart\"></i></button>
	<input type=\"hidden\" name=\"id\" value=\"$proid\">
	</div>
	</div>
	</form>
	</div>
	";
	echo $element;
}

function cartElement($proimage,$productname,$productprice,$proid){
	$element = "	<form action=\"cart.php?action=remove&id=$proid\" class=\"cart-items\" method=\"post\">
	<div class=\"border rounded\">
	<div class=\"row bg-white\" style=\"width:820px;height:190px;border-radius:1rem;\">
	<div class=\"col-md-3 pl-0\">
	<img src=\"$proimage\" alt=\"image1\" class=\"img-fluid\" style=\"max-width:110%;height:190px;\">
	</div>
	<div class=\"col-md-6\">
	<h5 class=\"pt-2\">$productname</h5>
	<small class=\"text-secondary\">Seller:dailytuition</small>
	<h5 class=\"pt-2\">$$productprice</h5>
	<button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
	<button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>

	</div>
	<div class=\"col-md-3 py-5\">
	<div style=\"display: inline-flex;\">
	<button type=\"button\" class=\"btn btn-sm bg-light border rounded-circle w-20\"><i class=\"fas fa-minus\"></i></button>
	<input type=\"text\" class=\"form-control w-25\" value=\"1\">
	<button type=\"button\" class=\"btn btn-sm bg-light border rounded-circle w-20\"><i class=\"fas fa-plus\"></i></button>
	</div>
	</div>

	</div>
	</div>

	</form>
	";
	echo $element;
}
