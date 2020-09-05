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
  <title>Welcome to Image uploadation</title>
</head>
<body>
  
  <div class="container">
  <h2 class="alert alert-success">Images</h2>
   @if(Session()->has('success'))
     <div class="alert-success">
      <p style="padding: 5px;font-size: x-large;font-weight: 600;">{{ session()->get('success')}}</p>
    </div>

    @endif
    <form class="form-inline" method="post" enctype="multipart/form-data" action="{{ route('addimage')}}"> 
      @csrf
     <div class="form-group">
      <label for="Name"> Name: </label>
      <input type="text" name="user_name" class="form-control" placeholder="Enter Name">
     </div>
    <div class="form-group">
     <label for="image" style="margin-left: 21px;">Select an Image : </label>
    <input type="file" style="margin-left: 2px;" name="user_image" class="form-control"><br>
    </div>
    <input type="submit" name="upload_img" value="SAVE" class="btn btn-primary btn-small">
  </form>
  <div class="container">

   <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th width="70%">Name</th>
        <th width="30%">Image</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($data as $row): ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['user_name']; ?></td>
        <td> <img src="{{ asset('rinkal/imgs/'.$row['user_image']) }}" class="img-thumbnail" width="100px;" height="100px;" /> </td>
         </tr>
         <?php endforeach; ?>
         </tbody>
  </table>
</div>
</body>


</html>