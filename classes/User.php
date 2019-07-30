<?php
	$filePath = realpath(__DIR__);
	include_once($filePath."/../lib/Database.php");
?>

<?php

class User {
	public $db;

	public function __construct(){
		$this->db = new Database();
	}

	public function addnewuser($name, $email, $number){
		$query = "INSERT into student(name,email,number) values('$name','$email','$number')";
		$result  =  $this->db->insert($query);
		if ($result) {
			echo "<span class='lead m-2 p-4' style='background:green; box-shadow: 2px 0px 20px green;'>Data Inserted Successfuly</span>";
		}else{
			echo "Data Not Inserted";
		}
		die();

	}

	public function datarefresh(){
		$query = "SELECT * FROM student";
		$value = $this->db->select($query);
		if ($value) {
			return $value;
		}else{
			return false;
		}

	}

	public function showuser($userid){
		$query = "SELECT * from student where id ='$userid'";
		$result = $this->db->select($query);
		if ($result) {
		$data="";
		while ($value = $result->fetch_assoc()) { 
			$data .= "Name: <p>".$value['name']."</p>
			Email: <p>".$value['name']."</p>
			Number: <p>".$value['name']."</p>";
		 	}
		 	echo $data;
		  }
		}

	public function edituser($userid){
		$query = "SELECT * from student where id ='$userid'";
		$result = $this->db->select($query)->fetch_assoc();
		echo json_encode($result);
	}

	public function updateuser($data){
		$name   = $data['name'];
		$email  = $data['email'];
		$number = $data['number'];
		$id     = $data['update_id'];

		$update = "UPDATE student
		SET
		name     = '$name',
		email    = '$email',
		number   = '$number'
		where id = '$id'";

		$result  = $this->db->update($update);
		if ($result) {
			echo "<span style='padding:10px;background:#7ED607; box-shadow: 6px 8px -10px #7ED607;'>Data update Successfuly</span>";
		}else{
			echo "Update Successfuly";
		}

	}

	public function deleteuser($delid){
		$query ="DELETE FROM student where id ='$delid'";
		 $result = $this->db->delete($query);
		 if ($result) {
		 	echo "<span style='padding:10px;background:#7ED607; box-shadow: 6px 8px -10px #7ED607;'>Delete Successfuly</span>";
		 }else{
		 	echo "Update Successfuly";
		 }
	}

}

?>