<?php
  $filepath = realpath(__DIR__);
  include_once($filepath."/../classes/User.php");
  $us = new User();
 

  if (isset($_POST['userid'])) {
  	$userid = $_POST['userid'];
  	$value  = $us->edituser($userid);
  }
	
?>