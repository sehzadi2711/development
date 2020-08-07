<?php 
require('top.inc.php');
$name='';
$categories_id='';
$mrp='';
$selling_price='';
$qty='';
$short_desc='';
$description='';
$image='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
// $image = '';

$msg = '';
// $image_required = 'required';

//show category code..
if(isset($_GET['id']) && $_GET['id']!=''){
	// $image_required='';
	$id = get_safe_value($conn,$_GET['id']);
	$sql = "SELECT * FROM product WHERE id= '$id'";
	$result = mysqli_query($conn,$sql);	
	$check = mysqli_num_rows($result); //can't added url fake data...if tried ...redirect to categories page..
	if($check>0){
		$row = mysqli_fetch_assoc($result);
		$categories_id = $row['categories_id'];
		$name = $row['name'];
		$mrp = $row['mrp'];
		$selling_price = $row['selling_price'];
		$qty = $row['qty'];
		$short_desc = $row['short_desc'];
		$description = $row['description'];
		$meta_title = $row['meta_title'];
		$meta_desc = $row['meta_desc'];
		$meta_keyword = $row['meta_keyword'];
		// $categories = $row['categories'];
		// echo $row['image'];
		// echo 1;exit;
	}else{
		header('location:product.php');
		die();
	}	
}

//add new category...also update category....
if(isset($_POST['submit'])){
	$categories_id = get_safe_value($conn,$_POST['categories_id']);
	$name = get_safe_value($conn,$_POST['name']);
	$mrp = get_safe_value($conn,$_POST['mrp']);
	$selling_price = get_safe_value($conn,$_POST['selling_price']);
	$qty = get_safe_value($conn,$_POST['qty']);
	// $image = get_safe_value($conn,$_POST['image']);
	$short_desc = get_safe_value($conn,$_POST['short_desc']);
	$description = get_safe_value($conn,$_POST['description']);
	$meta_title = get_safe_value($conn,$_POST['meta_title']);
	$meta_desc = get_safe_value($conn,$_POST['meta_desc']);
	$meta_keyword = get_safe_value($conn,$_POST['meta_keyword']);




	$sql = "SELECT * FROM product WHERE name= '$name'";
	$result = mysqli_query($conn,$sql);	
	$check= mysqli_num_rows($result);
	if($check>0){ //if category are same than print a message....
		if(isset($_GET['id']) && $_GET['id']!=''){ //
			$getdata = mysqli_fetch_assoc($result);
			if($id=$getdata['id']){ 
				//at update time same value entered that can be also update..
			}else{	
				$msg = "Product is already exist...!";
			}
		}else{
			$msg = "Product is already exist...!";
		}
	}
	if($_FILES['image']['type']!='' && ($_FILES['image']['type']!='image/jpeg') || ($_FILES['image']['type']!='image/jpg') || ($_FILES['image']['type']!='image/png')){
		$msg = "Please select Only jpeg,png and jpg image formate.";
	}
		if($msg ==''){
			if(isset($_GET['id']) && $_GET['id']!=''){
				if($_FILES['image']['tmp_name']!=''){
					$target_dir = '../media/product/';
					$target_file = $target_dir . basename($_FILES['image']['name']);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$tmp_name = $_FILES['image']['tmp_name'];
					if (move_uploaded_file($tmp_name, $target_file)) {
						$image="../media/product/".basename($_FILES['image']['name']);
						$update_sql = "UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',selling_price='$selling_price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',image='$image',meta_desc='$meta_desc',meta_title='$meta_title',meta_keyword='$meta_keyword' WHERE id='$id'";
					}

				}
				mysqli_query($conn,$update_sql);
				// echo "<pre>";
				// print_r($rinkal);
				// echo "</pre>";exit;
				// $rinkal->prx($rinkal);

			}else{
				//image uploaded..
				$target_dir = '../media/product/';
  				$target_file = $target_dir . basename($_FILES['image']['name']);
    			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  				$tmp_name = $_FILES['image']['tmp_name'];
    			if (move_uploaded_file($tmp_name, $target_file)) {
    			$image="../media/product/".basename($_FILES['image']['name']); 
    			// echo "image uploaded...";
				// $image = rand(111111111,999999999).'_'.$_FILES['image']['name'];
				// move_uploaded_file($_FILES['image']['tmp_name'], '../media/product/'.$image);
    		}
				mysqli_query($conn,"INSERT INTO product(categories_id,name,mrp,selling_price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status) VALUES('$categories_id','$name','$mrp','$selling_price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)");
			}
			header('location:product.php');
			die();
		}
	}
?>
<div class="content pb-0">
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><strong>Product</strong><small> Form</small></div>
					<form method="post" enctype="multipart/form-data">
						<div class="card-body card-block">
							<div class="form-group">
								<label for="categories" class=" form-control-label">Categories</label>
								<select class="form-control" name="categories_id">
									<option>Select Categories</option>
									<?php
									$res = mysqli_query($conn,"SELECT id,categories FROM categories order by categories asc");
										while ($row=mysqli_fetch_assoc($res)) {
												if($row['id'] ==$categories_id){
													echo "<option selected value=".$row['id'].">".$row['categories']."</option>";				
												}
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="Product Name" class=" form-control-label">Product Name</label>
								<input type="text" name="name" placeholder="Enter your Product name" value="<?php echo $name; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="Product MRP" class=" form-control-label">Product MRP</label>
								<input type="text" name="mrp" placeholder="Product MRP" value="<?php echo $mrp; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="Product Price" class=" form-control-label">Product Price</label>
								<input type="text" name="selling_price" placeholder="Enter Price" value="<?php echo $selling_price; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="Quantity" class=" form-control-label">Quantity</label>
								<input type="text" name="qty" placeholder="Enter Quantity" value="<?php echo $qty; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="categories" class=" form-control-label">Product Image</label>
								<input type="file" name="image" class="form-control">
							</div>
							<div class="form-group">
								<label for="Short Desc" class=" form-control-label">Short Description</label>
								<textarea name="short_desc" placeholder="Enter Short Desc" class="form-control" required><?php echo $short_desc; ?></textarea>
							</div>
							<div class="form-group">
								<label for="Description" class=" form-control-label">Description</label>
								<textarea name="description" placeholder="Enter Description" class="form-control" required><?php echo $description; ?></textarea>
							</div>
							<div class="form-group">
								<label for="Meta title" class=" form-control-label">Meta title</label>
								<textarea name="meta_title" placeholder="Enter Meta title" class="form-control" required><?php echo $meta_title; ?></textarea>
							</div>
							<div class="form-group">
								<label for="Meta Desc" class=" form-control-label">Meta Desc</label>
								<textarea name="meta_desc" placeholder="Enter Meta Desc" class="form-control" required><?php echo $meta_desc; ?></textarea>
								
							</div>
							<div class="form-group">
								<label for="Meta Keyword" class=" form-control-label">Meta Keyword</label>
								<textarea name="meta_keyword" placeholder="Enter Meta Keyword" class="form-control" required><?php echo $meta_keyword; ?></textarea>
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