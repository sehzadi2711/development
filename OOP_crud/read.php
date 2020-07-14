<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>OOPS CRUD</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">PHP OOP CRUD TUTORIAL</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
            include 'model.php';
            $model = new Model();
            $id = $_GET['id'];
            $row = $model->read($id);
            // var_dump($row);exit;
            if(!empty($row)){
          ?>

          <div class="card">
            <div class="card-header">Single Record</div>
            <div class="card-body">
              <p>Name : <?php echo $row['name']; ?></p>
              <p>Email : <?php echo $row['email']; ?></p>
              <p>Mobile No. <?php echo $row['mobile']; ?></p>
              <p>Address : <?php echo $row['address']; ?></p>
              
            </div>
            <?php 
            }else{
              echo "<p>No data..</p>";
            }
            ?>
          </div><br>
          <div><a href="records.php" class="btn btn-info">BACK</a></div>
          
        </div>
      </div>