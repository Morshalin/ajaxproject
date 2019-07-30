<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/User.php");
  $us = new User();
 
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$name   = $_POST['name'];
		$email  = $_POST['email'];
		$number = $_POST['number'];
		$value  = $us->addnewuser($name,$email,$number);
	}


?>

<table class='table table-bordered text-center'>
	<tr>
		<th>S.no</th>
		<th>Name</th>
		<th>Email</th>
		<th>Number</th>
		<th>Action</th>
	</tr>
	<?php 
	 $result = $us->datarefresh();
	 if ($result) {
	 	$i = 0;
	 	while ($data = $result->fetch_assoc()) { $i++; ?>
	 	
	<tr>
		<td> <?php echo $i; ?></td>
		<td><?php echo $data['name'] ?></td>
		<td><?php echo $data['email'] ?></td>
		<td><?php echo $data['number'] ?></td>
		<td> 
			<input type="button" class="view_model btn btn-success" id="<?php echo $data['id'] ?>" name="view"  value="view" />

			 <a href="#" class="edit_user btn btn-success" id="<?php echo $data['id'] ?>" >Edit</a>

			 <a id="<?php echo $data['id'] ?>" class="deleteUser btn btn-success" href="">Delete</a> </td>	
	</tr>
	<?php } } ?>
</table>