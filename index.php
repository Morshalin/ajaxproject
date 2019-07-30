<?PHP
session_start();
if ($_SESSION['login'] == false) {
	session_destroy();
	header('Location:login.php');
}
	$filePath = realpath(__DIR__);
	include_once $filePath.'/classes/User.php';
	$us = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/navbar-fixed.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/mlogo.png">
  <title>Mizuxe</title>
   <!-- JS SCRIPT -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert2.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/main.js"></script>
</head>
<body onload="autoload()">
	<div class="container">
		<?php
			if (isset($_GET['action']) and $_GET['action']=='logout') {
				if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
					$email = $_COOKIE['email'];
					$password = $_COOKIE['password'];

					setcookie("email", $email, time()-3600);
					setcookie("password", $password, time()+-3600);
				}
				include 'fb-init.php';
			session_destroy();
			unset($_SESSION['access_token']);
			header('Location:login.php');
			}
		?>
		<div  id="success_message"></div>
		<div id="showrsult"></div>
		<div class="card">
			<div class="card-header">
				<h2 class="text-center">User List</h2>
				<a href="?action=logout">Logout</a>
			</div>
			<div class="card-body">
				<div class="text-center lead m-2">Add New User
					<button type="button" class="btn btn-info data" data-target="#newuser" data-toggle="modal" >New User</button>
				</div>
				<div id="showalldata"></div>
				
			</div>
			<div class="card-footer">
				<p class="text-center">&copy copy Right 2019</p>
			</div>
		</div>
	</div>

	<div class="modal" id="newuser">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<div class="modal-title">Add New User</div>
					<button data-dismiss="modal" class="close">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" id="form_data">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" name="name"  class="clear form-control" />
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email"  name="email"  class=" clear form-control" />
						</div>
						<div class="form-group">
							<label for="number">Number</label>
							<input type="text" id="number" name="number"  class=" clear form-control" />
						</div>
						<input type="submit" id="insert" value="Submit"  />
					</form>
				</div>
				<div class="modal-footer bg-info">
					<button type="text" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>

	</div>

	<div class="modal" id="edituser">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<div class="modal-title">Update User</div>
					<button data-dismiss="modal" class="close">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" id="update_data">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name_update" name="name" class="form-control" />
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email_update" name="email" class="form-control" />
						</div>
						<div class="form-group">
							<label for="number">Number</label>
							<input type="text" id="number_update" name="number" class="form-control" />
						</div>
						<input type="hidden" id="update_id" name="id">
						<input type="submit" id="dataupdate_update" class="btn btn-success" >
					</form>
				</div>
				<div class="modal-footer bg-info">
					<button type="text" class="btn btn-danger" data-dismiss="modal" >Close</button>
				</div>
			</div>
		</div>

	</div>

	<div class="modal" id="userview">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<div class="modal-title">User Information</div>
					<button data-dismiss="modal" class="close">&times;</button>
				</div>
				<div class="modal-body">
					<div id="userinfo"></div>
				</div>
				<div class="modal-footer bg-info">
					<button type="text" class="btn btn-danger" data-dismiss="modal" >Close</button>
				</div>
			</div>
		</div>
	</div>



</body>
</html>
