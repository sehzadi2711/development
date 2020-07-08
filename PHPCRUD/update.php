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

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/js/mdb.min.js"></script>
  <title>Welcome in PHP Crud operation</title>
</head>
<body>
	<style type="text/css">
    .container{
      padding: 0.5%;
    }
    
  </style>

  <div class="container">
   <!-- Modal -->
   <!-- <div class="modal fade" id="myModal" role="dialog" > -->
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Update Student</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        	<?php
          $conn = dbconnect();
          if(isset($_GET['id'])){
            $id = $_GET['id'];
        // echo "1";exit;	

            $sql = "SELECT * FROM class WHERE id='$id'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result))
            {
        	// $id= $row['id'];
             $firstname = $row['firstname'];
             $lastname = $row['lastname'];
             $gender = $row['gender'];
             $city = $row['city'];
             $country = $row['country'];
             $address = $row['address'];
             $image = $row['image']; 

              // echo $image;

             ?>
             <!-- <img src="uploads/<?php echo $image; ?>" width="50px" height="50px" > -->
             <form action="" method="post" enctype="multipart/form-data">
              <div align="center" class="rounded-circle">
               <img src="<?php echo $image; ?>"  width="100px" height="100px">
              </div><br>
               <div class="input-group">
                <div class="input-group-prepend">
                 <span class="input-group-text">Upload Photo</span>
               </div>
                <input type="file" class="form-control" name="image" value="" > 
             </div>
             <br>
             <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Firstname and Lastname</span>
              </div>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" value="<?php echo $firstname; ?>">
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last name" value="<?php echo $lastname; ?>">

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
               <span class="input-group-text">Country and City</span>
             </div>
             <select name="country" class="form-control" id="country" value="<?php echo $country; ?>">
              <option value="India" <?php if($country=="India") echo "selected"; ?>>India</option>
              <option value="Canada" <?php if($country=="Canada") echo "selected"; ?>>Canada</option>
              <option value="Austreliya" <?php if($country=="Austreliya") echo "selected"; ?>>Austreliya</option>
              <option value="Itely" <?php if($country=="Itely") echo "selected"; ?>>Itely</option>
              <option value="U.S.A" <?php if($country=="U.S.A") echo "selected"; ?>>U.S.A</option>
              <option value="Kuwait" <?php if($country=="Kuwait") echo "selected"; ?>>Kuwait</option>
            </select>
            <select name="city" class="form-control" id="city" value="<?php echo $city; ?>">
              <option value="Ahmedabad" <?php if($city=="Ahmedabad") echo "selected";?>>Ahmedabad</option>
              <option value="Vadodara" <?php if($city=="Vadodara") echo "selected";?>>Vadodara</option>
              <option value="Gandhinagar" <?php if($city=="Gandhinagar") echo "selected";?>>Gandhinagar</option>
              <option value="Udaipur" <?php if($city=="Udaipur") echo "selected";?>>Udaipur</option>
              <option value="Mumbai" <?php if($city=="Mumbai") echo "selected";?>>Mumbai</option>
              <option value="Jaisalmer" <?php if($city=="Jaisalmer") echo "selected";?>>Jaisalmer</option>
            </select>
          </div>
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
             <span class="input-group-text">Address and Gender</span>
           </div>
           <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address" ><?php echo $row['address']; ?></textarea><br>
           <div style="margin-left: 9px;">
            <input type="radio" name="gender" value="male"<?php if($gender == 'male') echo "checked"; ?>> Male<br>
            <input type="radio" name="gender" value="female"<?php if($gender == 'female') echo "checked"; ?>>Female<br>
          </div><br>
        </div>
        <button type="submit" name="edit" class="btn btn-info" data-dismiss="modal">Update Student</button>
      </div>
    <?php }
  }
  ?>
</form>

</div>
</div>
</div>
<?php

if(isset($_POST['edit'])){
	$id = $_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$address = $_POST['address'];
	$image = "uploads/".$_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
  $target_dir = 'uploads/';
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
 //              echo $firstname;
 //              echo $lastname;
 //              echo $gender;
 //              echo $city;
 //              echo $country;
 //              echo $address;
 //              echo $image."<br>";
 //              echo $image_tmp."<br>";
 //              echo $target_file;
	// exit;
  if($image_tmp != ""){
    move_uploaded_file($image_tmp, $target_file);


    $sql_upt = "UPDATE class SET firstname = '".$firstname."',lastname = '".$lastname."',gender = '".$gender."',city = '".$city."',country = '".$country."',address = '".$address."',image = '".$image."' WHERE id = '".$id."'";
    $result_upt = mysqli_query($conn,$sql_upt);
    if($result_upt == true){ 
      echo "<script>alert('Your data has been updated successfully,Thanks')</script>";
      echo "<script>window.open('index.php','_SELF')</script>";
    }else{
      mysqli_error($conn);
    }
  }

}


?>

</body>
</html>
