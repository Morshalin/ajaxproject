<?php
include("lib/Database.php");
include 'fb-init.php';
$db = new Database();

	if (isset($_COOKIE['email']) and isset($_COOKIE['password'])) {
		$email    = $_COOKIE['email'];
		$password = $_COOKIE['password'];

		$sql="SELECT * from user where email = '$email' and password='$password'";
		$result = $db->select($sql);
			if ($result != false) {
				while ($value = $result->fetch_assoc()) {
					$_SESSION['id']    = $value['id'];
					$_SESSION['name']  = $value['name'];
					$_SESSION['email'] = $value['email'];
					header('Location:index.php');
				}
			}
	}
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/mlogo.png">
  <title>Mizuxe</title>
	<script type="text/javascript">
		var base_url = 'http://localhost/user/'
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-2">
				<div class="card">
					<div class="card-header">
						<h2 class="text-center" >Logi User</h2>
					</div>
					<?php
						include "classes/Admin.php";
						$ad = new Admin();
						if (isset($_POST['submit']) OR $_SERVER['REQUEST_METHOD']=='POST') {
							$userlogin = $ad->loginuser($_POST);
						}
					?>
					<div class="card-body">
						<form action="" method="post" >
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" type="email" name="email" placeholder="email" class="form-control" autocomplete="off" required>
								<small id="show"></small>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input id="password" type="password" placeholder="password" name="password" class="form-control">
							</div>
							<div class="form-check">
								<label for="" class="form-check-label">
								<input class="form-check-input" name="rember" type="checkbox">Rember Me
								</label>
							</div>
							<div class="form-group">
								<input type="submit" value="Login" class="form-control">
							</div>
							<div class="form-group">
								<a href="" class="btn btn-info btn-block">Forget PassWord</a>
							</div>
						</form>
					</div>
					<div class="card-footer text-center">
						&copy copy 2019
					</div>
				</div>
			</div>
			<div class="col-lg-3 offset-2"> 
				
				<a href="<?php echo $logiurl; ?>"> <img src="img/fb.png" alt="" class="img-fluid" height="20px"> </a>
			</div>


		</div>
	</div>



  <!-- JS SCRIPT -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
