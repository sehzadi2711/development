<?php

class Model{
	private $server = "localhost";
	private $username = "root";
	private $password ="";
	private $dbname = "oop_crud";
	private $conn;

	public function __construct(){
		try{
			$this->conn = new mysqli($this->server,$this->username,$this->password,$this->dbname);
		}catch(Exception $e){
			echo "connection failed".$e->getMessege();
		}
	}
	public function insert(){
		if(isset($_POST['submit'])){
			if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])){
				if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
					$name = $_POST['name'];
					$email = $_POST['email'];
					$mobile = $_POST['mobile'];
					$address = $_POST['address'];
					$sql = "INSERT INTO records(name,email,mobile,address) VALUES('$name','$email','$mobile','$address')";
					$result = mysqli_query($this->conn,$sql);
					if($result==true){
						echo "<script>alert('Record Inserted successfullly');</script>";
						echo "<script>window.location='records.php'</script>";
					}else{
						echo "<script>alert('failed'); </script>";
						echo "<script>window.location='index.php'</script>";
					}
				}else{
					echo "<script>alert('Filled is empty..'); </script>";
					echo "<script>window.location='index.php'</script>";	
				}


			}	
		}
	}
	public function edit($id){
		$data = null;
		$sql = "SELECT * FROM records WHERE id = '$id'";
		if($result = mysqli_query($this->conn,$sql)){
			while($row = mysqli_fetch_array($result)) {
				$data = $row;
			}

		}
		return $data;
	}
	public function update($data){
		 $sql_upt = "UPDATE records SET name = '".$data['name']."',email = '".$data['email']."',mobile = '".$data['mobile']."',address = '".$data['address']."' WHERE id = '".$data['id']."'";
		 $result = mysqli_query($this->conn,$sql_upt);
		 if($result== true){
		 	return true;
		 }else{
		 	return false;
		 }
		// var_dump($data);
	}
	public function show(){
		$data= null;
		$sql = "SELECT * FROM records";
		if($result = mysqli_query($this->conn,$sql)){
			while($rows = mysqli_fetch_array($result)) {
				$data[] = $rows;
			}

		}
		return $data;
	}
	public function read($id){
		$data = null;
		$sql = "SELECT * FROM records WHERE id = '$id'";
		if($result = mysqli_query($this->conn,$sql)){
			while($row = mysqli_fetch_array($result)) {
				$data = $row;
			}

		}
		return $data;
	}
	public function delete($id){
		$sql = "DELETE FROM records WHERE id= '$id'";
		$result = mysqli_query($this->conn,$sql);

		if($result == true)
		{
			echo "<script>alert('Your data has been Deleted successfully,Thanks')</script>";
			echo "<script>window.location='records.php'</script>";
		}
		else
		{
			return false;
		}
	}
}

?>