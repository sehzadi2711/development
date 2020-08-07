<?php 
require('top.inc.php');
$categories='';
$msg = '';

//show category code..
if(isset($_GET['id']) && $_GET['id']!=''){
	$id = get_safe_value($conn,$_GET['id']);
	$sql = "SELECT * FROM categories WHERE id= '$id'";
	$result = mysqli_query($conn,$sql);	
	$check = mysqli_num_rows($result); //can't added url fake data...if tried ...redirect to categories page..
	if($check>0){
		$row = mysqli_fetch_assoc($result);
		$categories = $row['categories'];
	}else{
		header('location:categories.php');
		die();
	}	
}

//add new category...also update category....
if(isset($_POST['submit'])){
	$categories = get_safe_value($conn,$_POST['categories']);
	$sql = "SELECT * FROM categories WHERE categories= '$categories'";
	$result = mysqli_query($conn,$sql);	
	$check= mysqli_num_rows($result);
	if($check>0){ //if category are same than print a message....
		if(isset($_GET['id']) && $_GET['id']!=''){ //
			$getdata = mysqli_fetch_assoc($result);
			if($id=$getdata['id']){ 
				//at update time same value entered that can be also update..
			}else{	
				$msg = "Category is already exist...!";
			}
		}else{
			$msg = "Category is already exist...!";
		}
	}
		if($msg ==''){
			// $id = get_safe_value($conn,$_GET['id']);
			if(isset($_GET['id']) && $_GET['id']!=''){
				mysqli_query($conn,"UPDATE categories SET categories='$categories' WHERE id='$id'");
			}else{
				mysqli_query($conn,"INSERT INTO categories(categories,status) VALUES('$categories','1')");
			}
			header('location:categories.php');
			die();
		}
	}
?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Categories</strong><small> Form</small></div>
					<form method="post">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="categories" class=" form-control-label">Categories</label>
								<input type="text" name="categories" placeholder="Enter your Categories name" value="<?php echo $categories; ?>" class="form-control" required>
							</div>
							<button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
								<span id="payment-button-amount">Submit</span>
							</button>
							<div class="field_error"><?php echo $msg; ?> </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
require('footer.inc.php');
?>
<style>
	.field_error{
		color: red;
		margin-top: 15px;
	}
</style>