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
  <title>Welcome in laravel 6 Crud operation</title>
</head>
<body>
	<style type="text/css">
		.container{
			padding: 0.5%;
		}
	</style>
	<div class="container">
   <h2 class="alert alert-success">LARAVEL 6.0 CRUD APPLICATION</h2>
   <a href="" class="btn btn-info" style="margin-left:82%;" data-toggle="modal" data-target="#exampleModal">Add New Student</a>
   <div class="row">
    <div class="col-md-12">
     @if($message = Session::get('success'))
     <div class="alert-success">
      <p style="padding: 5px;font-size: x-large;font-weight: 600;">{{$message}}</p>
    </div>

    @endif
    <table class="table table-bordered">
      <thead>
       <tr>
        <td>#</td>
        <td>Name</td>
        <td>Lastname</td>
        <td>Gender</td>
        <td>City</td>
        <td>Country</td>
        <td>Address</td>
        <td>Action</td>

      </tr>
      <tbody>
        @foreach($student as $key=>$studentdata)
        <td>{{++$key}}</td>
        <td>{{$studentdata->firstname}}</td>
        <td>{{$studentdata->lastname}}</td>
        <td>{{$studentdata->gender}}</td>
        <td>{{$studentdata->city}}</td>
        <td>{{$studentdata->country}}</td>
        <td>{{$studentdata->address}}</td>
        <td>

          <!-- ---------------Show button code-------------- -->
          <a data-student_id="{{$studentdata->id}}" data-firstname="{{$studentdata->firstname}}" data-lastname="{{$studentdata->lastname}}" data-country="{{$studentdata->country}}" data-city="{{$studentdata->city}}"  data-gender="{{$studentdata->gender}}" data-address="{{$studentdata->address}}" data-toggle="modal" data-target="#exampleModal-show" type="button" class="btn btn-warning btn-small">Show</a>

          <!-- ---------------Edit button code-------------- -->
          <a  href="javascript:showfunction()" data-student_id="{{$studentdata->id}}" data-firstname="{{$studentdata->firstname}}" data-lastname="{{$studentdata->lastname}}" data-country="{{$studentdata->country}}" data-city="{{$studentdata->city}}" data-gender="{{$studentdata->gender}}" data-address="{{$studentdata->address}}" data-toggle="modal" data-target="#exampleModal-edit" type="button" class="btn btn-info btn-small">Edit</a>

          <a data-student_id="{{$studentdata->id}}" data-toggle="modal" data-target="#exampleModal-delete" class="btn btn-danger btn-small">Delete</a>

        </td>
      </tr>
      @endforeach
    </tbody>
    {{$student->links()}}
  </thead>
</table>
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
         @csrf
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
    <button type="submit" class="btn btn-success">Save Student</button>
  </div>
</form>
</div>
</div>
</div>

<!-- ==============Edit Student model=========================== -->

<!-- Modal -->
<div class="modal fade left" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('student.update','student_id')}}" method="post">
        	@csrf
        	@method('PUT')
        	<div class="input-group">
        		<div class="input-group-prepend">
        			<span class="input-group-text">Firstname and Lastname</span>
        		</div>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last name">
          </div>
          <input type="hidden" name="student_id" id="student_id">
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
             <span class="input-group-text">Country and City</span>
           </div>
           <select name="country" class="form-control" id="country">
            <option value="India">India</option>
            <option value="Canada">Canada</option>
            <option value="Austreliya">Austreliya</option>
            <option value="Itely">Itely</option>
            <option value="U.S.A">U.S.A</option>
            <option value="Kuwait">Kuwait</option>
          </select>
          <select name="city" class="form-control" id="city">
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
         <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
         <div style="margin-left: 9px;">
          <!-- <input type="radio" name="gender" value="Male"{{ $studentdata->gender == 'male' ? 'checked' : ''}}> Male<br>
            <input type="radio" name="gender" value="Female"{{ $studentdata->gender == 'female' ? 'checked' : ''}}>Female<br> -->
            <input type="radio" name="gender" id="male" value="male" <?php echo ($studentdata->gender=='male')?'checked':'' ?>>male
            <input type="radio" name="gender"id="female" value="female" <?php echo ($studentdata->gender=='female')?'checked':'' ?>>female

          <!-- Male<input type="radio"  name="gender" id="male" value="male">
          <br>
          Female<input type="radio"  name="gender" id="female" value="female"> -->
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-info">Update Student</button>
    </div>
  </form>
