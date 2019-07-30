<style>
	.alert{
		margin-bottom: 0px;
	}
</style>
<?php
//session_start();

include_once("lib/Database.php");

	class Admin{
		public $db;

		public function __construct(){
			$this->db = new Database;
		}

		public function loginuser($data){
			$email    = $data['email'];
			$password = md5($data['password']);
			$rember ="";
			if (isset($data['rember'])) {
			$rember   = $data['rember'];
			}

			if (empty($email) or empty($password)) {
				echo "<span class='alert alert-danger text-center'>Field Must Not Be Empty</span>";
			}else{
				$sql="SELECT * from user where email = '$email' and password='$password'";
				$result = $this->db->select($sql);
				if ($result != false) {
					if ($rember) {
						setcookie("email", $email, time()+3600);
						setcookie("password", $password, time()+3600);
					}
					while ($value = $result->fetch_assoc()) {
						$_SESSION['login'] = true;
						$_SESSION['id'] = $value['id'];
						$_SESSION['name'] = $value['name'];
						$_SESSION['email'] = $value['email'];
						header('Location:index.php');
					}
				}else{
					echo "<span class='alert alert-danger text-center'>Email And Password Not match</span>";
				}
			}
		}
	}
?>