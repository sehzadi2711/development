<?php
function dbconnect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "student";
	$conn = mysqli_connect($servername, $username, $password, $dbname); 
	return $conn;
} 
?>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<!-- Modal -->
		<!-- <div class="modal fade" id="myModal" role="dialog"> -->
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Delete Student</h4>
					</div>
					<div class="modal-body">
						<form method="post" >
							<p>Are you Sure Want to DELETE ID= <?php echo $_GET['id']; ?> student???</p><br>
							<button type="submit" name="delete" class="btn btn-danger" data-dismiss="modal">DELETE</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
if(isset($_POST['delete'])){
	$id = $_GET['id'];
	$conn = dbconnect();
	$sql = "DELETE FROM class WHERE id='$id'";
	$result = mysqli_query($conn,$sql);
	if($result== true){
		echo "<script>alert('Your data has been Deleted successfully,Thanks')</script>";
		echo "<script>window.open('index.php','_SELF')</script>";
	}else{
		echo mysqli_error($conn);
	}
}
?>