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
   <h2 class="alert alert-success">PHP CRUD APPLICATION</h2>
   <a href="" class="btn btn-info" style="margin-left:82%;" data-toggle="modal" data-target="#exampleModal">Add New Student</a>
   <div class="row">
    <div class="col-md-12">
     <?php //if(Session::get('success')){ ?>
       <!-- <div class="alert-success"> -->
        <!-- <p style="padding: 5px;font-size: x-large;font-weight: 600;"><?php //echo $message; ?></p> -->
      </div>
      <?php //} ?>
      
      <table class="table table-bordered">
        <?php 
        $conn = dbconnect();

        $sql = "SELECT * FROM class";
        if($result = mysqli_query($conn,$sql)){
          if(mysqli_num_rows($result)> 0){
            ?>
            <thead>

             <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Lastname</td>
              <td>Gender</td>
              <td>City</td>
              <td>Country</td>
              <td>Address</td>
              <td>Image</td>
              <td>Action</td>

              </tr></thead> <?php
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <?php echo "<td>"; ?> <img src="<?php echo $row['image']; ?>" height="100" width="100" /><?php echo "</td>"; ?>

                    <td>
                     <!-- ---------------Edit button code-------------- -->
                     <form method="post">
                      <a href="update.php?id=<?php echo $row['id']; ?>" name="edit" class="btn btn-info btn-small" data-target="#exampleModal-edit" type="submit">EDIT</a>
                      <a href="delete.php?id=<?php echo $row['id']; ?>" name="delete" class="btn btn-danger btn-small" data-target="#exampleModal-delete" type="submit">DELETE</a>
                    </form>
                  </td>
                </tr>
              </tbody>
              <?php
            }?>
          </table>
          <?php
        }else{
          echo "No records Found..";
        }
      }else{
        echo mysqli_error($conn);
      }

      ?>

      <!-- ==============ADD New Student model=========================== -->

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right modal-success" role="document">

          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                  <div class="input-group-prepend">
                   <span class="input-group-text">Upload Photo</span>
                 </div>
                 <input type="file" class="form-control" name="image" >
               </div>
               <br>
               <div class="input-group">
                <div class="input-group-prepend">
                 <span class="input-group-text">Firstname and Lastname</span>


               </div>
               <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname">
               <input type="text" class="form-control" name="lastname" placeholder="Enter Last name">

             </div>
             <br>
             <div class="input-group">
              <div class="input-group-prepend">
               <span class="input-group-text">Country and City</span>

             </div>
             <select name="country" class="form-control">
              <option value="India">India</option>
              <option value="Canada">Canada</option>
              <option value="Austreliya">Austreliya</option>
              <option value="Itely">Itely</option>
              <option value="U.S.A">U.S.A</option>
              <option value="Kuwait">Kuwait</option>
            </select>
            <select name="city" class="form-control">
              <option value="Ahmedabad">Ahmedabad</option>
              <option value="Vadodara">Vadodara</option>
              <option value="Gandhinagar">Gandhinagar</option>
              <option value="Udaipur">Udaipur</option>
              <option value="Mumbai">Mumbai</option>
              <option value="Jaisalmer">Jaisalmer</option>
            </select>
          </div>
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
             <span class="input-group-text">Address and Gender</span>


           </div>
           <textarea type="text" class="form-control" name="address" placeholder="Enter Address"></textarea>
           <div style="margin-left: 9px;">
            Male<input type="radio"  name="gender" id="male" value="male">
            <br>
            Female<input type="radio"  name="gender" id="female" value="female"></div>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button type="submit" name="addstudent" class="btn btn-success">Save Student</button>
        </div>


      </form>
    </div>
  </div>
</div>

</body>
</html>
<?php
$conn = dbconnect();
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
 if(isset($_POST['addstudent']))
 {
  $target_dir = 'uploads/';
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
    // echo $target_file;exit;
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $tmp_name = $_FILES['image']['tmp_name'];
    // echo $tmp_name;exit;
  if (move_uploaded_file($tmp_name, $target_file)) {
    $image="uploads/".basename($_FILES["image"]["name"]); 
  // echo $image;exit;
    $sql = "INSERT INTO class (firstname, lastname, gender, country, city, address, image)
    VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["gender"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["address"]."','$image')";
    
    $result = mysqli_query($conn,$sql);
    if($result==true){
      ?>
      <script style=" padding: 20px;background-color: #f44336;color: white;margin-bottom: 15px;">alert('Data Inserted successfully..');</script>
      <meta http-equiv="refresh" content="0">
      <?php
    }else{
      echo mysqli_error($conn);
    }
  } else {
    echo "The file has not been uploaded.";
  }
}
}

function dbconnect(){
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "student";
 $conn = mysqli_connect($servername, $username, $password, $dbname); 
 return $conn;
} 
?>