</div>
</div>
</div>

<!-- ==============Delete Student model=========================== -->

<!-- Modal -->
<div class="modal fade top" id="exampleModal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-right modal-danger" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: gray;color: white;">
        <form action="{{route('student.destroy','student_id')}}" method="post">
        	@csrf
        	@method('DELETE')
        	
        	<input type="hidden" name="student_id" id="student_id">
        	<p class="text-center" width="50px">Are you sure you want to Delete this Student??</p>
        </div>
        <div class="modal-footer"style="background: blue;color: white;">
          <button type="button" class="btn btn-warning" data-dismiss="modal">No/Cancel</button>
          <button type="submit" class="btn btn-danger">Yes/Conform Delete Student</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ==============Show Student model=========================== -->

<!-- Modal -->
<div class="modal fade bottom" id="exampleModal-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-lg modal-right modal-warning" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('student.update','student_id')}}" method="get">
        	@csrf
        	<div class="input-group">
        		<div class="input-group-prepend">
        			<span class="input-group-text">Firstname and Lastname</span>

        			
        		</div>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" readonly>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last name" readonly>

          </div>
          <input type="hidden" name="student_id" id="student_id">
          <br>
          <div class="input-group">
            <div class="input-group-prepend">
             <span class="input-group-text">Country and City</span>


           </div>
           <select name="country" class="form-control" readonly="readonly">
            <option value="India">India</option>
            <option value="Canada">Canada</option>
            <option value="Austreliya">Austreliya</option>
            <option value="Itely">Itely</option>
            <option value="U.S.A">U.S.A</option>
            <option value="Kuwait">Kuwait</option>
          </select>
          <select name="city" class="form-control" readonly="readonly">
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
         <textarea type="text" class="form-control" id="address" name="address" placeholder="Enter Address" readonly></textarea>
         <div style="margin-left: 9px;">
          <input type="radio" name="gender" value="Male"{{ $studentdata->gender == 'male' ? 'checked' : ''}} readonly> Male<br>
          <input type="radio" name="gender" value="Female"{{ $studentdata->gender == 'female' ? 'checked' : ''}} readonly>Female<br>
          <!-- Male<input type="radio"  name="gender" id="male" value="Male" readonly><br> -->
          <!-- Female<input type="radio"  name="gender" id="female" value="Female" readonly><br> -->

        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>	
</div>
</body>
<script>
	$('#exampleModal-edit').on('show.bs.modal',function(event){
		var button = $(event.relatedTarget)
		var firstname = button.data('firstname')
		var lastname = button.data('lastname')
		var country = button.data('country')
		var city = button.data('city')
		var gender = button.data('gender')
		var address = button.data('address')
		var student_id = button.data('student_id')

		var modal = $(this)

		modal.find('.modal-title').text('Edit Student Information');
		modal.find('.modal-body #firstname').val(firstname);
		modal.find('.modal-body #lastname').val(lastname);
		modal.find('.modal-body #country').val(country);
		modal.find('.modal-body #city').val(city);
		modal.find('.modal-body #gender').val(gender);
		modal.find('.modal-body #address').val(address);
		modal.find('.modal-body #student_id').val(student_id);

	});

	$('#exampleModal-delete').on('show.bs.modal',function(event){
		var button = $(event.relatedTarget)
		var student_id = button.data('student_id')

		var modal = $(this)

		modal.find('.modal-title').text('Delete Student Information');
		modal.find('.modal-body #student_id').val(student_id);
	});

  $('#exampleModal-show').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var firstname = button.data('firstname')
    var lastname = button.data('lastname')
    var country = button.data('country')
    var city = button.data('city')
    var gender = button.data('gender')
    var address = button.data('address')
    var student_id = button.data('student_id')

    var modal = $(this)

    modal.find('.modal-title').text('View Student Information');
    modal.find('.modal-body #firstname').val(firstname);
    modal.find('.modal-body #lastname').val(lastname);
    modal.find('.modal-body #country').val(country);
    modal.find('.modal-body #city').val(city);
    modal.find('.modal-body #gender').val(gender);
    modal.find('.modal-body #address').val(address);
    modal.find('.modal-body #student_id').val(student_id);
  });
</script>
</html>